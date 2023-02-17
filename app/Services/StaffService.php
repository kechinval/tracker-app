<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlStaffRepository;

$SqlStaffRepository = new SqlStaffRepository();

switch (true)
{
    case (isset($_POST['create'])):
        $data = array(
            $_POST['office_id'],
            $_POST['username'],
            $_POST['email'],
            md5($_POST['password']),
            $_POST['firstname'],
            $_POST['middlename'],
            $_POST['lastname']);
        $SqlStaffRepository->save($data);
        header("Location: ../../public/staff/index.php?success=Created");
        break;
    case (isset($_POST['update'])):
        $data = array(
            'id' => $_POST['id'],
            'office_id' => $_POST['office_id'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'firstname' => $_POST['firstname'],
            'middlename' => $_POST['middlename'],
            'lastname' => $_POST['lastname']);
        $SqlStaffRepository->update($data);
        header("Location: ../../public/staff/index.php?success=Updated");
        break;
    case (isset($_POST['delete'])):
        $SqlStaffRepository->delete($_GET['id']);
        header("Location: ../../public/staff/index.php?success=Deleted");
        break;
}