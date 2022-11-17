<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'email', 'nim', 'password', 'kategori_id', 'level', 'created_at'];

    public function getAllTestResults($nim)
    {
        $query = $this->db->table('testresult')
        ->join('users', 'testresult.nim_users = users.nim')
        ->where('users.nim', $nim)
        ->get()
        ->getResult();
        return $query;
    }

    public function getAllTest()
    {
        $query = $this->db->table('testresult')
        ->join('users', 'testresult.nim_users = users.nim')
        ->get()
        ->getResult();
        return $query;
    }

    public function getUsers()
    {
        $query = $this->db->table('users')
        ->join('kategori', 'users.kategori_id = kategori.id_kategori')
        ->where('users.level', 'user')
        ->get()
        ->getResult();
        return $query;
    }
}

/* End of file ModelName.php */

?>