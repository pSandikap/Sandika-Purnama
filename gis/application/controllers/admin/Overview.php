<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Lokasi_model');
	}

	public function index()
	{
        // load view admin/overview.php
        $data['lokasi'] = $this->Lokasi_model->get2table();
        $this->load->view("admin/overview",$data);
	}
}