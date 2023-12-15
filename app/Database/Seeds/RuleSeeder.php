<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'namaPelanggaran' => 'Terlibat perbuatan kriminal berat atau tindak pidana, misalnya : terorisme, pembunuhan, perampokan, provokasi, provokator, dsb.',
                'poin' => '100',
            ],
            [
                'namaPelanggaran' => 'Menyimpan, mengkonsumsi atau mengedarkan narkoba / miras di lingkungan sekolah.',
                'poin' => '100',
            ],
            [
                'namaPelanggaran' => 'Terlibat perkelahian / tawuran di dalam maupun di luar sekolah',
                'poin' => '100',
            ],
            [
                'namaPelanggaran' => 'Terlibat dalam perbuatan asusila dilingkungan sekolah',
                'poin' => '100',
            ],
            [
                'namaPelanggaran' => 'Melawan dan menghina guru',
                'poin' => '100',
            ],
            [
                'namaPelanggaran' => 'Menyimpan atau membawa senjata tajam / senjata api di lingkungan sekolah',
                'poin' => '70',
            ],
            [
                'namaPelanggaran' => 'Melakukan pemerasan, pemaksaan, tindakan intimidasi, perundungan (Bullying) secara verbal dan non verbal terhadap siswa lain dan warga sekolah',
                'poin' => '70',
            ],
            [
                'namaPelanggaran' => 'Mengambil barang milik orang lain maupun milik sekolah secara tidak sah.',
                'poin' => '50',
            ],
            [
                'namaPelanggaran' => 'Membawa materi yang mengandung pornografi di lingkungan sekolah.',
                'poin' => '50',
            ],
            [
                'namaPelanggaran' => 'Berjudi di lingkungan sekolah',
                'poin' => '50',
            ],
            [
                'namaPelanggaran' => 'Mencemarkan nama baik sekolah.',
                'poin' => '30',
            ],
            [
                'namaPelanggaran' => 'Melompat pagar sekolah',
                'poin' => '25',
            ],
            [
                'namaPelanggaran' => 'Membawa dan merokok di lingkungan sekolah',
                'poin' => '20',
            ],
            [
                'namaPelanggaran' => 'Merusak atau mengotori prasarana / sarana sekolah dan barang milik orang lain',
                'poin' => '15',
            ],
            [
                'namaPelanggaran' => 'Menggunakan HP di jam pelajaran tanpa izin guru',
                'poin' => '10',
            ],
            [
                'namaPelanggaran' => 'Mengganggu proses belajar mengajar',
                'poin' => '10',
            ],
            [
                'namaPelanggaran' => 'Tidak mengikuti apel / upacara',
                'poin' => '10',
            ],
            [
                'namaPelanggaran' => 'Bolos belajar',
                'poin' => '10',
            ],
            [
                'namaPelanggaran' => 'Terlambat masuk sekolah',
                'poin' => '5',
            ],
            [
                'namaPelanggaran' => 'Tidak memakai seragam sekolah, baju olahraga, dan baju praktek.',
                'poin' => '5',
            ],
            [
                'namaPelanggaran' => '1 (satu) Ketidakhadiran (ALPA)',
                'poin' => '5',
            ],
            [
                'namaPelanggaran' => 'Ukuran rambut pria tidak sesuai aturan sekolah',
                'poin' => '3',
            ],
            [
                'namaPelanggaran' => 'Membawa, memakai perhiasan, aksesoris, make up, dan alat musik',
                'poin' => '3',
            ],
            [
                'namaPelanggaran' => 'Melanggar aturan sekolah lainnya',
                'poin' => '2',
            ],
        ];
        

        $ruleModel = new \App\Models\PelanggaranModel();

        foreach ($data as $row) {
            $ruleModel->insert($row);
        }
    }
}
