<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlStaffRepository;
use App\Models\Staff;

$SqlStaffRepository = new SqlStaffRepository();

switch (true)
{
    case (isset($_POST['create'])):
        $data = new Staff();
        $data->office_id = $_POST['office_id'];
        $data->username = $_POST['username'];
        $data->email = $_POST['email'];
        $data->password = md5($_POST['password']);
        $data->firstname = $_POST['firstname'];
        $data->middlename = $_POST['middlename'];
        $data->lastname = $_POST['lastname'];
        $SqlStaffRepository->save($data);
        header("Location: ../../public/staff/index.php?success=Created");
        break;
    case (isset($_POST['update'])):
        $data = new Staff();
        $data->id = $_POST['id'];
        $data->office_id = $_POST['office_id'];
        $data->username = $_POST['username'];
        $data->email = $_POST['email'];
        $data->password = md5($_POST['password']);
        $data->firstname = $_POST['firstname'];
        $data->middlename = $_POST['middlename'];
        $data->lastname = $_POST['lastname'];
        $SqlStaffRepository->update($data);
        header("Location: ../../public/staff/index.php?success=Updated");
        break;
    case (isset($_POST['delete'])):
        $SqlStaffRepository->delete($_GET['id']);
        header("Location: ../../public/staff/index.php?success=Deleted");
        break;
}