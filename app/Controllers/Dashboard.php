<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

	public function index()
	{
		$sm_rows = $this->suratMasukModel->countAll();
		$sk_rows = $this->suratKeluarModel->countAll();
		$data = [
			'title' => 'Dashboard | SIPAS LP2M UNM',
			'open' => 'active',
			'content' => 'v_Dashboard',
			'sm_rows' => $sm_rows,
			'sk_rows' => $sk_rows,
			'uri' => $this->uri->getSegment(1),
		];

		return view('layout/v_wrapper', $data);
	}
}
