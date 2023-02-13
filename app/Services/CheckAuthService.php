<?php

use App\Database\Database;

if (isset($_COOKIE['id']) and isset($_COOKIE['cookie'])){
    $db = new Database();
    $res = $db->select('staff', '*', $_COOKIE['id']);
    $user = $res->fetch_assoc();

    if(!md5($user['username'] === $_COOKIE['cookie'])){
        header("Location: /public/index.php");
        exit();
    }
} else {
    header("Location: /public/index.php");
    exit();
}