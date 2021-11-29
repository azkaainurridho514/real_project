<?php
class M_admin extends CI_Model
{
    function getalladmin(){
        return $this->db->get('user')->result_array();
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    function updateuser($id){
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('pass');
            $role_id  = $this->input->post('role_id');
            $is_active= $this->input->post('is_active');

        $query = "UPDATE user SET username='$username', email='$email', password='$password', role_id='$role_id', is_active='$is_active' WHERE id='$id'";
        $this->db->query($query);
    }
}