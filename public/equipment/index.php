<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlEquipmentRepository;

include '../templates/header.php'

?>

    <div class="row mb-3">
        <a class="btn btn-primary" href="create.php">Добавить</a>
    </div>
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['success']; ?>
        </div>
    <?php } ?>
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
        </tr>
        </thead>
        <tbody>
        <?php
        $result = SqlEquipmentRepository::get();
        if ($result) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['staff_id'] ?></td>
                    <td><?= $row['office_id'] ?></td>
                    <td><?= $row['invNo'] ?></td>
                    <td><?= $row['specs'] ?></td>
                    <td><?= $row['equipment_status'] ?></td>
                    <td><?= $row['movement_status'] ?></td>
                    <td style="display: flex">
                        <a class="btn btn-primary" href="update.php?id=<?= $row['id'] ?>" role="button">Изменить</a>
                        <form action="../../app/Services/EquipmentService.php?id=<?=$row['id']?>" method="POST">
                            <button type="submit" id="<?=$row['id']?>" name="delete" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php }
        } else {
            printf('No record found.<br />');
        } ?>
        </tbody>
    </table>
</div>
</body>
</html>