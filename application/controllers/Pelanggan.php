<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Model_Pelanggan');
        
        if($this->session->userdata('UserID') == NULL ){
            redirect('Auth');
        }
        
    }

    public function index()
    {

        $data = [
            'Pelanggan' => $this->Model_Pelanggan->GetAllData(),
        ];

        $this->load->view('Template/Header', $data, FALSE);
        $this->load->view('Pelanggan/Pelanggan', $data, FALSE);
        $this->load->view('Template/Footer', $data, FALSE);
        
    }

    public function Create(){
        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('NomorTelepon', 'Nomor Telepon', 'trim|required|max_length[15]|numeric');
        

        
        if ($this->form_validation->run() == TRUE ) {
            $data = [
                'NamaPelanggan'=> htmlspecialchars($this->input->post('NamaPelanggan')),
                'Alamat'=> htmlspecialchars($this->input->post('Alamat')),
                'NomorTelepon'=> htmlspecialchars($this->input->post('NomorTelepon')),
            ];

            $Pelanggan = $this->Model_Pelanggan->Create($data);

            if($Pelanggan){
                $this->session->set_flashdata('success', 'Data Pelanggan Berhasil Ditambahkan');
                redirect('Pelanggan');
            }else{
                $this->session->set_flashdata('error', 'Data Pelanggan Gagal Ditambahkan');
                redirect('Pelanggan');
            }

        } else {
            $this->index();
        }
        
    }

    public function Edit($id){
        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('NomorTelepon', 'Nomor Telepon', 'trim|required|max_length[15]|numeric');
        
        
        if ($this->form_validation->run() == TRUE ) {
            $data = [
                'NamaPelanggan'=> htmlspecialchars($this->input->post('NamaPelanggan')),
                'Alamat'=> htmlspecialchars($this->input->post('Alamat')),
                'NomorTelepon'=> htmlspecialchars($this->input->post('NomorTelepon')),
            ];

            $Pelanggan = $this->Model_Pelanggan->Edit($id,$data);

            if($Pelanggan){
                $this->session->set_flashdata('success', 'Data Pelanggan Berhasil Diedit');
                redirect('Pelanggan');
            }else{
                $this->session->set_flashdata('error', 'Data Pelanggan Gagal Diedit');
                redirect('Pelanggan');
            }

        } else {
            $this->index();
        }
        
    }

    public function Delete($id){
        $Delete = $this->Model_Pelanggan->Delete($id);

        if($Delete){
            $this->session->set_flashdata('success', 'Data Pelanggan Berhasil Dihapus');
            redirect('Pelanggan');
        }else{
            $this->session->set_flashdata('error', 'Data Pelanggan gagal Dihapus');
            redirect('Pelanggan');
        }
    }


}

/* End of file Pelanggan.php */
