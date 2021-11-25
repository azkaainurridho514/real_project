<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_user');
    }
    
    public function index(){
        $this->load->model('M_real_project');
        $data['all'] = $this->M_real_project->getAll();
        $data['title'] = 'User';
        $this->template->load('template', 'user/index', $data);
     }

     public function insert(){
         $this->M_user->insert();
         redirect('user');

     }

     public function delete($id){
         $this->M_user->delete($id);
         redirect('user');
     }

}