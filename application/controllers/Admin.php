<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
     public function index(){
         $data['title'] = 'Admin';
         $this->load->view('template/header');
         $this->load->view('template/sidebar');
         $this->load->view('template/navbar', $data);
         $this->load->view('dashboard/index');
         $this->load->view('template/footer');
     }
}