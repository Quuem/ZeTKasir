<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NotFoundPage extends CI_Controller
{

    public function index()
    {
        $this->load->view('Template/Header', );
        $this->load->view('errors/NotFoundPage', );
    }

}

/* End of file NotFoundPage.php */
