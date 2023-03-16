<?php

/**
 * @var App\Models\Office $offices
 */

?>

<div class="row mb-3">
    <a class="btn btn-primary" href="offices/create">Добавить</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Адрес</th>
        <th scope="col">Количество рабочих мест</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($offices)) {
        foreach ($offices as $office) { ?>
            <tr>
                <th scope="row"><?= $office->id ?></th>
                <td><?= $office->address ?></td>
                <td><?= $office->numbers_of_workspaces ?></td>
                <td style="display: flex">
                    <a class="btn btn-primary" href="offices/edit/<?= $office->id ?>" role="button">Изменить</a>
                    <a class="btn btn-danger" href="offices/destroy/<?= $office->id ?>" role="button">Удалить</a>
                </td>
            </tr>
        <?php }
    } else {
        printf('No record found.<br />');
    } ?>
    </tbody>
</table>