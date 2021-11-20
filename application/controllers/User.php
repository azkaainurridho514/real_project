<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construst()
    {
        parent::__construst();
        is_logged_in();
    }

    public function index(){
        $data['title'] = 'User';
        $this->template->load('template', 'user/index', $data);
     }
}