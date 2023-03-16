<?php

namespace App\Repository\Interfaces;

use App\Models\Staff;

interface StaffRepositoryInterface
{
    public function get();

    public function getById($id);

    public function save(Staff $staff): void;

    public function update(Staff $staff): void;

    public function delete($id): void;
}
