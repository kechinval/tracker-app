<?php

namespace App\Core\Rules;

use App\Database\Database;

class RuleUniquie implements RuleInterface
{
    public string $field;

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    //TODO implement ignore
    public function check($value): bool
    {
        $db = new Database();
        $rec = $db->select('staff', '*', $this->field . '="' . $value . '"')->fetch_assoc();
        if (!is_null($rec)) {
            return true;
        }

        return false;
    }

    public function errorMessage(): string
    {
        return "Должно быть уникальным";
    }
}