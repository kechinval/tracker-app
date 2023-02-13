<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlStaffRepository;
use App\Database\Database;

switch (true){
    case (isset($_POST['register'])):
        $password = md5($_POST['password']);
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
    case (isset($_POST['login'])):
        $db = new Database();
        $password = md5($_POST['password']);
        $res = $db->select(
            'staff',
            '*',
            'username="'.$_POST['username'] . '" AND password="' . md5($_POST['password']) .'"' );
        $user = $res->fetch_assoc();
        if ($user) {
            setcookie("id", $user['id'], time() + 3600, '/');
            setcookie("cookie", md5($user['username']), time() + 3600, '/');
            return header("Location: ../../public/staff/index.php");
        } else {
            return header("Location: /public/index.php?error=Wrong username or password");
        }
    case (isset($_POST['logout'])):
        setcookie("id", '', time() - 3600, '/');
        setcookie("cookie", '', time() - 3600, '/');
        return header("Location: /public/index.php");
}