<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

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

    public function process_register() {
        $userModel = new UserModel();

        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');

        $data = [
            'fullname' => $name,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
        ];

        // check username dah wujud atau belum
        $checkUser = $userModel->where('username', $username)->first();
        if ($checkUser) {
            return redirect()->to('/register')->with('error', 'Username already exists');
        }

        $userModel->insert($data);
        return redirect()->to('/login')->with('success', 'Register success');

    }

    public function process_login() {

        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $checkUser = $userModel->where('username', $username)->first();

        if ($checkUser && password_verify($data['password'], $checkUser['password'])) {
            session()->set([
                'username'  => $checkUser['username'],
                'email'     => $checkUser['email'],
                'fullname'  => $checkUser['fullname'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/profile');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

    }

    public function profile()
    {
        $data = array();

        $data['nama'] = session()->get('fullname');
        $data['username'] = session()->get('username');
        $data['email'] = session()->get('email');
        $data['password'] = "123456";

        return view('layout/header')
            . view('profile', $data)
            . view('layout/footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
