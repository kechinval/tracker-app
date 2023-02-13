<?php

namespace App\Repository;

use App\Database\Database;
use App\Repository\Interfaces\RepositoryInterface;

class SqlOfficesRepository implements RepositoryInterface
{
    public static function get(){
        $db = new Database();
        return $db->select('offices');
    }

    public static function getById($id)
    {
        $db = new Database();
        return $db->select('offices', '*', 'id='.$id);
    }

    public static function save($data): void
    {
        $db = new Database();
        $db->insert('offices', $data);
    }

    public static function update($data): void
    {
        $db = new Database();
        $set = 'address="'.$data['address'] . '", numbers_of_workspaces='.$data['numbers_of_workspaces'];
        $db->update('offices', $set, 'id='.$data['id']);
    }

    public static function delete($id): void
    {
        $db = new Database();
        $db->delete('offices', 'id='.$id);
    }
}