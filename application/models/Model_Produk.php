<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Produk extends CI_Model {

    public function GetAllData(){
        return $this->db->get('produk')->result();
    }

    public function Create($data){
        return $this->db->insert('produk', $data);
    }

    public function Edit($id,$data){
        return $this->db->where('ProdukID',$id)->update('produk', $data);
    }

    public function Delete($id){
        return $this->db->where('ProdukID',$id)->delete('produk');
        
    }

}

/* End of file Model_Produk.php */
