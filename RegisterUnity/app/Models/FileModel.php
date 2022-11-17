<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model {
    protected $table = 'modul';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['judul_materi', 'nama_file', 'test_file'];

    public function getAllModul()
    {
        $query = $this->db->table('modul')
        ->join('kategori', 'modul.kategori_id = kategori.id_kategori')
        ->get()
        ->getResult();
        return $query;
    }
}

/* End of file ModelName.php */

?>