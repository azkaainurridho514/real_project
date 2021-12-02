<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user']  = $this->M_admin->getalladmin();
        $this->template->load('template', 'dashboard/index', $data);
    }

    public function update($id){
        $this->M_admin->updateuser($id);
        $this->session->set_flashdata('edit', 'Berhasil mengubah!');
        redirect('admin');
    }

    public function delete($id){
        $this->M_admin->delete($id);
        redirect('admin');
    }

    function changeaccess(){
        $is_active = $this->input->post('active');
        $id = $this->input->post('id');
        if($is_active == 0){
            $query2 = "UPDATE user SET is_active='1' where id_user='$id'";
            $this->db->query($query2);
        }else{
          $query2 = "UPDATE user SET is_active='0' where id_user='$id'";
          $this->db->query($query2);
        }

    }
}