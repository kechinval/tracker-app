<?php

namespace App\Repository\Interfaces;

use App\Models\Staff;

interface RepositoryInterface {
    public static function get();
    public static function getById($id);
    public static function save($data): void;
    public static function update($data): void;
    public static function delete($id): void;
}