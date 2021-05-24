<?php

namespace App\Controllers;

class laporan extends BaseController
{

    public function laporan_surat_masuk()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan            
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user            

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)                
                $tgl = $_GET['tanggal'];
                $ket = 'Data Surat Masuk Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'laporan/laporan_surat_masuk/cetak?filter=1&tanggal=' . $tgl;
                $surat = $this->suratMasukModel->filterTanggal($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel            
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)                
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array(
                    '',
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
                $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'transaksi/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $surat = $this->suratMasukModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel            
            } else { // Jika filter nya 3 (per tahun)                
                $tahun = $_GET['tahun'];
                $ket = 'Data Transaksi Tahun ' . $tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun=' . $tahun;
                $surat = $this->suratMasukModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel            
            }
        } else { // Jika user tidak mengklik tombol tampilkan            
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'transaksi/cetak';
            $surat = $this->suratMasukModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel        
        }

        $data = [
            'title' => 'Laporan Surat Masuk',
            'content' => 'laporan/laporan_surat_masuk',
            'ket' => $ket,
            'url_cetak' => base_url('laporan/laporan_surat_masuk/' . $url_cetak),
            'option_tahun' => $this->suratMasukModel->getTahun(),
            'surat' => $surat,
            'uri' => $this->uri->getSegment(2),
        ];

        //dd($getTahun);

        return view('layout/v_wrapper', $data);
    }

    public function laporan_surat_keluar()
    {
        $sm_rows = $this->suratMasukModel->countAll();
        $sk_rows = $this->suratKeluarModel->countAll();
        $data = [
            'title' => 'Laporan Surat Keluar',
            'content' => 'laporan/laporan_surat_keluar',
            'sm_rows' => $sm_rows,
            'sk_rows' => $sk_rows,
            'uri' => $this->uri->getSegment(2),

        ];

        return view('layout/v_wrapper', $data);
    }
}
