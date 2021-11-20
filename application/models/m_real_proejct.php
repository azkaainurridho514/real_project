<?php 

 class M_real_proejct extends CI_Model {
 	public function get_data () 
 	{
 		return $this->db->get('master_barang')->result_array();
 	}
 }
 ?>