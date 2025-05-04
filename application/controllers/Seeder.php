<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seeder extends CI_Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function Pelanggan()
    {
        if ($this->session->userdata('Username') == 'admin') {
            for ($i = 1; $i <= 10; $i++) {
                $data = [
                    'NamaPelanggan' => 'Pelanggan ' . $i,
                    'Alamat' => 'pelanggan' . $i . '@gmail.com',
                    'NomorTelepon' => '08' . rand(1000000000, 9999999999)
                ];

                $this->db->insert('pelanggan', $data);
            }
            $this->session->set_flashdata('success', 'Berhasil Melakukan Seeder Data Pelanggan');

            redirect('Pelanggan');
        }
        redirect('');
    }

    public function Produk()
    {
        if ($this->session->userdata('Username') == 'admin') {
            for ($i = 1; $i <= 10; $i++) {
                $data = [
                    'NamaProduk' => 'Produk ' . $i,
                    'Harga' => rand(1000, 10000000),
                    'Stok' =>  rand(100, 10000)
                ];

                $this->db->insert('pelanggan', $data);
            }
            $this->session->set_flashdata('success', 'Berhasil Melakukan Seeder Data Produk');
            
            redirect('Produk');
        }
        redirect('');
    }
}
