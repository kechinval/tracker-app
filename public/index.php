<?php

require_once __DIR__.'/../app/bootstrap.php';

use App\Core\App;
use App\Controllers\AuthController;
use App\Controllers\EquipmentController;
use App\Controllers\OfficesController;
use App\Controllers\StaffController;

$app = new App();

$app->router->get('/', [AuthController::class, 'login']);
$app->router->post('/', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/staff', [StaffController::class, 'index']);
$app->router->get('/staff/create', [StaffController::class, 'create']);
$app->router->post('/staff/store', [StaffController::class, 'store']);
$app->router->get('/staff/edit/{id}', [StaffController::class, 'edit']);
$app->router->post('/staff/edit/update', [StaffController::class, 'update']);
$app->router->get('/staff/destroy/{id}', [StaffController::class, 'destroy']);

$app->router->get('/offices', [OfficesController::class, 'index']);
$app->router->get('/offices/create/', [OfficesController::class, 'create']);
$app->router->post('/offices/store', [OfficesController::class, 'store']);
$app->router->get('/offices/edit/{id}', [OfficesController::class, 'edit']);
$app->router->post('/offices/edit/update', [OfficesController::class, 'update']);
$app->router->get('/offices/destroy/{id}', [OfficesController::class, 'destroy']);

$app->router->get('/equipment', [EquipmentController::class, 'index']);
$app->router->get('/equipment/create/', [EquipmentController::class, 'create']);
$app->router->post('/equipment/store', [EquipmentController::class, 'store']);
$app->router->get('/equipment/edit/{id}', [EquipmentController::class, 'edit']);
$app->router->post('/equipment/edit/update', [EquipmentController::class, 'update']);
$app->router->get('/equipment/destroy/{id}', [EquipmentController::class, 'destroy']);

$app->run();