<?php

/**
 * @var App\Models\Staff $staff
 * @var $office
 */

?>

<div class="row mb-3">
    <a class="btn btn-primary" href="staff/create">Добавить</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Офис</th>
        <th scope="col">Имя пользователя</th>
        <th scope="col">Email</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($staff as $item) { ?>
        <tr>
        <th scope="row"><?= $item->id ?></th>
        <td><?php echo $item->office_id //TODO implement relationship ?></td>
        <td><?= $item->username ?></td>
        <td><?= $item->email ?></td>
        <td><?= $item->lastname ?></td>
        <td><?= $item->firstname ?></td>
        <td><?= $item->middlename ?></td>
        <td style="display: flex">
            <a class="btn btn-primary" href="staff/edit/<?= $item->id ?>" role="button">Изменить</a>
            <a class="btn btn-danger" href="staff/destroy/<?= $item->id ?>" role="button">Удалить</a>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>