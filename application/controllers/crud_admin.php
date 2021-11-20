<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_admin extends CI_Controller { 
public function index (){

	$this->load->model('m_real_proejct');
	$data['barang']=$this->m_real_project->get_data();
}

	
}
	?>	
