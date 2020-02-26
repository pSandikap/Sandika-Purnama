<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $user = "user";

    public $id;
    public $nama;
    public $username;
    public $password;
    public $email;
    public $akses;
    
    

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],            
            
            ['field' => 'akses',
            'label' => 'Akses',
            'rules' => 'required']            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->user)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->user, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->akses = $post["akses"];
        $this->db->insert($this->user, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->akses = $post["akses"];
        $this->db->update($this->user, $this, array('id' => $post['id']));

        /*if(!empty($_FILES["gambar"]["nama"])){
            $this->gambar = $this -> _uploadImage();
        } else {
            $this->gambar = $post["old_image"];
        }*/
    }

    public function delete($id)
    {
        return $this->db->delete($this->user, array("id" => $id));
    }

    private function _uploadImage(){
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['gambar'] = $this->id;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;

        $this->load->library('uploads', $config);

        if ($this->upload->do_upload('file')){
            return $this->upload->data("gambar");
        }
        return "default.jpg";
    }
    private function _deleteImage($id){
        $user = $this -> getById($id);
        if ($user->gambar != ""){
            $gambar = explode (".", $user->gambar)[0];
            return array_map('unlink', glob(FCPATH."uploads/user/$gambar.*"));
        }
    }
}