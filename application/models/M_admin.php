<?php
class M_admin extends CI_Model
{
    function getalladmin(){
        $query = "SELECT * FROM user 
                  INNER JOIN user_role 
                  ON user.role_id = user_role.id
        ";
        return $this->db->query($query)->result_array();
        // return $this->db->get('user')->result_array();
    }

    function delete($id){
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    function updateuser($id){
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('pass');
            $role_id  = $this->input->post('role_id');

        $query = "UPDATE user SET username='$username', email='$email', password='$password', role_id='$role_id' WHERE id_user='$id'";
        $this->db->query($query);
    }
}