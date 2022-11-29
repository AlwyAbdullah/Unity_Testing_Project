<?php

namespace App\Models;

use CodeIgniter\Model;

class TestResultModel extends Model {
    protected $table = 'testresult';
    protected $primaryKey = 'id_test';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;
    protected $allowedFields = ['nim_users', 'total_test', 'test_passed', 'test_failed', 'nama_class', 'tanggal_test'];

    public function getTestId($id)
    {
        $query = $this->db->table('testresult')
        ->where('id_test', $id)
        ->get()
        ->getResult();
        return $query;
    }

    public function getTestByKategori($id)
    {
        // $query = $this->db->query('SELECT u.nama, u.nim, t.id_test, t.total_test, t.test_passed, t.test_failed, t.nama_class, t.tanggal_test from testresult t
        // JOIN users u ON u.nim = t.nim_users
        // JOIN kategori k ON k.id_kategori = u.kategori_id
        // WHERE u.kategori_id =' + $id + '')
        // ->getResult();

        $query = $this->db->table('testresult t')
        ->join('users u', 'u.nim = t.nim_users')
        ->join('kategori k', 'k.id_kategori = u.kategori_id')
        ->where('u.kategori_id', $id)
        ->get()
        ->getResult();

        return $query;
    }
    
}

/* End of file ModelName.php */

?>