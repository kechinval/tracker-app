<?php
require '../../app/Services/CheckAuthService.php';
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
<div class="row mt-3 mb-3" style="display: flex; gap: 3em">
    <a class="btn btn-primary" href="../equipment/index.php">Оборудование</a>
    <a class="btn btn-primary" href="../offices/index.php">Офисы</a>
    <a class="btn btn-primary" href="../staff/index.php">Сотрудники</a>
    <div style="display:flex; margin-left: auto">
        <form action="../../app/Services/AuthService.php" method="POST">
            <button type="submit" name="logout" class="btn btn-primary">Выход</button>
        </form>
    </div>
</div>