<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Rules\RuleInt;
use App\Core\Rules\RuleRequired;

class Office extends Model {
    public int $id;
    public string $address;
    public string $numbers_of_workspaces;


    public function rules(): array
    {
        return [
            'address' => [new RuleRequired()],
            'numbers_of_workspaces' => [new RuleRequired(), new RuleInt()]
        ];
    }
}