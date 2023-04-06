<?php

namespace App\Core\Rules;

class RuleRequired implements RuleInterface
{
    public function check($value): bool
    {
        if($value){
            return false;
        }

        return true;
    }

    public function errorMessage(): string
    {
        return "Это поле должно быть заполнено";
    }
}