<?php

namespace App\Repository;

use App\Core\Collection;
use App\Database\Database;
use App\Models\Equipment;
use App\Repository\Interfaces\EquipmentRepositoryInterface;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class SqlEquipmentRepository implements EquipmentRepositoryInterface
{
    private $db;

    public function __construct(){
        $this->db = new Database();
}

    public function get(){
        $array = [];
        $sql_result = $this->db->select('equipment');

        while ($row = $sql_result->fetch_assoc()) {
            $equipment = new Equipment();
            $equipment->loadData($row);
            $array[] = $equipment;
        }

        return Collection::make($array);
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
        $equipment = new Equipment();
        $equipment->loadData($this->db->select('equipment', '*', 'id='.$id)->fetch_assoc());
        return $equipment;
    }

    public function save(Equipment $data): void
    {
        $equipment = array(
          'staff_id' => $data->staff_id,
          'office_id' => $data->office_id,
          'invNo' => $data->invNo,
          'specs' => $data->specs,
          'equipment_status' => $data->equipment_status,
          'movement_status' => $data->movement_status
        );
        $id = $this->db->insert('equipment', $equipment);
        $this->generateQrCode($id);
    }

    public function generateQrCode($id): void
    {
        $writer = new PngWriter();
        $qrCode = new QrCode("http://localhost/equipment/{$id}");
        $qrCode->setSize(300);
        $result = $writer->write($qrCode);
        $result->saveToFile(__DIR__."/../../public/img/qrcode{$id}.png");
    }

    public function update($data): void
    {
        //TODO update
        $set =
            'staff_id=' . $data->staff_id .
            ', office_id=' . $data->office_id .
            ', invNo="' . $data->invNo .
            '", specs="' . $data->specs .
            '", equipment_status="' . $data->equipment_status .
            '", movement_status="' . $data->movement_status . '"';
        $this->db->update('equipment', $set, 'id='.$data->id);
    }

    public function delete($id): void
    {
        $this->db->delete('equipment', 'id='.$id);
    }
}