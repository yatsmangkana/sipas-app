<?php

namespace App\Controllers;

class surat_masuk extends BaseController
{

	// public function __construct()
	// {
	// }

	public function index()
	{
		$suratMasuk = $this->suratMasukModel->findAll();
		$rows = $this->suratMasukModel->countAll();
		$data = [
			'title' => 'Kelola Surat Masuk',
			'content' => 'surat_masuk/index',
			'suratMasuk' => $suratMasuk,
			'uri' => $this->uri->getSegment(1),
		];

		//dd($rows);

		return view('layout/v_wrapper', $data);
	}

	public function detail($id)
	{
		$suratMasuk = $this->suratMasukModel->find($id);
		$data = [
			'title' => 'Edit Data Surat Masuk',
			'content' => 'surat_masuk/detail',
			'suratMasuk' => $suratMasuk,
			'uri' => $this->uri->getSegment(1)

		];

		return view('layout/v_wrapper', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Surat Masuk',
			'content' => 'surat_masuk/create',
			'uri' => $this->uri->getSegment(1),
			'validation' => \Config\Services::validation()
		];

		return view('layout/v_wrapper', $data);
	}

	public function save()
	{

		if (!$this->validate([
			'no_surat' => [
				'rules' => 'required|is_unique[tbl_surat_masuk.no_surat]',
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
			'asal_surat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Asal Surat harus diisi !'
				]
			],
			'tgl_surat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Surat harus diisi !'
				]
			],
			'tgl_diterima' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Diterima harus diisi !'
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

			return redirect()->to('/surat_masuk/create')->withInput();
		}

		$fileSurat = $this->request->getFile('files');
		$namaFile = $fileSurat->getName();
		$ukuranFile = $fileSurat->getSizeByUnit('kb');
		$namaFileBaru = rand(10, 10000) . '_' . $namaFile;
		$fileSurat->move('upload/surat_masuk', $namaFileBaru);

		$this->suratMasukModel->save([
			'no_surat' => $this->request->getVar('no_surat'),
			'perihal' => $this->request->getVar('perihal'),
			'asal_surat' => $this->request->getVar('asal_surat'),
			'tgl_surat' => $this->request->getVar('tgl_surat'),
			'tgl_diterima' => $this->request->getVar('tgl_diterima'),
			'keterangan' => $this->request->getVar('keterangan'),
			'files' => $namaFileBaru,
			'file_size' => $ukuranFile
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/surat_masuk');
	}

	public function delete($id)
	{
		$suratMasuk = $this->suratMasukModel->find($id);
		unlink('upload/surat_masuk/' . $suratMasuk['files']);

		$this->suratMasukModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/surat_masuk');
	}

	public function edit($id)
	{
		$suratMasuk = $this->suratMasukModel->find($id);
		$data = [
			'title' => 'Edit Data Surat Masuk',
			'content' => 'surat_masuk/edit',
			'validation' => \Config\Services::validation(),
			'suratMasuk' => $suratMasuk,
			'uri' => $this->uri->getSegment(1)

		];

		return view('layout/v_wrapper', $data);
	}

	public function update($id)
	{

		$dataLama = $this->suratMasukModel->find($id);
		if ($dataLama['no_surat'] == $this->request->getVar('no_surat')) {
			$rules = 'required';
		} else {
			$rules = 'required|is_unique[tbl_surat_masuk.no_surat]';
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
			'asal_surat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Asal Surat harus diisi !',
				],
			],
			'tgl_surat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Surat harus diisi !',
				],
			],
			'tgl_diterima' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Diterima harus diisi !',
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

			return redirect()->to('/surat_masuk/edit/' . $id)->withInput();
		}

		$fileSurat = $this->request->getFile('files');
		$fileLama = $this->request->getVar('fileLama');
		$getNama = $fileSurat->getName();
		$ukuranFile = $fileSurat->getSizeByUnit('kb');

		if ($fileSurat->getError() == 4) {
			$namaFile = $fileLama;
		} else {
			$namaFile = rand(10, 10000) . '_' . $getNama;
			$fileSurat->move('upload/surat_masuk', $namaFile);
			unlink('upload/surat_masuk/' . $fileLama);
		}

		$this->suratMasukModel->save([
			'id' => $id,
			'no_surat' => $this->request->getVar('no_surat'),
			'perihal' => $this->request->getVar('perihal'),
			'asal_surat' => $this->request->getVar('asal_surat'),
			'tgl_surat' => $this->request->getVar('tgl_surat'),
			'tgl_diterima' => $this->request->getVar('tgl_diterima'),
			'keterangan' => $this->request->getVar('keterangan'),
			'files' => $namaFile,
			'file_size' => $ukuranFile
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/surat_masuk');
	}

	public function laporan()
	{
		$suratMasuk = $this->suratMasukModel->findAll();
		$data = [
			'title' => 'Kelola Surat Masuk',
			'content' => 'surat_masuk/laporan',
			'suratMasuk' => $suratMasuk,
			'uri' => $this->uri->getSegment(1),
		];

		return view('layout/v_wrapper', $data);
	}
}
