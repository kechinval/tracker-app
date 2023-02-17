<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlEquipmentRepository;
use App\Repository\SqlOfficesRepository;
use App\Repository\SqlStaffRepository;

include '../templates/header.php'

?>

<form action="../../app/Services/EquipmentService.php" method="POST">
    <?php
    $SqlEquipmentRepository = new SqlEquipmentRepository();
    $equipment = $SqlEquipmentRepository->getById($_GET['id'])->fetch_assoc();?>
    <input type="hidden" class="form-control" id="id" name="id"
           value="<?= $_GET['id'] ?>">
    <div class="form-group">
        <label for="invNo">Инвентарный номер</label>
        <input type="text" class="form-control" id="invNo" name="invNo" value="<?=$equipment['invNo']?>">
    </div>
    <div class="form-group">
        <label for="specs">Спецификации</label>
        <input type="text" class="form-control" id="specs" name="specs" value="<?=$equipment['specs']?>"
    </div>
    <div class="form-group">
        <label for="equipment_status">Статус оборудования</label>
        <select id="equipment_status" name="equipment_status" class="form-control">
            <?php
            $result = $SqlEquipmentRepository->getEnum('equipment_status');
            foreach ($result as $e_status) { ?>
                <option value="<?= $e_status; ?>" <?=($e_status === $equipment['equipment_status'] ? 'selected' : '')?>><?= $e_status ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="movement_status">Статус перемещения</label>
        <select id="movement_status" name="movement_status" class="form-control">
            <?php
            $result = $SqlEquipmentRepository->getEnum('movement_status');
            foreach ($result as $m_status) { ?>
                <option value="<?= $m_status ?>" <?=($m_status === $equipment['equipment_status'] ? 'selected' : '')?>><?= $m_status ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="staff_id">Сотрудник</label>
        <select id="staff_id" name="staff_id" class="form-control">
            <?php
            $SqlStaffRepository = new SqlStaffRepository();
            $staff = $SqlStaffRepository->get();
            if ($staff) {
                while ($row = $staff->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>" <?=($row['id'] === $equipment['staff_id'] ? 'selected' : '')?>><?= $row['lastname'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="office_id">Офис</label>
        <select id="office_id" name="office_id" class="form-control">
            <?php
            $SqlOfficesRepository = new SqlOfficesRepository();
            $office = $SqlOfficesRepository->get();
            if ($office) {
                while ($row = $office->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>" <?=($row['id'] === $equipment['office_id'] ? 'selected' : '')?>><?= $row['address'] ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="update" class="btn btn-primary">Обновить</button>
    </div>
</form>