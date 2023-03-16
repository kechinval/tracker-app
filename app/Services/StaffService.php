<?php

namespace App\Services;

use App\Core\App;
use App\Repository\SqlStaffRepository;
use App\Models\Staff;

class StaffService {

    private SqlStaffRepository $sqlStaffRepository;

    public function __construct()
    {
        $this->sqlStaffRepository = new SqlStaffRepository();
    }

    public function store(Staff $staff)
    {
        $this->sqlStaffRepository->save($staff);
        App::$app->session->setFlash('success', 'Пользователь успешно добавлен');
        App::$app->response->redirect('/staff');
    }

    public function update(Staff $staff): void
    {
        $this->sqlStaffRepository->update($staff);
        App::$app->session->setFlash('success', 'Информация успешно обновлена');
        App::$app->response->redirect('/staff');
    }

    public function delete($id): void
    {
        $this->sqlStaffRepository->delete($id);
        App::$app->session->setFlash('success', 'Пользователь удален');
        App::$app->response->redirect('/staff');
    }
}