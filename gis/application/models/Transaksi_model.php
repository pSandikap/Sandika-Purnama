<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $transaksi = "transaksi";

    public $id;
    public $drian;
    public $nama;
    public $penyewa;
    public $telp;
    public $no_rek;
    public $biaya;
    public $jatuh_tempo;
    public $ditetapkan;
    //public $gambar = "default.jpg";
    

    public function rules()
    {
        return [
            ['field' => 'drian',
            'label' => 'Kode Drian',
            'rules' => 'required'],
            
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'penyewa',
            'label' => 'Penyewa',
            'rules' => 'required'],
            
            ['field' => 'telp',
            'label' => 'Telepon',
            'rules' => 'required'],

           
            ['field' => 'no_rek',
            'label' => 'No.Rekening',
            'rules' => 'required'],
			
			['field' => 'biaya',
            'label' => 'Biaya',
            'rules' => 'required'],                        

			['field' => 'jatuh_tempo',
            'label' => 'Jatuh_tempo',
            'rules' => 'required'],            

			['field' => 'ditetapkan',
            'label' => 'Ditetapkan',
            'rules' => 'required']            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->transaksi)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->transaksi, ["id" => $id])->row();
    }
        
    public function save($data)
    {
        $this->db->insert($this->transaksi, $data);
    }

    public function update($where,$data)
    {
        $this->db->where($where);
        $this->db->update($this->transaksi,$data);
    }

    public function history($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function getAllHistory()
    {
        return $this->db->get('history')->result();
    }

    public function search($where)
    {
        return $this->db->query("SELECT * FROM history WHERE update_at  LIKE '%".$where."%'")->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->transaksi, array("id" => $id));
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
        $transaksi = $this -> getById($id);
        if ($transaksi->gambar != ""){
            $gambar = explode (".", $transaksi->gambar)[0];
            return array_map('unlink', glob(FCPATH."uploads/transaksi/$gambar.*"));
        }
    }
    
public function selisih($jatuh_tempo, $ditetapkan, $selisih = false) 
{
    $diff = date_diff( date_create($jatuh_tempo), date_create($ditetapkan) );
    if ($selisih)
        return $diff->format($selisih);
    
    return array('y' => $diff->y,
                'm' => $diff->m,
                'd' => $diff->d,
                'h' => $diff->h,
                'i' => $diff->i,
                's' => $diff->s
            );
}

}