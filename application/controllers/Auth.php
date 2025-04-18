<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Auth');
        //
        if ($this->session->userdata('UserID') != NULL) {
            redirect('Dashboard');
        }
    }

    public function index()
    {
        $this->load->view('Auth/Login');
    }

    public function Register()
    {
        $this->load->view('Auth/Register');
    }

    public function CreateUser()
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

            $User = $this->Model_Auth->Create($data);

            if ($User) {
                $this->session->set_flashdata('success', 'Berhasil Membuat Akun');
                redirect('Auth');
            } else {
                $this->session->set_flashdata('error', 'Gagal Membuat Akun');
                redirect('Auth');
            }
        } else {
            $this->Register();
        }
    }

    public function Login()
    {
        $this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[5]');


        if ($this->form_validation->run() == TRUE) {
            $Username = $this->input->post('Username');
            $Password = $this->input->post('Password');

            $User = $this->Model_Auth->GetUserByUsername($Username);

            if ($User) {
                if (password_verify($Password, $User->Password)) {
                    $data = [
                        'NamaUser' => $User->NamaUser,
                        'UserID' => $User->UserID,
                        'Username' => $User->Username,
                    ];



                    $this->session->set_userdata($data);
                    redirect('Dashboard');



                } else {
                    $this->session->set_flashdata('error', 'Password Salah');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Akun Tidak Ditemukan Atau Username Salah');
                redirect('Auth');
            }

        } else {
            $this->index();
        }



    }
}

/* End of file Auth.php */
