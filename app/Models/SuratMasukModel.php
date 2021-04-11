<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table = 'tbl_surat_masuk';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_surat', 'perihal', 'asal_surat', 'tgl_surat', 'tgl_diterima', 'keterangan', 'files'];
}
