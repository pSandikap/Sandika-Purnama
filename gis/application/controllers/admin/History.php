<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("transaksi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["history"] = $this->transaksi_model->getAllHistory();
        $this->load->view("admin/history/list", $data);
    }

    public function search()
    {
        $keyword = $this->input->post('search');
        $data['history'] = $this->transaksi_model->search($keyword);
        $this->load->view("admin/history/list_search",$data);
    }

}