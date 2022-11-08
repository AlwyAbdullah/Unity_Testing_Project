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
    
}

/* End of file ModelName.php */

?>