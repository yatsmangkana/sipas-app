<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table = 'tbl_surat_keluar';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'no_surat',
        'perihal',
        'tujuan',
        'tgl_surat',
        'tgl_keluar',
        'keterangan',
        'files',
        'file_size'
    ];
}
