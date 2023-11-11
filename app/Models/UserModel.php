<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['username', 'fullName', 'NIS', 'TTL', 'Bapak', 'Ibu', 'Kelas', 'Role', 'Password'];

    public function editUser($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
}
