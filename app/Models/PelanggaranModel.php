<?php

namespace App\Models;

use CodeIgniter\Model;

class PelanggaranModel extends Model
{
    protected $table = 'pelanggaran';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['NamaPelanggaran', 'Poin'];
}
