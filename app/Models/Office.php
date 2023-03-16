<?php

namespace App\Models;

use App\Core\Model;

class Office extends Model {
    public int $id;
    public string $address;
    public string $numbers_of_workspaces;


    public function rules(): array
    {
        return [
            'address' => [self::RULE_REQUIRED],
            'numbers_of_workspaces' => [self::RULE_REQUIRED, self::RULE_INT]
        ];
    }
}