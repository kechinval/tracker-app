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
        header("Location: ../../public/staff/index.php?success=Created");
    case (isset($_POST['login'])):
        $db = new Database();
        $password = md5($_POST['password']);
        $res = $db->select(
            'staff',
            '*',
            'username="'.$_POST['username'] . '" AND password="' . md5($_POST['password']) .'"' );
        $user = $res->fetch_assoc();
        if ($user) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['session'] = md5($user['username']);

//            echo $_SESSION['id'];

//            echo $_SESSION['session'];
//            setcookie("cookie", md5($user['username']), time() + 3600, '/');
            header("Location: ../../public/staff/index.php");
        } else {
            header("Location: /public/index.php?error=Wrong username or password");
        }
        break;
    case (isset($_POST['logout'])):
        session_start();
        session_destroy();
        header("Location: /public/index.php");
        break;
}