<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function index(){
        $this->load->model('M_real_project');
        $data['all'] = $this->M_real_project->getAll();
        $data['title'] = 'User';
        $this->template->load('template', 'user/index', $data);
     }

     public function insert(){

         $id               = $this->input->post('id');
         $nama_barang      = $this->input->post('nama_barang');
         $satuan           = $this->input->post('satuan');
         $keterangan       = $this->input->post('keterangan');
         $jumlah_pengadaan = $this->input->post('jumlah_pengadaan');
         $jumlah_baik      = $this->input->post('jumlah_baik');
         $jumlah_buruk     = $this->input->post('jumlah_buruk');
         $ruangan          = $this->input->post('ruangan');

         $master_barang = [
             'id_barang' => $id,
             'id_pengadaan' => $id,
             'id_kondisi' => $id,
             'id_ruangan' => 2,
             'nama_barang' => $nama_barang,
             'satuan' => $satuan,
             'keterangan' => $keterangan,
             'gambar' => 'gambar'
         ];

         $this->db->insert('master_barang', $master_barang);

         $pengadaan = [
             'id_pengadaan' => $id,
             'jumlah_pengadaan' => $jumlah_pengadaan
           
         ];

         $this->db->insert('pengadaan', $pengadaan);

         $kondisi = [
             'id_kondisi' => $id,
             'id_barang' => $id,
             'jumlah_baik' => $jumlah_baik,
             'jumlah_buruk' => $jumlah_buruk
         ];

         $this->db->insert('kondisi', $kondisi);
         redirect('user');
     }

}