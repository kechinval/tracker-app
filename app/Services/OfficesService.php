<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlOfficesRepository;

switch (true)
{
    case (isset($_POST['create'])):
        $data = array($_POST['address'], $_POST['numbers_of_workspaces']);
        SqlOfficesRepository::save($data);
        return header("Location: ../../public/offices/index.php?success=Created");
    case (isset($_POST['update'])):
        $data = array('id' => $_POST['id'], 'address' => $_POST['address'], 'numbers_of_workspaces' => $_POST['numbers_of_workspaces']);
        SqlOfficesRepository::update($data);
        return header("Location: ../../public/offices/index.php?success=Updated");
    case (isset($_POST['delete'])):
        SqlOfficesRepository::delete($_GET['id']);
        return header("Location: ../../public/offices/index.php?success=Deleted");
}