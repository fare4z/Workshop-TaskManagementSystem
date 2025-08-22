<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'fullname'   => 'Administrator',
                'email'      => 'admin@gmail.com',
                'photo'      => null,
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'demo',
                'password'   => password_hash('demo123', PASSWORD_DEFAULT),
                'fullname'   => 'Demo User',
                'email'      => 'demo@gmail.com',
                'photo'      => null,
                'role'       => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert multiple rows
        $this->db->table('users')->insertBatch($data);
    }
}
