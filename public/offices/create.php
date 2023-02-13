<?php
include '../templates/header.php'
?>

<form action="../../app/Services/OfficesService.php" method="POST">
    <div class="form-group">
        <label for="address">Адрес</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="address"
               placeholder="Адрес">
    </div>
    <div class="form-group">
        <label for="numbers_of_workspaces">Количество рабочих мест</label>
        <input type="text" class="form-control" id="numbers_of_workspaces" name="numbers_of_workspaces"
               placeholder="Количество рабочих мест">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="create" class="btn btn-primary">Создать</button>
    </div>
</form>
</body>
</html>