<?php

namespace App\Core\Rules;

interface RuleInterface
{
    public function check($value): bool;
}