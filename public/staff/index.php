<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Repository\SqlStaffRepository;
use App\Repository\SqlOfficesRepository;

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
            <th scope="col">Офис</th>
            <th scope="col">Имя пользователя</th>
            <th scope="col">Email</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Фамилия</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $SqlStaffRepository = new SqlStaffRepository();
        $staff = $SqlStaffRepository->get();
        if ($staff) {
            while ($row = $staff->fetch_assoc()) {
                $SqlOfficesRepository = new SqlOfficesRepository();
                $office = $SqlOfficesRepository->getById($row['office_id']);
                $off = $office->fetch_assoc()?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $off['address'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td><?= $row['middlename'] ?></td>
                    <td><?= $row['lastname'] ?></td>
                    <td style="display: flex">
                        <a class="btn btn-primary" href="update.php?id=<?= $row['id'] ?>" role="button">Изменить</a>
                        <form action="../../app/Services/StaffService.php?id=<?=$row['id']?>" method="POST">
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