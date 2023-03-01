<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Models\Equipment;
use App\Repository\SqlEquipmentRepository;

$SqlEquipmentRepository = new SqlEquipmentRepository();

switch (true)
{
    case (isset($_POST['create'])):
        $data = new Equipment();
        $data->staff_id = $_POST['staff_id'];
        $data->office_id = $_POST['office_id'];
        $data->invNO = $_POST['invNo'];
        $data->specs = $_POST['specs'];
        $data->equipment_status = $_POST['equipment_status'];
        $data->movement_status = $_POST['movement_status'];
        $SqlEquipmentRepository->save($data);
        header("Location: ../../public/equipment/index.php?success=Created");
        break;
    case (isset($_POST['update'])):
        $data = new Equipment();
        $data->id = $_POST['id'];
        $data->staff_id = $_POST['staff_id'];
        $data->office_id = $_POST['office_id'];
        $data->invNO = $_POST['invNo'];
        $data->specs = $_POST['specs'];
        $data->equipment_status = $_POST['equipment_status'];
        $data->movement_status = $_POST['movement_status'];
        $SqlEquipmentRepository->update($data);
        header("Location: ../../public/equipment/index.php?success=Updated");
        break;
    case (isset($_POST['delete'])):
        $SqlEquipmentRepository->delete($_GET['id']);
        header("Location: ../../public/equipment/index.php?success=Deleted");
        break;
}