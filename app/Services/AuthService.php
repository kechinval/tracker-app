<?php

namespace App\Services;

use App\Core\App;
use App\Database\Database;
use App\Repository\SqlStaffRepository;
use App\Models\Staff;

class AuthService
{
    private SqlStaffRepository $sqlStaffRepository;

    public function __construct()
    {
        $this->sqlStaffRepository = new SqlStaffRepository();
    }

    public function login($request)
    {
        $db = new Database();
        $res = $db->select(
            'staff',
            '*',
            'username="'.$request['username'] . '" AND password="' . md5($request['password']) .'"');
        $user = $res->fetch_assoc();
        if (!is_null($user)) {
            App::$app->session->set('username', $user['username']);
            App::$app->response->redirect('/staff');
        } else {
            App::$app->session->setFlash('error', 'Неверный логин или пароль');
            App::$app->response->redirect('/');
        }
    }

    public function register($request)
    {
        $this->sqlStaffRepository->save($request);
        App::$app->session->setFlash('success', 'Спасибо за регистрацию');
        App::$app->response->redirect('/');
    }

    public function logout()
    {
        session_destroy();
        App::$app->response->redirect('/');
    }
}