<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kelas' => 'X DPIB',
            ],
            [
                'kelas' => 'X TPM',
            ],
            [
                'kelas' => 'X TKR 1',
            ],
            [
                'kelas' => 'X TKR 2',
            ],
            [
                'kelas' => 'X TBSM',
            ],
            [
                'kelas' => 'X TPL',
            ],
            [
                'kelas' => 'X AV',
            ],
            [
                'kelas' => 'X TELI 1',
            ],
            [
                'kelas' => 'X TELI 2',
            ],
            [
                'kelas' => 'X TITL',
            ],
            [
                'kelas' => 'X TKJ 1',
            ],
            [
                'kelas' => 'X TKJ 2',
            ],
            [
                'kelas' => 'X TKJ 3',
            ],
            [
                'kelas' => 'X TKJ 4',
            ],
            [
                'kelas' => 'XI DPIB',
            ],
            [
                'kelas' => 'XI TPM',
            ],
            [
                'kelas' => 'XI TKR 1',
            ],
            [
                'kelas' => 'XI TKR 2',
            ],
            [
                'kelas' => 'XI TBSM',
            ],
            [
                'kelas' => 'XI TPL',
            ],
            [
                'kelas' => 'XI AV',
            ],
            [
                'kelas' => 'XI TELI 1',
            ],
            [
                'kelas' => 'XI TELI 2',
            ],
            [
                'kelas' => 'XI TITL',
            ],
            [
                'kelas' => 'XI TKJ 1',
            ],
            [
                'kelas' => 'XI TKJ 2',
            ],
            [
                'kelas' => 'XI TKJ 3',
            ],
            [
                'kelas' => 'XI TKJ 4',
            ],
            [
                'kelas' => 'XII DPIB',
            ],
            [
                'kelas' => 'XII TPM',
            ],
            [
                'kelas' => 'XII TKR 1',
            ],
            [
                'kelas' => 'XII TKR 2',
            ],
            [
                'kelas' => 'XII TBSM',
            ],
            [
                'kelas' => 'XII TPL',
            ],
            [
                'kelas' => 'XII AV',
            ],
            [
                'kelas' => 'XII TELI 1',
            ],
            [
                'kelas' => 'XII TELI 2',
            ],
            [
                'kelas' => 'XII TITL',
            ],
            [
                'kelas' => 'XII TKJ 1',
            ],
            [
                'kelas' => 'XII TKJ 2',
            ],
            [
                'kelas' => 'XII TKJ 3',
            ],
            [
                'kelas' => 'XII TKJ 4',
            ],
        ];

        // Assuming you have a model for the "kelas" table, replace "KelasModel" with your actual model class
        $kelasModel = new \App\Models\KelasModel();

        foreach ($data as $row) {
            $kelasModel->insert($row);
        }
    }
}