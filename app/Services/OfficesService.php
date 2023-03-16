<?php

namespace App\Services;

use App\Core\App;
use App\Repository\SqlOfficesRepository;
use App\Models\Office;

class OfficesService{

    private SqlOfficesRepository $sqlOfficesRepository;

    public function __construct()
    {
        $this->sqlOfficesRepository = new SqlOfficesRepository();
    }

    public function store(Office $office): void
    {
        $this->sqlOfficesRepository->save($office);
        App::$app->session->setFlash('success', 'Офис успешно добавлен');
        App::$app->response->redirect('/offices');
    }

    public function update(Office $office): void
    {
        $this->sqlOfficesRepository->update($office);
        App::$app->session->setFlash('success', 'Информация успешно обновлена');
        App::$app->response->redirect('/offices');
    }

    public function delete($id): void
    {
        $this->sqlOfficesRepository->delete($id);
        App::$app->session->setFlash('success', 'Офис успешно удален');
        App::$app->response->redirect('/offices');
    }
}