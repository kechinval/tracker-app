<?php

/**
 * @var App\Models\Equipment $equipment
 * @var App\Models\Staff $staff
 * @var App\Models\Office $offices
 * @var array $equipmentStatus
 * @var array $movementStatus
 */

?>

<form action="update" method="POST">
    <input type="hidden" class="form-control" id="id" name="id"
           value="<?= $equipment->id ?>">
    <div class="form-group">
        <label for="invNo">Инвентарный номер</label>
        <input type="text"
               class="form-control <?php echo $equipment->hasErrors('invNo') ? 'is-invalid' : '' ?>"
               value="<?php echo $equipment->invNo ?? '' ?>"
               id="invNo"
               name="invNo">
        <div class="invalid-feedback">
            <?php echo $equipment->getFirstError('invNo') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="specs">Спецификации</label>
        <input type="text"
               class="form-control <?php echo $equipment->hasErrors('specs') ? 'is-invalid' : '' ?>"
               value="<?php echo $equipment->specs ?? '' ?>"
               id="specs"
               name="specs">
        <div class="invalid-feedback">
            <?php echo $equipment->getFirstError('specs') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="equipment_status">Статус оборудования</label>
        <select id="equipment_status"
                name="equipment_status"
                class="form-control <?php echo $equipment->hasErrors('equipment_status') ? 'is-invalid' : '' ?>">
            <?php foreach ($equipmentStatus as $status) { ?>
                <option value="<?= $status ?>"><?= $status ?></option>
            <?php } ?>
        </select>
        <div class="invalid-feedback">
            <?php echo $equipment->getFirstError('equipment_status') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="movement_status">Статус перемещения</label>
        <select id="movement_status"
                name="movement_status"
                class="form-control <?php echo $equipment->hasErrors('movement_status') ? 'is-invalid' : '' ?>">
            <?php foreach ($movementStatus as $status) { ?>
                <option value="<?= $status ?>"><?= $status ?></option>
            <?php } ?>
        </select>
        <div class="invalid-feedback">
            <?php echo $equipment->getFirstError('movement_status') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="staff_id">Сотрудник</label>
        <select id="staff_id"
                name="staff_id"
                class="form-control <?php echo $equipment->hasErrors('staff_id') ? 'is-invalid' : '' ?>">
            <?php if ($staff) {
                foreach ($staff as $item) {
                    echo '<option value="' . $item->id . '" '.(( isset($equipment->staff_id) && $item->id == $equipment->staff_id) ? 'selected' : '').'>' . $item->lastname . '</option>';
                }
            } ?>
        </select>
        <div class="invalid-feedback">
            <?php echo $equipment->getFirstError('staff_id') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="office_id">Офис</label>
        <select id="office_id"
                name="office_id"
                class="form-control <?php echo $equipment->hasErrors('office_id') ? 'is-invalid' : '' ?>">
            <?php if ($offices) {
                foreach ($offices as $office) {
                    echo '<option value="'. $office->id.'" '.(( isset($equipment->office_id) && $office->id == $equipment->office_id) ? 'selected' : '').'>'.$office->address.'</option>';
                }
            } ?>
        </select>
        <div class="invalid-feedback">
            <?php echo $equipment->getFirstError('office_id') ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="equipment/update" class="btn btn-primary">Обновить</button>
    </div>
</form>