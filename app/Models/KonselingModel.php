<?php

namespace App\Models;

use CodeIgniter\Model;

class KonselingModel extends Model
{
    protected $table = 'konseling';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['JadwalID', 'GuruBK', 'PelanggaranID', 'Permasalahan', 'Tindakan', 'Sanksi'];
}
