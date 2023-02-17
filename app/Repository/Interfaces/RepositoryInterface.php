<?php

namespace App\Repository\Interfaces;

use App\Models\Staff;

interface RepositoryInterface {
    public function get();
    public function getById($id);
    public function save($data): void;
    public function update($data): void;
    public function delete($id): void;
}