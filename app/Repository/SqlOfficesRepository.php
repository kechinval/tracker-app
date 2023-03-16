<?php

namespace App\Repository;

use App\Core\Collection;
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
        $array = [];
        $sql_result = $this->db->select('offices');

        while ($row = $sql_result->fetch_assoc()) {
            $office = new Office();
            $office->loadData($row);
            $array[] = $office;
        }

        return Collection::make($array);
    }

    public function getById($id)
    {
        $office = new Office();
        $office->loadData($this->db->select('offices', '*', 'id='.$id)->fetch_assoc());
        return $office;
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
        //TODO update
        $set = 'address="'.$data->address . '", numbers_of_workspaces='.$data->numbers_of_workspaces;
        $this->db->update('offices', $set, 'id='.$data->id);
    }

    public function delete($id): void
    {
        $this->db->delete('offices', 'id='.$id);
    }
}