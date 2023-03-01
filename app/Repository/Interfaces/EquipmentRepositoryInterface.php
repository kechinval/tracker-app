<?php

namespace App\Repository\Interfaces;

use App\Models\Equipment;

interface EquipmentRepositoryInterface{
    public function get();

    public function getById($id);

    public function save(Equipment $data): void;

    public function update(Equipment $data): void;

    public function delete($id): void;
}