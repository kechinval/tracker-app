<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Rules\RuleInt;
use App\Core\Rules\RuleRequired;

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
            'staff_id' => [new RuleRequired()],
            'office_id' => [new RuleRequired()],
            'invNo' => [new RuleRequired(), new RuleInt()],
            'specs' => [new RuleRequired()],
            'equipment_status' => [new RuleRequired()],
            'movement_status' => [new RuleRequired()]
        ];
    }
}