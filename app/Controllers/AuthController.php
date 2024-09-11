<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class AuthController extends BaseController
{

    public function home()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/profile');
        }
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

    public function process_register()
    {
        $userModel = new UsersModel();

        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        // Check username dah wujud atau belum
        $checkUser = $userModel->where('username', $data['username'])->first();

        if ($checkUser) {
            return redirect()->back()->with('error', 'Username already exists. Please choose another one.');
        }

        $userModel->insert($data);
        return redirect()->to('/login');
    }

    public function process_login()
    {
        $userModel = new UsersModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $checkUser = $userModel->where('username', $data['username'])->first();

        if ($checkUser && password_verify($data['password'], $checkUser['password'])) {

            session()->set([
                'user_id'   => $checkUser['id'],
                'username'  => $checkUser['username'],
                'email'     => $checkUser['email'],
                'fullname'  => $checkUser['name'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/profile');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
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
