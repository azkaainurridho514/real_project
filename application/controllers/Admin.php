<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $this->template->load('template', 'dashboard/index', $data);
    }
    public function profile($id)
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->template->load('template', 'profile/profile', $data);
    }
}