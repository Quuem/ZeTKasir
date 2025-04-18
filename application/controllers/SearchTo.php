<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SearchTo extends CI_Controller
{

    public function To()
    {
        $Keyword = $this->input->post('Keyword');

        if ($Keyword) {
            $GoTo = explode('/', $Keyword)[0];
            redirect(base_url($GoTo));
        } else {
            redirect(base_url(''));
        }
    }


}

/* End of file SearchTo.php */
