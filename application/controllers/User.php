<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Model_User');
        
        if($this->session->userdata('UserID') == NULL ){
            redirect('Auth');
        }

        if($this->session->userdata('Username') != 'admin' ){
            $this->session->set_flashdata('error', 'Bukan Admin');
            
            redirect('Dashboard');
        }
        
    }

    public function index()
    {

        $data = [
            'User' => $this->Model_User->GetAllData(),
        ];

        $this->load->view('Template/Header', $data, FALSE);
        $this->load->view('User/User', $data, FALSE);
        $this->load->view('Template/Footer', $data, FALSE);
        
    }

    public function Create()
    {
        $this->form_validation->set_rules('NamaUser', 'Nama User', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[user.Username]');
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[5]');


        if ($this->form_validation->run() == TRUE) {
            $Password = $this->input->post('Password');
            $data = [
                'NamaUser' => $this->input->post('NamaUser'),
                'Username' => $this->input->post('Username'),
                'Password' => password_hash($Password, PASSWORD_DEFAULT),
            ];

            $User = $this->Model_User->Create($data);

            if ($User) {
                $this->session->set_flashdata('success', 'Berhasil Membuat Akun');
                redirect('User');
            } else {
                $this->session->set_flashdata('error', 'Gagal Membuat Akun');
                redirect('User');
            }
        } else {
         $this->Register();
        }
    }

    public function Edit($id)
    {
        $User = $this->Model_User->GetUser($id);
        $Username = $this->input->post('Username');
        if($Username == $User->Username){
            $this->form_validation->set_rules('Username', 'Username', 'required');
            
        }else{
            $this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[user.Username]');
        }
        
        
        $this->form_validation->set_rules('NamaUser', 'Nama User', 'trim|required|min_length[5]|max_length[12]');
        // $this->form_validation->set_rules('Password', 'Password', 'min_length[5]');

        if ($this->form_validation->run() == TRUE) {
            $Password = $this->input->post('Password');
            $data = [
                'NamaUser' => $this->input->post('NamaUser'),
                'Username' => $Username,
                'Password' => password_hash($Password, PASSWORD_DEFAULT),
            ];

            $User = $this->Model_User->Edit($id,$data);

            if ($User) {
                $this->session->set_flashdata('success', 'Berhasil Membuat Akun');
                redirect('User');
            } else {
                $this->session->set_flashdata('error', 'Gagal Membuat Akun');
                redirect('User');
            }
        } else {
         $this->index();
        }
    }
    public function Delete($id){
        $Delete = $this->Model_User->Delete($id);

        if($Delete){
            $this->session->set_flashdata('success', 'Data User Berhasil Dihapus');
            redirect('User');
        }else{
            $this->session->set_flashdata('error', 'Data User gagal Dihapus');
            redirect('User');
        }
    }


}

/* End of file Produk.php */
