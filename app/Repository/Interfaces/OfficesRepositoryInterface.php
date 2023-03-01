<?php

namespace App\Repository\Interfaces;

use App\Models\Office;

interface OfficesRepositoryInterface {
    public function get();

    public function getById($id);

    public function save(Office $data): void;

    public function update(Office $data): void;

    public function delete($id): void;
}