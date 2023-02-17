<?php

use App\Database\Database;

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['session'])){
    $db = new Database();
    $res = $db->select('staff', '*', $_SESSION['id']);
    $user = $res->fetch_assoc();

    if(!md5($user['username'] === $_SESSION['session'])){
        header("Location: /public/index.php");
        exit();
    }
} else {
    header("Location: /public/index.php");
    exit();
}