<?php

namespace App\Services;

use App\Core\App;
use App\Models\Equipment;
use App\Repository\SqlEquipmentRepository;

class EquipmentService{
    private SqlEquipmentRepository $sqlEquipmentRepository;

    public function __construct()
    {
        $this->sqlEquipmentRepository = new SqlEquipmentRepository();
    }

    public function store(Equipment $equipment): void
    {
        $this->sqlEquipmentRepository->save($equipment);
        App::$app->session->setFlash('success', 'Оборудование успешно добавлено');
        App::$app->response->redirect('/equipment');
    }

    public function update(Equipment $equipment): void
    {
        $this->sqlEquipmentRepository->update($equipment);
        App::$app->session->setFlash('success', 'Информация успешно обновлена');
        App::$app->response->redirect('/equipment');
    }

    public function delete($id): void
    {
        $this->sqlEquipmentRepository->delete($id);
        App::$app->session->setFlash('success', 'Оборудование успешно удалено');
        App::$app->response->redirect('/equipment');
    }
}