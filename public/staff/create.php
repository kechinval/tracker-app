<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlOfficesRepository;

include '../templates/header.php'
?>

<form action="../../app/Services/StaffService.php" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Имя пользователя">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Адрес">
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
    </div>
    <div class="form-group">
        <label for="firstname">Имя</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Имя">
    </div>
    <div class="form-group">
        <label for="middlename">Отчество</label>
        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Отчество">
    </div>
    <div class="form-group">
        <label for="lastname">Фамилия</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Фамилия">
    </div>
    <div class="form-group">
        <label for="office_id">Офис</label>
        <select id="office_id" name="office_id" class="form-control">
            <?php
            $SqlOfficesRepository = new SqlOfficesRepository();
            $office = $SqlOfficesRepository->get();
            if ($office) {
                while ($row = $office->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['address'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="create" class="btn btn-primary">Создать</button>
    </div>
</form>