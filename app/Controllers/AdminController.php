<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        //
    }

    public function listUsers()
    {

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('layout/header')
            . view('admin/user_list', $data)
            . view('layout/footer');
    }

    public function editUser($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('layout/header')
            . view('admin/edit_user', $data)
            . view('layout/footer');
    }

    public function updateUser($id)
    {
        $userModel = new UserModel();
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            // Add other fields as necessary
        ];

        if ($userModel->update($id, $data)) {
            session()->setFlashdata('success', 'User updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update user');
        }

        return redirect()->to('/admin/users');
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();

        if ($userModel->delete($id)) {
            session()->setFlashdata('success', 'User deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete user');
        }

        return redirect()->to('/admin/users');
    }
}
