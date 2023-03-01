<?php

namespace App\Repository\Interfaces;

use App\Models\Staff;

interface StaffRepositoryInterface
{
    public function get();

    public function getById($id);

    public function save(Staff $data): void;

    public function update(Staff $data): void;

    public function delete($id): void;
}
