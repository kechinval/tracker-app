<?php

/**
 * @var App\Models\Equipment $equipment ;
 * @var App\Models\Office $office ;
 * @var App\Models\Staff $staff ;
 */

?>

<div class="row mb-3">
    <a class="btn btn-primary" href="equipment/create">Добавить</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Сотрудник</th>
        <th scope="col">Офис</th>
        <th scope="col">Инв. номер</th>
        <th scope="col">Спецификации</th>
        <th scope="col">Статус оборудования</th>
        <th scope="col">Статут перемещения</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($equipment)) {
        foreach ($equipment as $item) { ?>
            <tr>
                <th scope="row"><?= $item->id ?></th>
                <td><?php //$staff->lastname ?? '' ?></td>
                <td><?php //$office->address ?></td>
                <td><?= $item->invNo ?></td>
                <td><?= $item->specs ?></td>
                <td><?= $item->equipment_status ?></td>
                <td><?= $item->movement_status ?></td>
                <td style="display: flex">
                    <a class="btn btn-primary" href="equipment/<?= $item->id ?>" role="button">Подробнее</a>
                    <a class="btn btn-primary" href="equipment/edit/<?= $item->id ?>" role="button">Изменить</a>
                    <a class="btn btn-danger" href="equipment/destroy/<?= $item->id ?>" role="button">Удалить</a>
                </td>
            </tr>
        <?php }
    } else {
        printf('No record found.<br />');
    } ?>
    </tbody>
</table>