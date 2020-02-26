<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
    private $lokasi = "lokasi";

    public $id;
    public $drian;
    public $nama;
    public $alamat;
    public $telp;
    public $latitude;
    public $longitude;
    public $gambar = "default.jpg";
    

    public function rules()
    {
        return [
            ['field' => 'drian',
            'label' => 'Drian',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'telp',
            'label' => 'Telepon',
            'rules' => 'required'],

            ['field' => 'latitude',
            'label' => 'Latitude',
            'rules' => 'required'],            
            
            ['field' => 'longitude',
            'label' => 'Longitude',
            'rules' => 'required']            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->lokasi)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->lokasi, ["id" => $id])->row();
    }

    public function get2table(){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('lokasi','lokasi.drian=transaksi.drian');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($gbr)
    {
        $post = $this->input->post();
        $this->drian= $post["drian"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->gambar = $gbr;
        $this->db->insert($this->lokasi, $this);
    }

    public function update($gbr)
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->drian= $post["drian"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];                
        $this->gambar = $gbr;  
        $this->db->update($this->lokasi, $this, array('id' => $post['id']));              
    }

    public function delete($id)
    {
        return $this->db->delete($this->lokasi, array("id" => $id));
    }

    private function _uploadImage(){
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('uploads', $config);

        if ($this->upload->do_upload('gambar')){
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
        return "default.jpg";
    }
    private function _deleteImage($id){
        $lokasi = $this -> getById($id);
        if ($lokasi->gambar != ""){
            $gambar = explode (".", $lokasi->gambar)[0];
            return array_map('unlink', glob(FCPATH."uploads/lokasi/$gambar.*"));
        }
    }
}