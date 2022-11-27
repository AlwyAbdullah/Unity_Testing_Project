<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model {
    protected $table = 'modul';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['judul_materi', 'nama_file', 'test_file', 'kategori_id'];

    public function getAllModul()
    {
        $query = $this->db->table('modul')
        ->join('kategori', 'modul.kategori_id = kategori.id_kategori')
        ->get()
        ->getResult();
        return $query;
    }

    public function getAllModulFile()
    {
        $query = $this->db->query('SELECT m.id ,m.judul_materi, m.nama_file, m.test_file, m.kategori_id, m.created_at tanggal, k.nama_kategori FROM modul m JOIN kategori k on m.kategori_id = k.id_kategori ORDER BY m.id ASC')
        ->getResult();
        return $query;
    }
}

/* End of file ModelName.php */

?>