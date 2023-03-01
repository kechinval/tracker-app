<?php

require_once __DIR__.'/../../vendor/autoload.php';

use App\Repository\SqlOfficesRepository;
use App\Models\Office;

$SqlOfficesRepository = new SqlOfficesRepository();

switch (true)
{
    case (isset($_POST['create'])):
        $data = new Office();
        $data->address = $_POST['address'];
        $data->numbers_of_workspaces = $_POST['numbers_of_workspaces'];
        $SqlOfficesRepository->save($data);
        header("Location: ../../public/offices/index.php?success=Created");
        break;
    case (isset($_POST['update'])):
        $data = new Office();
        $data->id = $_POST['id'];
        $data->address = $_POST['address'];
        $data->numbers_of_workspaces = $_POST['numbers_of_workspaces'];
        $SqlOfficesRepository->update($data);
        header("Location: ../../public/offices/index.php?success=Updated");
        break;
    case (isset($_POST['delete'])):
        $SqlOfficesRepository->delete($_GET['id']);
        header("Location: ../../public/offices/index.php?success=Deleted");
        break;
}