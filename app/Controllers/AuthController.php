<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\Staff;
use App\Repository\SqlOfficesRepository;
use App\Services\AuthService;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login(Request $request)
    {
        if ($request->isPost()) {
            $this->authService->login($request->getBody());
        }
        return $this->view('auth', 'login');
    }

    public function register(Request $request)
    {
        $staff = new Staff();
        if ($request->isPost()) {
            $staff->loadData($request->getBody());
            if ($staff->validate()) {
                $this->authService->register($staff);
            }
            return $this->view(
                '/auth',
                'register',
                [
                    'staff' => $staff,
                    'offices' => (new SqlOfficesRepository())->get()
                ]
            );
        }
        return $this->view(
            'auth',
            'register',
            [
                'staff' => $staff,
                'offices' => (new SqlOfficesRepository())->get()
            ]
        );
    }

    public function logout()
    {
        $this->authService->logout();
    }
}