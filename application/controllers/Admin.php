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
    public function delete($id){
        $this->M_admin->delete($id);
        redirect('admin');
    }
    public function update($id){
        $this->M_admin->updateuser($id);
        redirect('admin');
    }
    public function changeaccess(){
        $is_active = $this->input->post('active');
        $id = $this->input->post('id');
   
        $user = $this->db->get('user', ['id', $id]);

        if($user['is_active'] == 0){
        //   $query1 = "UPDATE user SET is_active='1'";
        //   $this->db->query($query1);
         echo"oke";
        }else{
        //   $query2 = "UPDATE user SET is_active='0'";
        //   $this->db->query($query2);
        echo"oke lagi";
        }

    }
}