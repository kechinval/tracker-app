<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Core\Request;
use App\Repository\SqlOfficesRepository;
use App\Repository\SqlStaffRepository;
use App\Services\StaffService;
use App\Models\Staff;

class StaffController extends Controller
{
    private StaffService $staffService;

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
        $this->staffService = new StaffService();
    }

    public function index()
    {
        $staff = (new SqlStaffRepository())->get();
        $offices = (new SqlOfficesRepository())->get();
        return $this->view('staff', 'index', [
            'staff' => $staff,
            'offices' => $offices
        ]);
    }

    public function create()
    {
        return $this->view('staff', 'create', [
            'staff' => new Staff(),
            'offices' => (new SqlOfficesRepository())->get()
        ]);
    }

    public function store(Request $request)
    {
        $staff = new Staff();
        $staff->loadData($request->getBody());
        if ($staff->validate()) {
            $this->staffService->store($staff);
        }
        return $this->view('staff', 'create', [
            'staff' => $staff,
            'offices' => (new SqlOfficesRepository())->get()
        ]);
    }

    public function edit(Request $request)
    {
        $sqlStaffRepository = new SqlStaffRepository();
        return $this->view('staff', 'edit', [
            'staff' => $sqlStaffRepository->getById($request->getRouteParams()['id']),
            'offices' => (new SqlOfficesRepository())->get()
        ]);
    }

    public function update(Request $request)
    {
        $staff = new Staff();
        $staff->loadData($request->getBody());
        if ($staff->validate()) {
            $this->staffService->update($staff);
        }
        return $this->view('staff', 'edit', [
            'staff' => $staff,
            'offices' => (new SqlOfficesRepository())->get()
        ]);
    }

    public function destroy(Request $request)
    {
        //TODO исправить при удалении удаляется оборудование
        $this->staffService->delete($request->getRouteParams()['id']);
    }
}