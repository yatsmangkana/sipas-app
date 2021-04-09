<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard | SIPAS LP2M UNM',
			'content' => 'v_Dashboard',
		];
		return view('layout/v_wrapper', $data);
	}
}
