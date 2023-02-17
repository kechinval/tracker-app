<?php

namespace App\Repository;

use App\Database\Database;
use App\Repository\Interfaces\RepositoryInterface;

class SqlOfficesRepository implements RepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get(){
        return $this->db->select('offices');
    }

    public function getById($id)
    {
        return $this->db->select('offices', '*', 'id='.$id);
    }

    public function save($data): void
    {
        $this->db->insert('offices', $data);
    }

    public function update($data): void
    {
        $set = 'address="'.$data['address'] . '", numbers_of_workspaces='.$data['numbers_of_workspaces'];
        $this->db->update('offices', $set, 'id='.$data['id']);
    }

    public function delete($id): void
    {
        $this->db->delete('offices', 'id='.$id);
    }
}