<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model {
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kategori'];
}

/* End of file ModelName.php */

?>