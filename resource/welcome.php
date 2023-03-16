<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <?php if (!\App\Core\App::isGuest()): ?>
    <div class="row mt-3 mb-3" style="display: flex; gap: 3em">
        <a class="btn btn-primary" href="/equipment">Оборудование</a>
        <a class="btn btn-primary" href="/offices">Офисы</a>
        <a class="btn btn-primary" href="/staff">Сотрудники</a>
        <div style="display:flex; margin-left: auto">
            <a class="btn btn-primary" href="/logout">Выход</a>
        </div>
    </div>
        <?php endif; ?>
    <?php if (\App\Core\App::$app->session->getFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo \App\Core\App::$app->session->getFlash('success') ?>
    </div>
    <?php endif;?>
    <?php if (\App\Core\App::$app->session->getFlash('error')): ?>
        <div class="alert alert-danger">
            <?php echo \App\Core\App::$app->session->getFlash('error') ?>
        </div>
    <?php endif;?>
    {{content}}
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>