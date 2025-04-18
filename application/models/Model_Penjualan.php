<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_Penjualan extends CI_Model
{

    public function GetAllDataPenjualan()
    {
        $this->db->select('penjualan.*,pelanggan.*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'pelanggan.PelangganID = penjualan.PelangganID', 'left');
        return $this->db->get()->result();
    }

    public function GetAllDataPelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }

    public function Create($data)
    {
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id();

    }

    public function Delete($PenjualanID)
    {
        return $this->db->where('PenjualanID', $PenjualanID)->delete('penjualan');

    }










    // BATAS PENJUALAN DAN DETAIL

    public function GetPenjualanDetail($PenjualanID)
    {
        $this->db->select('penjualan.*,pelanggan.*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'pelanggan.PelangganID = penjualan.PelangganID', 'left');
        return $this->db->where('penjualan.PenjualanID', $PenjualanID)->get()->row();
    }

    public function GetProduk()
    {
        return $this->db->where('Stok >', 0)->get('produk')->result();
    }

    public function SubTotalDetail($PenjualanID)
    {
        $this->db->select_sum('SubTotal');
        $this->db->where('PenjualanID', $PenjualanID);
        $this->db->from('detailpenjualan');
        return $this->db->get()->row();
    }

    public function Detail($PenjualanID)
    {
        $this->db->select('detailpenjualan.*,produk.*');
        $this->db->from('detailpenjualan');
        $this->db->join('produk', 'produk.ProdukID = detailpenjualan.ProdukID', 'left');
        return $this->db->where('detailpenjualan.PenjualanID', $PenjualanID)->get()->result();
    }

    public function GetProdukByID($ProdukID)
    {
        return $this->db->where('ProdukID', $ProdukID)->get('produk')->row();
    }

    public function CreateDetail($data)
    {
        return $this->db->insert('detailpenjualan', $data);
    }

    public function KurangiStok($ProdukID, $Jumlah)
    {
        $this->db->set('Stok', 'Stok - ' . $Jumlah, false);
        $this->db->where('ProdukID', $ProdukID);
        return $this->db->update('produk');
    }

    public function DetailProduk($DetailID)
    {
        return $this->db->where('DetailID', $DetailID)->get('detailpenjualan')->row();
    }

    public function KembalikanStok($ProdukID, $Jumlah)
    {
        $this->db->set('Stok', 'Stok + ' . $Jumlah, false);
        $this->db->where('ProdukID', $ProdukID);
        return $this->db->update('produk');
    }

    public function DeleteDetail($DetailID)
    {
        return $this->db->where('DetailID', $DetailID)->delete('detailpenjualan');
    }

    public function Bayar($PenjualanID, $data)
    {
        return $this->db->where('PenjualanID', $PenjualanID)->update('penjualan', $data);
    }

}

/* End of file Model_Penjualan.php */
