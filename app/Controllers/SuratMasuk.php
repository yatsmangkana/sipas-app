<?php

namespace App\Controllers;

use App\Models\SuratMasukModel;

class SuratMasuk extends BaseController
{

	protected $suratMasukModel;
	public function __construct()
	{
		$this->suratMasukModel = new SuratMasukModel();
	}

	public function index()
	{
		$suratMasuk = $this->suratMasukModel->findAll();
		$data = [
			'title' => 'Dashboard | SIPAS LP2M UNM',
			'content' => 'surat_masuk/index',
			'suratMasuk' => $suratMasuk,
		];

		return view('layout/v_wrapper', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Surat Masuk',
			'content' => 'surat_masuk/create',
			'validation' => \Config\Services::validation()
		];

		return view('layout/v_wrapper', $data);
	}

	public function save()
	{
		//Input Validate
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
			//'files' => 'required',
		])) {

			$validation = \Config\Services::validation();
			return redirect()->to('/SuratMasuk/create')->withInput()->with('validation', $validation);
		}
		$this->suratMasukModel->save([
			'no_surat' => $this->request->getVar('no_surat'),
			'perihal' => $this->request->getVar('perihal'),
			'asal_surat' => $this->request->getVar('asal_surat'),
			'tgl_surat' => $this->request->getVar('tgl_surat'),
			'tgl_diterima' => $this->request->getVar('tgl_diterima'),
			'keterangan' => $this->request->getVar('keterangan'),
			//'files' => $this->request->getVar('files'),
		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/SuratMasuk');
	}

	public function delete($id)
	{
		$this->suratMasukModel->delete($id);
		return redirect()->to('/SuratMasuk');
	}

	public function update($id)
	{
		$this->suratMasukModel->update($id);
		return redirect()->to('/SuratMasuk/update');
	}
}
