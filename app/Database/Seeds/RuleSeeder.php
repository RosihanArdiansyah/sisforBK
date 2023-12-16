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
                'NamaPelanggaran' => 'Terlibat perbuatan kriminal berat atau tindak pidana, misalnya : terorisme, pembunuhan, perampokan, provokasi, provokator, dsb.',
                'Poin' => '100',
            ],
            [
                'NamaPelanggaran' => 'Menyimpan, mengkonsumsi atau mengedarkan narkoba / miras di lingkungan sekolah.',
                'Poin' => '100',
            ],
            [
                'NamaPelanggaran' => 'Terlibat perkelahian / tawuran di dalam maupun di luar sekolah',
                'Poin' => '100',
            ],
            [
                'NamaPelanggaran' => 'Terlibat dalam perbuatan asusila dilingkungan sekolah',
                'Poin' => '100',
            ],
            [
                'NamaPelanggaran' => 'Melawan dan menghina guru',
                'Poin' => '100',
            ],
            [
                'NamaPelanggaran' => 'Menyimpan atau membawa senjata tajam / senjata api di lingkungan sekolah',
                'Poin' => '70',
            ],
            [
                'NamaPelanggaran' => 'Melakukan pemerasan, pemaksaan, tindakan intimidasi, perundungan (Bullying) secara verbal dan non verbal terhadap siswa lain dan warga sekolah',
                'Poin' => '70',
            ],
            [
                'NamaPelanggaran' => 'Mengambil barang milik orang lain maupun milik sekolah secara tidak sah.',
                'Poin' => '50',
            ],
            [
                'NamaPelanggaran' => 'Membawa materi yang mengandung pornografi di lingkungan sekolah.',
                'Poin' => '50',
            ],
            [
                'NamaPelanggaran' => 'Berjudi di lingkungan sekolah',
                'Poin' => '50',
            ],
            [
                'NamaPelanggaran' => 'Mencemarkan nama baik sekolah.',
                'Poin' => '30',
            ],
            [
                'NamaPelanggaran' => 'Melompat pagar sekolah',
                'Poin' => '25',
            ],
            [
                'NamaPelanggaran' => 'Membawa dan merokok di lingkungan sekolah',
                'Poin' => '20',
            ],
            [
                'NamaPelanggaran' => 'Merusak atau mengotori prasarana / sarana sekolah dan barang milik orang lain',
                'Poin' => '15',
            ],
            [
                'NamaPelanggaran' => 'Menggunakan HP di jam pelajaran tanpa izin guru',
                'Poin' => '10',
            ],
            [
                'NamaPelanggaran' => 'Mengganggu proses belajar mengajar',
                'Poin' => '10',
            ],
            [
                'NamaPelanggaran' => 'Tidak mengikuti apel / upacara',
                'Poin' => '10',
            ],
            [
                'NamaPelanggaran' => 'Bolos belajar',
                'Poin' => '10',
            ],
            [
                'NamaPelanggaran' => 'Terlambat masuk sekolah',
                'Poin' => '5',
            ],
            [
                'NamaPelanggaran' => 'Tidak memakai seragam sekolah, baju olahraga, dan baju praktek.',
                'Poin' => '5',
            ],
            [
                'NamaPelanggaran' => '1 (satu) Ketidakhadiran (ALPA)',
                'Poin' => '5',
            ],
            [
                'NamaPelanggaran' => 'Ukuran rambut pria tidak sesuai aturan sekolah',
                'Poin' => '3',
            ],
            [
                'NamaPelanggaran' => 'Membawa, memakai perhiasan, aksesoris, make up, dan alat musik',
                'Poin' => '3',
            ],
            [
                'NamaPelanggaran' => 'Melanggar aturan sekolah lainnya',
                'Poin' => '2',
            ],
        ];
        

        $ruleModel = new \App\Models\PelanggaranModel();

        foreach ($data as $row) {
            $ruleModel->insert($row);
        }
    }
}
