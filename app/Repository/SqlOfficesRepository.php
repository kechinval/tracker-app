<?php

namespace App\Repository;

use App\Database\Database;
use App\Repository\Interfaces\OfficesRepositoryInterface;
use App\Models\Office;

class SqlOfficesRepository implements OfficesRepositoryInterface
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

    public function save(Office $data): void
    {
        $office = array(
          'address' => $data->address,
          'numbers_of_workspaces' => $data->numbers_of_workspaces
        );
        $this->db->insert('offices', $office);
    }

    public function update(Office $data): void
    {
        $set = 'address="'.$data->address . '", numbers_of_workspaces='.$data->numbers_of_workspaces;
        $this->db->update('offices', $set, 'id='.$data->id);
    }

    public function delete($id): void
    {
        $this->db->delete('offices', 'id='.$id);
    }
}