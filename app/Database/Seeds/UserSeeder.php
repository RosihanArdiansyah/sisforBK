<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'fullName' => 'Admin',
                'Password' => md5('123456'),
                'Role' => 1,
            ],
            [
                'username' => 'user',
                'fullName' => 'Siswa',
                'NIS' => '111111',
                'Kelas' => 1,
                'Password' => md5('123456'),
                'Role' => 0,
            ],
        ];

        $userModel = new \App\Models\UserModel();

        foreach ($data as $row) {
            $userModel->insert($row);
        }
        //
    }
}
