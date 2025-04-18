<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        // parent::__construct();

        $this->load->model('Model_Produk');

        if ($this->session->userdata('UserID') == NULL) {
            redirect('Auth');
        }

    }

    public function index()
    {

        $data = [
            'Produk' => $this->Model_Produk->GetAllData(),
        ];

        $this->load->view('Template/Header', $data, FALSE);
        $this->load->view('Produk/Produk', $data, FALSE);
        $this->load->view('Template/Footer', $data, FALSE);

    }

    public function Create()
    {
        $this->form_validation->set_rules('NamaProduk', 'Nama Produk', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('Harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('Stok', 'Stok', 'trim|required|numeric');



        if ($this->form_validation->run() == TRUE) {
            $data = [
                'NamaProduk' => htmlspecialchars($this->input->post('NamaProduk')),
                'Harga' => htmlspecialchars($this->input->post('Harga')),
                'Stok' => htmlspecialchars($this->input->post('Stok')),
            ];

            $Produk = $this->Model_Produk->Create($data);

            if ($Produk) {
                $this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan');
                redirect('Produk');
            } else {
                $this->session->set_flashdata('error', 'Data Produk Gagal Ditambahkan');
                redirect('Produk');
            }

        } else {
            $this->index();
        }

    }

    public function Edit($id)
    {
        $this->form_validation->set_rules('NamaProduk', 'Nama Produk', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('Harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('Stok', 'Stok', 'trim|required|numeric');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'NamaProduk' => htmlspecialchars($this->input->post('NamaProduk')),
                'Harga' => htmlspecialchars($this->input->post('Harga')),
                'Stok' => htmlspecialchars($this->input->post('Stok')),
            ];

            $Produk = $this->Model_Produk->Edit($id, $data);

            if ($Produk) {
                $this->session->set_flashdata('success', 'Data Produk Berhasil Diedit');
                redirect('Produk');
            } else {
                $this->session->set_flashdata('error', 'Data Produk Gagal Diedit');
                redirect('Produk');
            }

        } else {
            $this->index();
        }

    }

    public function Delete($id)
    {
        $Delete = $this->Model_Produk->Delete($id);

        if ($Delete) {
            $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus');
            redirect('Produk');
        } else {
            $this->session->set_flashdata('error', 'Data Produk gagal Dihapus');
            redirect('Produk');
        }
    }


}

/* End of file Produk.php */
