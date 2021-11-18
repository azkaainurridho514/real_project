<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email' , 'required|trim|valid_email', [
			'required' => 'Field nama tidak boleh kosong',
			'valid_email' => 'Email tidak falid'
		]);
		$this->form_validation->set_rules('password', 'Password' , 'required|trim', [
			'required' => 'Field password tidak boleh kosong'
		]);

		if($this->form_validation->run() == false){
			$this->load->view('auth/login');
		}else{
            $this->_login();
		}
	}

	public function register(){
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[8]',[
			'required' => 'Field username tidak boleh kosong!',
			'min_length' => 'Masukan username minimal 8 karakter!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|trim|min_length[5]|valid_email', [
			'required' => 'Field email tidak boleh kosong!',
			'min_length' => 'Masukan email yang lebih dari 5 karakter!',
			'valid_email' => 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password1', 'password', 'required|trim|matches[password2]|min_length[8]',[
			'required' => 'Field password tidak boleh kosong!',
			'matches' => 'password tidak sama!'
		]);
		$this->form_validation->set_rules('password2', 'confirm', 'required|trim|matches[password2]',[
			'required' => 'Field confirm tidak boleh kosong!'
		]);
		if($this->form_validation->run() == false){
			$this->load->view('auth/register');
		}else{
			$data = [
             'username' => htmlspecialchars($this->input->post('username', true)),
			 'email' => htmlspecialchars($this->input->post('email', true)),
			 'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			 'role_id' => 2,
			 'is_active' => 1
			];
        var_dump($data);
			// $this->db->insert('user', $data);
			// redirect('auth');
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if($user){
	      if($user['is_active'] == 1){
			if(password_verify($password, $user['password'])){
				$data = [
				  'email' => $user['email'],
				  'role_id' => $user['role_id']
				]; 
				$this->session->set_userdata($data);
				if($user['role_id'] == 1){
				  redirect('admin');
				}else{
				  redirect('user');
				}
				
			 }else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Wrong password!</div>');
				   redirect('auth'); 
		   }
		  }else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">This email has not been activated!</div>');
			redirect('auth');
		  }
		 }else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email is not registred!</div>');
			   redirect('auth');
		 }
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<small class="text-danger"></small>');
		redirect('auth');
	}
	public function blocked(){
		echo "Access blocked";
	}
}
