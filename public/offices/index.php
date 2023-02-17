<?php
require __DIR__ . '/../../vendor/autoload.php';

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
            <th scope="col">Адрес</th>
            <th scope="col">Количество рабочих мест</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $SqlOfficesRepository = new SqlOfficesRepository();
        $offices = $SqlOfficesRepository->get();
        if ($offices) {
            while ($row = $offices->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['numbers_of_workspaces'] ?></td>
                    <td style="display: flex">
                        <a class="btn btn-primary" href="update.php?id=<?= $row['id'] ?>" role="button">Изменить</a>
                        <form action="../../app/Services/OfficesService.php?id=<?=$row['id']?>" method="POST">
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