<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Penjualan');
        
        if($this->session->userdata('UserID') == NULL ){
            redirect('Auth');
        }
    }

    public function index()
    {
        $Penjualan = $this->Model_Penjualan->GetAllDataPenjualan();
        $Pelanggan = $this->Model_Penjualan->GetAllDataPelanggan();

        $data = [
            'Penjualan' => $Penjualan,
            'Pelanggan'=> $Pelanggan
        ];

        $this->load->view('Template/Header', $data, FALSE);
        $this->load->view('Penjualan/Penjualan', $data, FALSE);
        $this->load->view('Template/Footer', $data, FALSE);
        
    }

    public function Create($id){
        
        $Tanggal = Date('Y-m-d');
        $data = [
            'PelangganID'=> $id,
            'TanggalPenjualan'=> $Tanggal,
            'TotalHarga'=> 0,
            'TotalPembayaran'=> 0,
            'Status'=> 'Pending'
        ];

        $Penjualan = $this->Model_Penjualan->Create($data);
        if($Penjualan){
            redirect('Penjualan/Detail/'.$Penjualan);
        }else{
            $this->session->set_flashdata('error', 'Gagal Menambahkan Penjualan');
            redirect('Penjualan');
        }
    }

    public function Delete($id){
        $Pelanggan = $this->Model_Penjualan->Delete($id);
    
        if($Pelanggan){
            $this->session->set_flashdata('success','Berhasil Menghapus Penjualan');
            redirect('Penjualan');
        }else{
            $this->session->set_flashdata('error','Gagal Menghapus Penjualan');
            redirect('Penjualan');
        }
    }





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function Detail($id){


        $Penjualan = $this->Model_Penjualan->GetPenjualanDetail($id);
        
        if($Penjualan->Status =='Selesai'){
            redirect('Penjualan');
        }
        
        $Produk = $this->Model_Penjualan->GetProduk();
        $SubTotal = $this->Model_Penjualan->SubTotalDetail($id);
        $Detail = $this->Model_Penjualan->Detail($id);
        $data = [
            'Penjualan' => $Penjualan,
            'Produk'=> $Produk,
            'SubTotal'=> $SubTotal,
            'Detail'=> $Detail,
        ];

        $this->load->view('Template/Header', $data, FALSE);
        $this->load->view('Penjualan/Detail', $data, FALSE);
        $this->load->view('Template/Footer', $data, FALSE);
    }

    
    public function CreateDetail($PenjualanID){
        $ProdukID = $this->input->post('ProdukID');
        $Produk = $this->Model_Penjualan->GetProdukByID($ProdukID);
        $Jumlah = htmlspecialchars($this->input->post('Jumlah'));
        $SubTotal = $Jumlah * $Produk->Harga;

        if($Jumlah > $Produk->Stok){
            $this->session->set_flashdata('error', 'Produk Tidak Cukup');
            redirect('Penjualan/Detail/'.$PenjualanID);
        }

        $data = [
            'PenjualanID'=> $PenjualanID,
            'ProdukID' =>$ProdukID,
            'JumlahProduk'=> htmlspecialchars($Jumlah),
            'SubTotal'=> $SubTotal,
            
        ];

        $Detail = $this->Model_Penjualan->CreateDetail($data);
        if($Detail){
            $this->session->set_flashdata('success', 'Produk Ditambahkan');
            $this->Model_Penjualan->KurangiStok($ProdukID,$Jumlah);
            redirect('Penjualan/Detail/'.$PenjualanID);
        }else{
            
            $this->session->set_flashdata('error', 'Produk Gagal Ditambahkan');
            redirect('Penjualan/Detail/'.$PenjualanID);
        }
    }

    public function DeleteDetail($DetailID): void{
        $Detail = $this->Model_Penjualan->DetailProduk($DetailID);

        if($Detail){
            $this->Model_Penjualan->KembalikanStok( $Detail->ProdukID,$Detail->JumlahProduk );
            $this->Model_Penjualan->DeleteDetail( $DetailID);
            $this->session->set_flashdata('success','Produk Dihapus Dari Cart');
            redirect('Penjualan/Detail/'.$Detail->PenjualanID);
        }else{
            $this->session->set_flashdata('error','Produk Gagal Dihapus Dari Cart');
            redirect('Penjualan/Detail/'.$Detail->PenjualanID);

        }

    }

    public function Bayar($id){
        
        $TotalHarga = $this->input->post('TotalHarga');
        $TotalBayar = htmlspecialchars($this->input->post('TotalPembayaran'));

        $data=[
            'TotalHarga' => $TotalHarga,
            'TotalPembayaran' => $TotalBayar,
            'Status'=> 'Selesai',
        ];

        if($this->Model_Penjualan->Bayar($id,$data)){
            redirect('Penjualan/Struk/'.$id);
        }
    }

    public function Struk($id){


        $Penjualan = $this->Model_Penjualan->GetPenjualanDetail($id);
        
        if($Penjualan->Status !='Selesai'){
            redirect('Penjualan');
        }
        
        $Produk = $this->Model_Penjualan->GetProduk();
        $SubTotal = $this->Model_Penjualan->SubTotalDetail($id);
        $Detail = $this->Model_Penjualan->Detail($id);
        $data = [
            'Penjualan' => $Penjualan,
            'Produk'=> $Produk,
            'SubTotal'=> $SubTotal,
            'Detail'=> $Detail,
        ];

        $this->load->view('Template/Header', $data, FALSE);
        $this->load->view('Penjualan/Struk', $data, FALSE);
        $this->load->view('Template/Footer', $data, FALSE);
    }



}

/* End of file Produk.php */
