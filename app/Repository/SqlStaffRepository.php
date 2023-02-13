<?php

namespace App\Repository;

use App\Repository\Interfaces\RepositoryInterface;
use App\Database\Database;
use App\Models\Staff;

class SqlStaffRepository implements RepositoryInterface{

    public static function get(){
        $db = new Database();
        return $db->select('staff');
    }

    public static function getById($id)
    {
        $db = new Database();
        return $db->select('staff', '*', 'id='.$id);
    }

    public static function save($data): void
    {
        $db = new Database();
        $db->insert('staff', $data);
    }

    public static function update($data): void
    {
        $db = new Database();
        $set = 'office_id=' . $data['office_id'] .
               ', username="' . $data['username'] .
               '", email="' . $data['email'] .
               '", firstname="' . $data['firstname'] .
               '", middlename="' . $data['middlename'] .
               '", lastname="' . $data['lastname'] . '"';
        $db->update('staff', $set, 'id='.$data['id']);
    }

    public static function delete($id): void
    {
        $db = new Database();
        $db->delete('staff', 'id='.$id);
    }
}