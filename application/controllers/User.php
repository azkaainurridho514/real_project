<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $this->load->model('M_real_project');
        $data['all'] = $this->M_real_project->getAll();
        $data['title'] = 'User';
        $this->template->load('template', 'user/index', $data);
     }

     public function insert(){
         $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required',['required' => 'Field nama barang tidak boleh kosong!']);
         $this->form_validation->set_rules('satuan', 'Satuan', 'required',['required' => 'Field satuan tidak boleh kosong!']);
         $this->form_validation->set_rules('jumlah_pengadaan', 'Jumlah pengadaan', 'required',['required' => 'Field jumalh pengadaan tidak boleh kosong!']);
         $this->form_validation->set_rules('kondisi_baik', 'Kondisi baik', 'required',['required' => 'Field kondisi baik tidak boleh kosong!']);
         $this->form_validation->set_rules('kondisi_buruk', 'kondisi buruk', 'required',['required' => 'Field jumlah buruk tidak boleh kosong!']);
         $this->form_validation->set_rules('keterangan', 'keterangan', 'required',['required' => 'Field keterangan tidak boleh kosong!']);
         if($this->form_validation->run() === FALSE){
            redirect('user');
         }else{
            $this->M_user->insert();
            redirect('user');
         }

     }

     public function update($id){
         $this->M_user->update($id);
         redirect('user');
     }

     public function delete($id){
         $this->M_user->delete($id);
         redirect('user');
     }

}