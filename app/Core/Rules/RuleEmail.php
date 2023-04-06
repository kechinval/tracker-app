<?php

namespace App\Core\Rules;

class RuleEmail implements RuleInterface
{

    public function check($value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function errorMessage(): string
    {
        return "Невалидный email";
    }
}