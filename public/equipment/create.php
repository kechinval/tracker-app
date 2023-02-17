<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlEquipmentRepository;
use App\Repository\SqlOfficesRepository;
use App\Repository\SqlStaffRepository;

include '../templates/header.php';

$SqlEquipmentRepository = new SqlEquipmentRepository();
$SqlOfficesRepository = new SqlOfficesRepository();
$SqlStaffRepository = new SqlStaffRepository();
?>

<form action="../../app/Services/EquipmentService.php" method="POST">
    <div class="form-group">
        <label for="invNo">Инвентарный номер</label>
        <input type="text" class="form-control" id="invNo" name="invNo" placeholder="Инвентарный номер">
    </div>
    <div class="form-group">
        <label for="specs">Спецификации</label>
        <input type="text" class="form-control" id="specs" name="specs" placeholder="Спецификации">
    </div>
    <div class="form-group">
        <label for="equipment_status">Статус оборудования</label>
        <select id="equipment_status" name="equipment_status" class="form-control">
            <?php
            $result = $SqlEquipmentRepository->getEnum('equipment_status');
            foreach ($result as $row) { ?>
                <option value="<?= $row ?>"><?= $row ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="movement_status">Статус перемещения</label>
        <select id="movement_status" name="movement_status" class="form-control">
            <?php
            $result = $SqlEquipmentRepository->getEnum('movement_status');
            foreach ($result as $row) { ?>
                <option value="<?= $row ?>"><?= $row ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="staff_id">Сотрудник</label>
        <select id="staff_id" name="staff_id" class="form-control">
            <?php
            $result = $SqlStaffRepository->get();
            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['lastname'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="office_id">Офис</label>
        <select id="office_id" name="office_id" class="form-control">
            <?php
            $result = $SqlOfficesRepository->get();
            if ($result) {
                while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['address'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="create" class="btn btn-primary">Создать</button>
    </div>
</form>