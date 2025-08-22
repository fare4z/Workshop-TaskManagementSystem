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

        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('layout/header')
            . view('login')
            . view('layout/footer');
    }


    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('layout/header')
            . view('register')
            . view('layout/footer');
    }

    public function process_register()
    {
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

    public function process_login()
    {

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
                'id'        => $checkUser['id'],
                'username'  => $checkUser['username'],
                'email'     => $checkUser['email'],
                'fullname'  => $checkUser['fullname'],
                'role'      => $checkUser['role'],
                'photo'     => $checkUser['photo'] ?? 'uploads/profile/default.png',
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/dashboard');
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
        $data['photo'] = session()->get('photo') ?? 'uploads/profile/default.png';

        return view('layout/header')
            . view('profile', $data)
            . view('layout/footer');
    }

    public function update_profile()
    {
        $userModel = new UserModel();

        $id = session()->get('id'); // pastikan id diset masa login
        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = [
            'fullname' => $name,
            'username' => $username,
            'email'    => $email,
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Handle photo upload
        $img = $this->request->getFile('photo');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/profile/', $newName);
            $data['photo'] = 'uploads/profile/' . $newName;
        }

        $userModel->update($id, $data);

        // Update session
        session()->set([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'email'    => $data['email'],
            'photo'    => $data['photo'] ?? session()->get('photo'),
        ]);

        return redirect()->to('/profile')->with('success', 'Profile updated successfully');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
