<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlStaffRepository;

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
        SqlStaffRepository::save($data);
        return header("Location: ../../public/staff/index.php?success=Created");
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
        SqlStaffRepository::update($data);
        return header("Location: ../../public/staff/index.php?success=Updated");
    case (isset($_POST['delete'])):
        SqlStaffRepository::delete($_GET['id']);
        return header("Location: ../../public/staff/index.php?success=Deleted");
}