<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlOfficesRepository;

include '../templates/header.php'

?>

<form action="../../app/Services/OfficesService.php" method="POST">
    <?php
    $SqlOfficesRepository = new SqlOfficesRepository();
    $office = $SqlOfficesRepository->getById($_GET['id'])->fetch_assoc(); ?>
    <input type="hidden" class="form-control" id="id" name="id"
           value="<?= $_GET['id'] ?>">
    <div class="form-group">
        <label for="address">Адрес</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="address"
               value="<?= $office['address'] ?>">
    </div>
    <div class="form-group">
        <label for="numbers_of_workspaces">Количество рабочих мест</label>
        <input type="text" class="form-control" id="numbers_of_workspaces" name="numbers_of_workspaces"
               value="<?= $office['numbers_of_workspaces'] ?>">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="update" class="btn btn-primary">Изменить</button>
    </div>
</form>