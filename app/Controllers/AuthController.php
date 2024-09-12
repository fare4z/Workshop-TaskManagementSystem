<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{

    public function home()
    {
        return view('layout/header')
            . view('home')
            . view('layout/footer');
    }

    public function login()
    {

        return view('layout/header')
            . view('login')
            . view('layout/footer');
    }


    public function register()
    {
        return view('layout/header')
            . view('register')
            . view('layout/footer');
    }

    public function profile()
    {
        $data = array();

        $data['nama'] = "MUHAMMAD FAREEZ BIN BORHANUDIN";
        $data['username'] = "fareez";
        $data['email'] = "fareez@psp.edu.my";
        $data['password'] = "123456";

        return view('layout/header')
            . view('profile', $data)
            . view('layout/footer');
    }
}
