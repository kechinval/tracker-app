<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlOfficesRepository;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container">
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
            $offices = $SqlOfficesRepository->get();
            if ($offices) {
                while ($office = $offices->fetch_assoc()) { ?>
                    <option value="<?= $office['id'] ?>"><?= $office['address'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="create" class="btn btn-primary">Создать</button>
    </div>
</form>
</body>
</html>