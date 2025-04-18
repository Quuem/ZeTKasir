<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seeder extends CI_Controller
{

    public function insert_dummy()
    {
        $this->load->database();

        for ($i = 1; $i <= 50; $i++) {
            $data = [
                'NamaPelanggan' => 'Pelanggan ' . $i,
                'Alamat' => 'pelanggan' . $i . '@example.com',
                'NomorTelepon' => '08' . rand(1000000000, 9999999999)
            ];

            $this->db->insert('pelanggan', $data);
        }

        echo "50 data dummy berhasil dimasukkan.";
    }
}
