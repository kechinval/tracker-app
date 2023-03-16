<?php

namespace App\Models;

use App\Core\Model;

class Equipment extends Model {

    public int $id;
    public int $staff_id;
    public int $office_id;
    public string $invNo;
    public string $specs;
    public string $equipment_status;
    public string $movement_status;

    public function rules(): array
    {
        return [
            'staff_id' => [self::RULE_REQUIRED],
            'office_id' => [self::RULE_REQUIRED],
            'invNo' => [self::RULE_REQUIRED, self::RULE_INT],
            'specs' => [self::RULE_REQUIRED],
            'equipment_status' => [self::RULE_REQUIRED],
            'movement_status' => [self::RULE_REQUIRED]
        ];
    }
}