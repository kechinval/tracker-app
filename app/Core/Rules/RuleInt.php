<?php

namespace App\Core\Rules;

class RuleInt implements RuleInterface
{

    public function check($value): bool
    {
        return !\ctype_digit($value);
    }

    public function errorMessage(): string
    {
        return "Только цифры";
    }
}