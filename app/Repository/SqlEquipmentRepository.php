<?php

namespace App\Repository;

use App\Database\Database;
use App\Repository\Interfaces\RepositoryInterface;

class SqlEquipmentRepository implements RepositoryInterface
{
    private $db;

    public function __construct(){
        $this->db = new Database();
}

    public function get(){
        return $this->db->select('equipment');
    }

    public function getEnum($column){
        $type = $this->db->select_enums('equipment', $column);
        preg_match("/^enum\(\'(.*)\'\)$/", $type->fetch_assoc()['Type'], $matches);
        $enum = explode("','", $matches[1]);
        $trimmedvals = array();
        foreach($enum as $key => $value) {
            $value=trim($value, "'");
            $trimmedvals[] = $value;
        }
        return $trimmedvals;
    }

    public function getById($id)
    {
        return $this->db->select('equipment', '*', 'id='.$id);
    }

    public function save($data): void
    {
        $this->db->insert('equipment', $data);
    }

    public function update($data): void
    {
        $set =
            'staff_id=' . $data['staff_id'] .
            ', office_id=' . $data['office_id'] .
            ', invNo="' . $data['invNo'] .
            '", specs="' . $data['specs'] .
            '", equipment_status="' . $data['equipment_status'] .
            '", movement_status="' . $data['movement_status'] . '"';
        $this->db->update('equipment', $set, 'id='.$data['id']);
    }

    public function delete($id): void
    {
        $this->db->delete('equipment', 'id='.$id);
    }
}