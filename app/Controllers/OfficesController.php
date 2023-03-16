<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Core\Request;
use App\Models\Office;
use App\Repository\SqlOfficesRepository;
use App\Services\OfficesService;

class OfficesController extends Controller
{
    private OfficesService $officesService;

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
        $this->officesService = new OfficesService();
    }

    public function index()
    {
        $offices = (new SqlOfficesRepository())->get();
        return $this->view('offices', 'index', [
            'offices' => $offices
        ]);
    }

    public function create()
    {
        return $this->view('offices', 'create', [
            'office' => new Office()
        ]);
    }

    public function store(Request $request)
    {
        $office = new Office();
        $office->loadData($request->getBody());
        if ($office->validate()) {
            $this->officesService->store($office);
        }
        return $this->view('offices', 'create', [
            'office' => $office
        ]);
    }

    public function edit(Request $request)
    {
        $sqlOfficeRepository = new SqlOfficesRepository();
        return $this->view('offices', 'edit', [
            'office' => $sqlOfficeRepository->getById($request->getRouteParams()['id'])
        ]);
    }

    public function update(Request $request)
    {
        $office = new Office();
        $office->loadData($request->getBody());
        if ($office->validate()) {
            $this->officesService->update($office);
        }
        return $this->view('offices', 'edit', [
            'office' => $office
        ]);
    }

    public function destroy(Request $request)
    {
        //TODO исправить при удалении удаляется юзер
        $this->officesService->delete($request->getRouteParams()['id']);
    }
}