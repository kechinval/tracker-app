<?php

namespace App\Core\Rules;

class RuleMin implements RuleInterface
{
    public int $minValue;

    public function __construct($minValue)
    {
        $this->minValue = $minValue;
    }

    public function check($value): bool
    {
        return strlen($value) < $this->minValue;
    }

    public function errorMessage(): string
    {
        return "Не менее $this->minValue символов";
    }
}