<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TasksModel;
use Config\Services;

class TaskController extends BaseController
{
    public function dashboard()
    {
        $taskModel = new TasksModel();

        // display task based on user
        $data['tasks'] = $taskModel->where('user_id', session()->get('username'))->findAll();

        $ktrgn_status = [
            '0' => 'Pending',
            '1' => 'Completed',
            '2' => 'In Progress',
        ];

        $data['status'] = $ktrgn_status;

        return view('layout/header')
            . view('dashboard', $data)
            . view('layout/footer');
    }

    public function newtask()
    {
        return view('layout/header')
            . view('newTask')
            . view('layout/footer');
    }

    public function process_newtask()
    {
        $taskModel =    new TasksModel();
        $data = [
            'user_id' => session()->get('username'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'due_date' => $this->request->getPost('duedate'),
        ];

        $taskModel->save($data);
        session()->setFlashdata('success', 'Task added successfully');
        return redirect()->to('/dashboard');
    }

    public function update($id)
    {
        $taskModel = new TasksModel();
        $data['task'] = $taskModel->find($id);

        $ktrgn_status = [
            '0' => 'Pending',
            '1' => 'Completed',
            '2' => 'In Progress',
        ];

        $data['status'] = $ktrgn_status;

        return view('layout/header')
            . view('update', $data)
            . view('layout/footer');
    }

    public function process_update($id)
    {
        $taskModel = new TasksModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'due_date'    => $this->request->getPost('duedate'),
        ];

        $taskModel->update($id, $data);
        $action = $this->request->getPost('action');

        if ($action === 'update_email') {
            $this->sendTaskUpdateEmail($id, $data);
            session()->setFlashdata('success', 'Task updated & email sent');
        } else {
            session()->setFlashdata('success', 'Task updated successfully');
        }

        return redirect()->to('/dashboard');
    }

    private function sendTaskUpdateEmail(int $taskId, array $data): void
    {
        $toEmail = session()->get('email'); // atau set ke email lain
        if (!$toEmail) return;

        $statusMap = [
            '0' => 'Pending',
            '1' => 'Completed',
            '2' => 'In Progress',
        ];

        $statusText = $statusMap[$data['status']] ?? $data['status'];

                $badgeColor = '#f0ad4e'; 
                if ($data['status'] == '1') $badgeColor = '#5cb85c'; 
                elseif ($data['status'] == '2') $badgeColor = '#0275d8';

                $msg = '
                <div style="background:#f7f7f9;padding:40px 0;font-family:Segoe UI,Arial,sans-serif;">
                    <div style="max-width:480px;margin:0 auto;background:#fff;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);overflow:hidden;">
                        <div style="background:#007bff;color:#fff;padding:24px 32px 16px 32px;text-align:center;">
                            <h2 style="margin:0;font-size:1.7em;letter-spacing:1px;">Task Update Notification</h2>
                        </div>
                        <div style="padding:28px 32px 18px 32px;">
                            <h3 style="margin-top:0;margin-bottom:10px;font-size:1.2em;">'.esc($data['title']).'</h3>
                            <div style="margin-bottom:18px;">
                                <span style="display:inline-block;padding:4px 14px;font-size:0.95em;border-radius:12px;background:'.$badgeColor.';color:#fff;font-weight:600;">'.esc($statusText).'</span>
                            </div>
                            <p style="margin:0 0 12px 0;"><strong>Description:</strong><br>'.nl2br(esc($data['description'])).'</p>
                            <p style="margin:0 0 8px 0;"><strong>Due Date:</strong> <span style="color:#007bff;">'.esc($data['due_date']).'</span></p>
                            <p style="margin:0 0 8px 0;font-size:0.97em;color:#888;"><strong>Task ID:</strong> {$taskId}</p>
                        </div>
                        <div style="background:#f1f3f6;padding:16px 32px;text-align:center;font-size:0.98em;color:#888;">
                            <em>Thank you for using Task Management System!</em>
                        </div>
                    </div>
                </div>';
    

        Services::logger()->info('Sending task update email', ['to' => $toEmail, 'subject' => 'Task Updated: '.($data['title'] ?? '')]);

        Services::email()->setTo($toEmail)
            ->setSubject('Task Updated: '.($data['title'] ?? ''))
            ->setMessage($msg);

        $email = Services::email();
        $email->setTo($toEmail);
        $email->setSubject('Task Updated: '.($data['title'] ?? ''));
        $email->setMessage($msg);
        $email->setMailType('html');
        @$email->send();
    }

    public function delete($id)
    {
        $taskModel = new TasksModel();
        $taskModel->delete($id);
        session()->setFlashdata('success', 'Task deleted successfully');
        return redirect()->to('/dashboard');
    }
}
