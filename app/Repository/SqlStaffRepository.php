<?php

namespace App\Repository;

use App\Repository\Interfaces\RepositoryInterface;
use App\Database\Database;
use App\Models\Staff;

class SqlStaffRepository implements RepositoryInterface{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get(){
        return $this->db->select('staff');
    }

    public function getById($id)
    {
        return $this->db->select('staff', '*', 'id='.$id);
    }

    public function save($data): void
    {
        $this->db->insert('staff', $data);
    }

    public function update($data): void
    {
        $set = 'office_id=' . $data['office_id'] .
               ', username="' . $data['username'] .
               '", email="' . $data['email'] .
               '", firstname="' . $data['firstname'] .
               '", middlename="' . $data['middlename'] .
               '", lastname="' . $data['lastname'] . '"';
        $this->db->update('staff', $set, 'id='.$data['id']);
    }

    public function delete($id): void
    {
        $this->db->delete('staff', 'id='.$id);
    }
}