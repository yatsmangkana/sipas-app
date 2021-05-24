<?php

namespace App\Controllers;

class surat_keluar extends BaseController
{

    public function index()
    {
        $suratKeluar = $this->suratKeluarModel->findAll();
        $data = [
            'title' => 'Kelola Surat Keluar',
            'content' => 'surat_keluar/index',
            'suratKeluar' => $suratKeluar,
            'uri' => $this->uri->getSegment(1)
        ];

        return view('layout/v_wrapper', $data);
    }

    public function detail($id)
    {
        $suratKeluar = $this->suratKeluarModel->find($id);
        $data = [
            'title' => 'Edit Data Surat Keluar',
            'content' => 'surat_keluar/detail',
            'suratKeluar' => $suratKeluar,
            'uri' => $this->uri->getSegment(1)

        ];

        return view('layout/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Surat Keluar',
            'content' => 'surat_keluar/create',
            'uri' => $this->uri->getSegment(1),
            'validation' => \Config\Services::validation()
        ];

        return view('layout/v_wrapper', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'no_surat' => [
                'rules' => 'required|is_unique[tbl_surat_keluar.no_surat]',
                'errors' => [
                    'required' => 'No Surat harus diisi !',
                    'is_unique' => 'No Surat sudah terdaftar !'
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Surat harus diisi !'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Surat harus diisi !'
                ]
            ],
            'tgl_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Surat harus diisi !'
                ]
            ],
            'tgl_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal keluar harus diisi !'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi !'
                ]
            ],
            'files' => [
                'rules' => 'uploaded[files]|max_size[files,1024]|ext_in[files,doc,docx,pdf]|mime_in[files,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu!',
                    'max_size' => 'Ukuran file terlalu besar! *Max 1MB',
                    'ext_in' => 'Extensi file tidak diijinkan! *.doc, .docx, .pdf',
                    'mime_in' => 'Extensi file tidak diijinkan! *.doc, .docx, .pdf'
                ]
            ],
        ])) {

            return redirect()->to('/surat_keluar/create')->withInput();
        }

        $fileSurat = $this->request->getFile('files');
        $namaFile = $fileSurat->getName();
        $ukuranFile = $fileSurat->getSizeByUnit('kb');
        $namaFileBaru = rand(10, 10000) . '_' . $namaFile;
        $fileSurat->move('upload/surat_keluar', $namaFileBaru);

        $this->suratKeluarModel->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'keterangan' => $this->request->getVar('keterangan'),
            'files' => $namaFileBaru,
            'file_size' => $ukuranFile
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/surat_keluar');
    }

    public function delete($id)
    {
        $suratKeluar = $this->suratKeluarModel->find($id);
        unlink('upload/surat_keluar/' . $suratKeluar['files']);

        $this->suratKeluarModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/surat_keluar');
    }

    public function edit($id)
    {
        $suratKeluar = $this->suratKeluarModel->find($id);
        $data = [
            'title' => 'Edit Data Surat Keluar',
            'content' => 'surat_keluar/edit',
            'validation' => \Config\Services::validation(),
            'suratKeluar' => $suratKeluar,
            'uri' => $this->uri->getSegment(1)

        ];

        return view('layout/v_wrapper', $data);
    }

    public function update($id)
    {

        $dataLama = $this->suratKeluarModel->find($id);
        if ($dataLama['no_surat'] == $this->request->getVar('no_surat')) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[tbl_surat_keluar.no_surat]';
        }

        if (!$this->validate([
            'no_surat' => [
                'rules' => $rules,
                'errors' => [
                    'required' => 'No Surat harus diisi !',
                    'is_unique' => 'No Surat sudah terdaftar !',
                ],
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal Surat harus diisi !',
                ],
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Surat harus diisi !',
                ],
            ],
            'tgl_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Surat harus diisi !',
                ],
            ],
            'tgl_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Keluar harus diisi !',
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi !',
                ],
            ],
            'files' => [
                'rules' => 'max_size[files,1024]|ext_in[files,doc,docx,pdf]|mime_in[files,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar! *Max 1MB',
                    'ext_in' => 'Extensi file tidak diijinkan! *.doc, .docx, .pdf',
                    'mime_in' => 'Extensi file tidak diijinkan! *.doc, .docx, .pdf'
                ]
            ],
        ])) {

            return redirect()->to('/surat_keluar/edit/' . $id)->withInput();
        }

        $fileSurat = $this->request->getFile('files');
        $fileLama = $this->request->getVar('fileLama');
        $getNama = $fileSurat->getName();
        $ukuranFile = $fileSurat->getSizeByUnit('kb');

        if ($fileSurat->getError() == 4) {
            $namaFile = $fileLama;
        } else {
            $namaFile = rand(10, 10000) . '_' . $getNama;
            $fileSurat->move('upload/surat_keluar', $namaFile);
            unlink('upload/surat_keluar/' . $fileLama);
        }

        $this->suratKeluarModel->save([
            'id' => $id,
            'no_surat' => $this->request->getVar('no_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'keterangan' => $this->request->getVar('keterangan'),
            'files' => $namaFile,
            'file_size' => $ukuranFile
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/surat_keluar');
    }
}
