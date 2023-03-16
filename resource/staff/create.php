<?php

/**
 * @var App\Models\Staff $staff
 * @var App\Models\Office $offices
 */

?>

<form action="store" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text"
               class="form-control <?php echo $staff->hasErrors('username') ? 'is-invalid' : ''?>"
               value="<?php echo $staff->username ?? '' ?>"
               id="username"
               name="username">
        <div class="invalid-feedback">
            <?php echo $staff->getFirstError('username')?>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text"
               class="form-control <?php echo $staff->hasErrors('email') ? 'is-invalid' : ''?>"
               value="<?php echo $staff->email ?? '' ?>"
               id="email"
               name="email">
        <div class="invalid-feedback">
            <?php echo $staff->getFirstError('email')?>
        </div>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password"
               class="form-control <?php echo $staff->hasErrors('password') ? 'is-invalid' : ''?>"
               value="<?php echo $staff->password ?? '' ?>"
               id="password"
               name="password">
        <div class="invalid-feedback">
            <?php echo $staff->getFirstError('password')?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm">
            <label for="lastname">Фамилия</label>
            <input type="text"
                   class="form-control <?php echo $staff->hasErrors('lastname') ? 'is-invalid' : ''?>"
                   value="<?php echo $staff->lastname ?? '' ?>"
                   id="lastname"
                   name="lastname">
            <div class="invalid-feedback">
                <?php echo $staff->getFirstError('lastname')?>
            </div>
        </div>
        <div class="form-group col-sm">
            <label for="firstname">Имя</label>
            <input type="text"
                   class="form-control <?php echo $staff->hasErrors('firstname') ? 'is-invalid' : ''?>"
                   value="<?php echo $staff->firstname ?? '' ?>"
                   id="firstname"
                   name="firstname">
            <div class="invalid-feedback">
                <?php echo $staff->getFirstError('firstname')?>
            </div>
        </div>
        <div class="form-group col-sm">
            <label for="middlename">Отчество</label>
            <input type="text"
                   class="form-control <?php echo $staff->hasErrors('middlename') ? 'is-invalid' : ''?>"
                   value="<?php echo $staff->middlename ?? '' ?>"
                   id="middlename"
                   name="middlename">
            <div class="invalid-feedback">
                <?php echo $staff->getFirstError('middlename')?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="office_id">Офис</label>
        <select id="office_id" name="office_id" class="form-control">
            <?php if ($offices) {
                foreach ($offices as $office) {
                    echo '<option value="' . $office->id . '" ' . ((isset($staff->office_id) && $office->id == $staff->office_id) ? 'selected' : '') . '>' . $office->address . '</option>';
                }
            } ?>
        </select>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" name="/create" class="btn btn-primary">Создать</button>
    </div>
</form>