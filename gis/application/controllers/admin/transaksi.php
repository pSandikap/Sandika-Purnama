<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->model("Lokasi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["transaksi"] = $this->Transaksi_model->getAll();
        $this->load->view("admin/transaksi/list", $data);
    }

    public function add_page()
    {
        $data['lokasi'] = $this->Lokasi_model->getAll();
        $this->load->view("admin/transaksi/new_form",$data);
    }

    public function add()
    {
        $config['upload_path'] = './assets/upload/transaksi';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['max_size'] = 5120;
        $config['max_width'] = 1920;
        $config['max_height'] = 1080;        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->load->view("admin/transaksi/new_form");
        }else{
            $datas = array('upload_data' => $this->upload->data());
            $gambar = $datas['upload_data']['file_name'];
            $drian = $this->input->post('drian');
            $penyewa = $this->input->post('penyewa');        
            $no_rek = $this->input->post('no_rek');        
            $biaya = $this->input->post('biaya');        
            $ditetapkan = $this->input->post('ditetapkan');
            $jatuh_tempo = date('d-m-Y', strtotime('+1 year', strtotime($ditetapkan)));
            $data = array(
                'drian' => $drian ,
                'penyewa' => $penyewa,
                'no_rek' => $no_rek,
                'biaya'=> $biaya,
                'jatuh_tempo' =>$jatuh_tempo,
                'ditetapkan' =>$ditetapkan,
                'bukti' =>$gambar );
            $this->Transaksi_model->save($data);
            redirect('admin/transaksi');
        }    
    }

    public function edit_page($id){
        $transaksi = $this->Transaksi_model;
        $dataa["transaksi"] = $transaksi->getById($id);
        if (!$dataa["transaksi"]) show_404();
        
        $this->load->view("admin/transaksi/edit_form", $dataa);
    }

    public function edit()
    {
        $transaksi = $this->Transaksi_model;
        $config['upload_path'] = './assets/upload/transaksi';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['max_size'] = 5120;
        $config['max_width'] = 1920;
        $config['max_height'] = 1080;        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $gambar = $this->input->post('old_image');
            $id = $this->input->post('id');
            $drian = $this->input->post('drian');
            $penyewa = $this->input->post('penyewa');        
            $no_rek = $this->input->post('no_rek');        
            $biaya = $this->input->post('biaya');        
            $ditetapkan = $this->input->post('ditetapkan');
            $jatuh_tempo = date('d-m-Y', strtotime('+1 year', strtotime($ditetapkan)));
            $data = array(
                'drian' => $drian ,
                'penyewa' => $penyewa,
                'no_rek' => $no_rek,
                'biaya'=> $biaya,
                'jatuh_tempo' =>$jatuh_tempo,
                'ditetapkan' =>$ditetapkan,
                'bukti' =>$gambar );
            $where = array('id'=>$id);
            $transaksi->update($where,$data);
            redirect('admin/transaksi');
        }else{
            $datas = array('upload_data' => $this->upload->data());
            $gambar = $datas['upload_data']['file_name'];
            $old_image = $this->input->post('old_image');
            $drian = $this->input->post('drian');
            $id = $this->input->post('id');
            $penyewa = $this->input->post('penyewa');        
            $no_rek = $this->input->post('no_rek');        
            $biaya = $this->input->post('biaya');        
            $ditetapkan = $this->input->post('ditetapkan');
            $old_ditetapkan = $this->input->post('old_ditetapkan');
            $jatuh_tempo = date('d-m-Y', strtotime('+1 year', strtotime($ditetapkan)));
            $old_jatuhtempo = $this->input->post('old_jatuhtempo');
            $data1 = array(
                'drian' => $drian ,
                'penyewa' => $penyewa,
                'no_rek' => $no_rek,
                'biaya'=> $biaya,
                'jatuh_tempo' =>$old_jatuhtempo,
                'ditetapkan' =>$old_ditetapkan,
                'bukti' =>$old_image );
            $transaksi->history('history',$data1);
            $data = array(
                'drian' => $drian ,
                'penyewa' => $penyewa,
                'no_rek' => $no_rek,
                'biaya'=> $biaya,
                'jatuh_tempo' =>$jatuh_tempo,
                'ditetapkan' =>$ditetapkan,
                'bukti' =>$gambar );
            $where = array('id'=>$id);
            $transaksi->update($where,$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/transaksi');
                
        }  
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Transaksi_model->delete($id)) {
            redirect(site_url('admin/transaksi'));
        }
    }
}