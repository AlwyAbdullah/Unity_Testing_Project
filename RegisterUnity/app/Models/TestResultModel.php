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
        $query = $this->db->table('testresult t')
        ->join('users u', 'u.nim = t.nim_users')
        ->join('kategori k', 'k.id_kategori = u.kategori_id')
        ->where('u.kategori_id', $id)
        ->get()
        ->getResult();

        return $query;
    }

    public function getTestScore()
    {
        $query = $this->db->query("SELECT u.nama, t.test_passed, t.total_test
        FROM testresult t JOIN users u on u.nim = t.nim_users
        WHERE t.nama_class = 'Pretest_Test'
        ORDER BY u.nama ASC")
        ->getResult();

        return $query;
    }

    public function getTestScoreAfter()
    {
        $query = $this->db->query("SELECT u.nama, t.test_passed, t.total_test
        FROM testresult t JOIN users u on u.nim = t.nim_users
        WHERE t.nama_class = 'Modul13_Test'
        ORDER BY u.nama ASC")
        ->getResult();

        return $query;
    }
    
}

/* End of file ModelName.php */

?>