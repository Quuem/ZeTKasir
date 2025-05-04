<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SearchTo extends CI_Controller
{

    public function To()
    {
        $Keyword = htmlspecialchars($this->input->post('Keyword'));

        if ($Keyword) {
            $word = explode('/', $Keyword)[0];
            redirect($word);
        }
            redirect(); 
    }


}

/* End of file SearchTo.php */
