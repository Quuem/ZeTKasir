<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('UserID') == NULL) {
            redirect('Auth');
        }
    }

    public function index()
    {

        $Pelanggan = $this->db->count_all('pelanggan');
        $Produk = $this->db->count_all('produk');
        $Penjualan = $this->db->where('TotalHarga >', 0)->count_all_results('penjualan');

        $this->db->select_sum('TotalHarga');
        $this->db->from('penjualan');
        $Pendapatan = $this->db->get('')->row();


        $data = [
            'Pelanggan' => $Pelanggan,
            'Produk' => $Produk,
            'Penjualan' => $Penjualan,
            'Pendapatan' => $Pendapatan,

        ];

        $this->load->view('Template/Header', );
        $this->load->view('Dashboard', $data, FALSE);
        $this->load->view('Template/Footer', );

    }

    public function Logout()
    {

        $this->session->unset_userdata('UserID');
        $this->session->unset_userdata('Username');
        $this->session->unset_userdata('NamaUser');

        redirect('Auth');
    }

}

/* End of file Dashboard.php */
