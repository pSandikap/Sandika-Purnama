<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lokasi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["lokasi"] = $this->Lokasi_model->getAll();
        $this->load->view("super/lokasi/list", $data);
    }

    public function add()
    {
        $lokasi = $this->Lokasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($lokasi->rules());           

        if ($validation->run()) {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $config['max_size'] = 5120;
            $config['max_width'] = 1920;
            $config['max_height'] = 1080;        
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->load->view("super/lokasi/list");
            }else{
                $data = array('upload_data' => $this->upload->data());
                $gbr = $data['upload_data']['file_name'];
            }
                     
            $lokasi->save($gbr);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("super/lokasi/new_form");
    }

    public function edit($id)
    {

        if (!isset($id)) redirect('super/lokasi');
       
        $lokasi = $this->Lokasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($lokasi->rules());
        if ($validation->run()) {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $config['max_size'] = 5120;
            $config['max_width'] = 1920;
            $config['max_height'] = 1080;        
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $gbr = $this->input->post('old_image');
                $lokasi->update($gbr);
                redirect('super/lokasi');
            }else{
                $data = array('upload_data' => $this->upload->data());
                $gbr = $data['upload_data']['file_name'];
                $lokasi->update($gbr);
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect('super/lokasi');
            }            
                
        }            

        $data["lokasi"] = $lokasi->getById($id);
        if (!$data["lokasi"]) show_404();
        
        $this->load->view("super/lokasi/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Lokasi_model->delete($id)) {
            redirect(site_url('super/lokasi'));
        }
    }
}