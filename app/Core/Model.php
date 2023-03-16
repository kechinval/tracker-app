<?php

namespace App\Core;

use App\Database\Database;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_UNIQUE = 'unique';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_INT = 'int';

    public array $errors = [];

    public function loadData($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if ($value === 'null') {
                    $value = null;
                }
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_INT && !\ctype_digit($value)) {
                    $this->addError($attribute, self::RULE_INT);
                }
                //TODO implement ignore
                if ($ruleName === self::RULE_UNIQUE) {
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $db = new Database();
                    $rec = $db->select('staff', '*', $uniqueAttr . '="' . $value . '"')->fetch_assoc();
                    if (!is_null($rec)) {
                        $this->addError($attribute, self::RULE_UNIQUE);
                    }
                }
            }
        }

        return empty($this->errors);
    }

    abstract public function rules(): array;

    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'Это поле должно быть заполнено',
            self::RULE_UNIQUE => 'Это поле должно быть уникальным',
            self::RULE_EMAIL => 'Невалидный email',
            self::RULE_MIN => 'Не менее {min} символов',
            self::RULE_INT => 'Только число'
        ];
    }

    public function hasErrors($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}