<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['Jadwal','Waktu', 'UserID', 'Permasalahan', 'Status'];
}
