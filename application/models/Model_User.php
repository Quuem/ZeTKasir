<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_User extends CI_Model {

    public function GetAllData(){
        return $this->db->get('user')->result();
    }

    public function Create($data){
        return $this->db->insert('user', $data);
    }

    public function Edit($id,$data){
        return $this->db->where('UserID',$id)->update('user', $data);
    }

    public function Delete($id){
        return $this->db->where('UserID',$id)->delete('user');
        
    }

    public function GetUser($id){
        return $this->db->where('UserID', $id)->get('user')->row();
        
    }

}

/* End of file Model_Produk.php */
