<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model {
    protected $table = 'profil';
    protected $primaryKey = "nim";

    protected $allowedFields = [
        'id',
        'nim',
        'nama',
        'prodi',
        'fakultas',
    ];
}

?>