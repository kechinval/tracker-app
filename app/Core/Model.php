<?php

namespace App\Core;

abstract class Model
{

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

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                if ($rule->check($value)) {
                    $this->addError($attribute, $rule->errorMessage());
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $message, $params = []): void
    {
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
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