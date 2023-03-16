<?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
    </div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
    </div>
<?php } ?>
<form action="" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" name="login" class="btn btn-primary">Войти</button>
    <a class="btn btn-secondary" href="register">Регистрация</a>
</form>
