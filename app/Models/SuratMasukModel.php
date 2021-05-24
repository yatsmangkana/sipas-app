<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table = 'tbl_surat_masuk';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'no_surat',
        'perihal',
        'asal_surat',
        'tgl_surat',
        'tgl_diterima',
        'keterangan',
        'files',
        'file_size'
    ];

    function getTahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_surat) AS tahun FROM tbl_surat_masuk GROUP BY YEAR(tgl_surat) ORDER BY YEAR(tgl_surat) ASC");

        return $query->getResult();
    }

    function filterTanggal($tglAwal, $tglAkhir)
    {
        $query = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE tgl_surat BETWEEN '$tglAwal' AND '$tglAkhir' ORDER BY tgl_surat ASC");

        return $query->getResult();
    }

    function filterBulan($tahun1, $bulanAwal, $bulanAkhir)
    {
        $query = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE YEAR(tgl_surat) = '$tahun1' AND MONTH(tgl_surat) BETWEEN '$bulanAwal' and '$bulanAkhir' ORDER BY tgl_surat ASC");

        return $query->getResult();
    }

    function filterTahun($tahun2)
    {
        $query = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE YEAR(tgl_surat) = '$tahun2' ORDER BY tgl_surat ASC");

        return $query->getResult();
    }
}
