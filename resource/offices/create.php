<?php
/** @var App\Models\Office $office */
?>

<form action="store" method="POST">
    <div class="form-group">
        <label for="address">Адрес</label>
        <input type="text"
               class="form-control <?php echo $office->hasErrors('address') ? 'is-invalid' : '' ?>"
               value="<?php echo $office->address ?? '' ?>"
               id="address"
               name="address"
               aria-describedby="address">
        <div class="invalid-feedback">
            <?php echo $office->getFirstError('address') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="numbers_of_workspaces">Количество рабочих мест</label>
        <input type="text"
               class="form-control <?php echo $office->hasErrors('numbers_of_workspaces') ? 'is-invalid' : '' ?>"
               value="<?php echo $office->numbers_of_workspaces ?? '' ?>"
               id="numbers_of_workspaces"
               name="numbers_of_workspaces">
        <div class="invalid-feedback">
            <?php echo $office->getFirstError('numbers_of_workspaces') ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="create" class="btn btn-primary">Создать</button>
    </div>
</form>