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
<div class="row">
    <div class="col">
        Инвентарный номер: <?= $equipment->invNo ?>
    </div>
    <div class="col">
        Характеристики: <?= $equipment->specs ?>
    </div>
</div>
<div class="row">
    <div class="col">
        Статус оборудования: <?= $equipment->equipment_status ?> <br>
        Статус перемещения: <?= $equipment->movement_status ?>
    </div>
    <div class="col">
        Офис: <?= $office->address ?> <br>
        Сотрудник: <?= $staff->lastname ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <img src="../../img/qrcode<?= $equipment->id ?>.png">
    </div>
</div>