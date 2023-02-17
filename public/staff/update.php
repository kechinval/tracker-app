<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlStaffRepository;
use App\Repository\SqlOfficesRepository;

include '../templates/header.php'
?>

<form action="../../app/Services/StaffService.php" method="POST">
    <?php
    $SqlStaffRepository = new SqlStaffRepository();
    $staff = $SqlStaffRepository->getById($_GET['id'])->fetch_assoc();?>
    <input type="hidden" class="form-control" id="id" name="id"
           value="<?= $_GET['id'] ?>">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username" value="<?=$staff['username']?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?=$staff['email']?>">
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" value="<?=$staff['password']?>">
    </div>
    <div class="form-group">
        <label for="firstname">Имя</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$staff['firstname']?>">
    </div>
    <div class="form-group">
        <label for="middlename">Отчество</label>
        <input type="text" class="form-control" id="middlename" name="middlename" value="<?=$staff['middlename']?>">
    </div>
    <div class="form-group">
        <label for="lastname">Фамилия</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$staff['lastname']?>">
    </div>
    <div class="form-group">
        <label for="office_id">Офис</label>
        <select id="office_id" name="office_id" class="form-control">
            <?php
            $SqlOfficesRepository = new SqlOfficesRepository();
            $offices = $SqlOfficesRepository->get();
            if ($offices) {
                while ($office = $offices->fetch_assoc()) { ?>
                    <option value="<?= $office['id']?>" <?= ($office['id'] === $staff['office_id'] ? "selected" : "")?>><?= $office['address'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="update" class="btn btn-primary">Обновить</button>
    </div>
</form>