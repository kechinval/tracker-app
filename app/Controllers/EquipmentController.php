<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Core\Request;
use App\Models\Equipment;
use App\Repository\SqlEquipmentRepository;
use App\Repository\SqlOfficesRepository;
use App\Repository\SqlStaffRepository;
use App\Services\EquipmentService;

class EquipmentController extends Controller
{
    private EquipmentService $equipmentService;

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
        $this->equipmentService = new EquipmentService();
    }

    public function index()
    {
        $equipment = (new SqlEquipmentRepository())->get();
        $office = (new SqlOfficesRepository())->get();
        $staff = (new SqlStaffRepository())->get();
        return $this->view('equipment', 'index', [
            'equipment' => $equipment,
            'office' => $office,
            'staff' => $staff
        ]);
    }

    public function show(Request $request)
    {
        $equipment = (new SqlEquipmentRepository())->getById($request->getRouteParams()['id']);
        $office = (new SqlOfficesRepository())->getById($equipment->office_id);
        $staff = (new SqlStaffRepository())->getById($equipment->staff_id);
        return $this->view('equipment', 'show', [
            'equipment' => $equipment,
            'office' => $office,
            'staff' => $staff
        ]);
    }

    public function create()
    {
        return $this->view('equipment', 'create', [
            'equipment' => new Equipment(),
            'offices' => (new SqlOfficesRepository())->get(),
            'staff' => (new SqlStaffRepository())->get(),
            'equipmentStatus' => (new SqlEquipmentRepository())->getEnum('equipment_status'),
            'movementStatus' => (new SqlEquipmentRepository())->getEnum('movement_status')
        ]);
    }

    public function store(Request $request)
    {
        $equipment = new Equipment();
        $equipment->loadData($request->getBody());
        if ($equipment->validate()) {
            $this->equipmentService->store($equipment);
        }
        return $this->view('equipment', 'create', [
            'equipment' => $equipment,
            'offices' => (new SqlOfficesRepository())->get(),
            'staff' => (new SqlStaffRepository())->get(),
            'equipmentStatus' => (new SqlEquipmentRepository())->getEnum('equipment_status'),
            'movementStatus' => (new SqlEquipmentRepository())->getEnum('movement_status')
        ]);
    }

    public function edit(Request $request)
    {
        return $this->view('equipment', 'edit', [
            'equipment' => (new SqlEquipmentRepository())->getById($request->getRouteParams()['id']),
            'offices' => (new SqlOfficesRepository())->get(),
            'staff' => (new SqlStaffRepository())->get(),
            'equipmentStatus' => (new SqlEquipmentRepository())->getEnum('equipment_status'),
            'movementStatus' => (new SqlEquipmentRepository())->getEnum('movement_status')
        ]);
    }

    public function update(Request $request)
    {
        $equipment = new Equipment();
        $equipment->loadData($request->getBody());
        if ($equipment->validate()) {
            $this->equipmentService->update($equipment);
        }
        return $this->view('equipment', 'edit', [
            'equipment' => $equipment,
            'offices' => (new SqlOfficesRepository())->get(),
            'staff' => (new SqlStaffRepository())->get(),
            'equipmentStatus' => (new SqlEquipmentRepository())->getEnum('equipment_status'),
            'movementStatus' => (new SqlEquipmentRepository())->getEnum('movement_status')
        ]);
    }

    public function destroy(Request $request)
    {
        unlink(__DIR__."/../../public/img/qrcode{$request->getRouteParams()['id']}.png");
        $this->equipmentService->delete($request->getRouteParams()['id']);
    }
}