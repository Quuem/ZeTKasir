<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Pelanggan extends CI_Model {

    public function GetAllData(){
        return $this->db->get('pelanggan')->result();
    }

    public function Create($data){
        return $this->db->insert('pelanggan', $data);
    }

    public function Edit($id,$data){
        return $this->db->where('PelangganID',$id)->update('pelanggan', $data);
    }

    public function Delete($id){
        return $this->db->where('PelangganID',$id)->delete('pelanggan');
        
    }


    


}

/* End of file Model_Pelanggan.php */
