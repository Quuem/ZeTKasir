<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_Model {

    public function Create($data){
        return $this->db->insert('user', $data);
    }

    public function GetUserByUsername($Username){
        return $this->db->where('Username',$Username)->get('user')->row();
    }

}

/* End of file Model_Auth.php */
