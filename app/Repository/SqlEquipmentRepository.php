<?php

namespace App\Repository;

use App\Database\Database;
use App\Repository\Interfaces\RepositoryInterface;

class SqlEquipmentRepository implements RepositoryInterface
{
    public static function get(){
        $db = new Database();
        return $db->select('equipment');
    }

    public static function getEnum($column){
        $db = new Database();
        $type = $db->select_enums('equipment', $column);
        preg_match("/^enum\(\'(.*)\'\)$/", $type->fetch_assoc()['Type'], $matches);
        $enum = explode("','", $matches[1]);
        $trimmedvals = array();
        foreach($enum as $key => $value) {
            $value=trim($value, "'");
            $trimmedvals[] = $value;
        }
        return $trimmedvals;
    }

    public static function getById($id)
    {
        $db = new Database();
        return $db->select('equipment', '*', 'id='.$id);
    }

    public static function save($data): void
    {
        $db = new Database();
        $db->insert('equipment', $data);
    }

    public static function update($data): void
    {
        $db = new Database();
        $set =
            'staff_id=' . $data['staff_id'] .
            ', office_id=' . $data['office_id'] .
            ', invNo="' . $data['invNo'] .
            '", specs="' . $data['specs'] .
            '", equipment_status="' . $data['equipment_status'] .
            '", movement_status="' . $data['movement_status'] . '"';
        $db->update('equipment', $set, 'id='.$data['id']);
    }

    public static function delete($id): void
    {
        $db = new Database();
        $db->delete('equipment', 'id='.$id);
    }
}