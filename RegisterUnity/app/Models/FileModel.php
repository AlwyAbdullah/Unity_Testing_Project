<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model {
    protected $table = 'modul';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['judul_materi', 'nama_file'];
}

/* End of file ModelName.php */

?>