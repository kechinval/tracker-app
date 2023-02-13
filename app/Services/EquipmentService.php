<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlEquipmentRepository;

switch (true)
{
    case (isset($_POST['create'])):
        $data = array(
            $_POST['staff_id'],
            $_POST['office_id'],
            $_POST['invNo'],
            $_POST['specs'],
            $_POST['equipment_status'],
            $_POST['movement_status']
        );
        SqlEquipmentRepository::save($data);
        return header("Location: ../../public/equipment/index.php?success=Created");
    case (isset($_POST['update'])):
        $data = array(
            'id' => $_POST['id'],
            'staff_id' => $_POST['staff_id'],
            'office_id' => $_POST['office_id'],
            'invNo' => $_POST['invNo'],
            'specs' => $_POST['specs'],
            'equipment_status' => $_POST['equipment_status'],
            'movement_status' => $_POST['movement_status']
        );
        SqlEquipmentRepository::update($data);
        return header("Location: ../../public/equipment/index.php?success=Updated");
    case (isset($_POST['delete'])):
        SqlEquipmentRepository::delete($_GET['id']);
        return header("Location: ../../public/equipment/index.php?success=Deleted");
}