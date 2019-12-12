<?php

class admin_model extends CI_Model
{
    public function getAllAdmins()
    {
        return $this->db->get('admin')->result_array();
    }

    public function getAdminByID($id)
    {
        return $this->db->get_where('admin', ['id_admin' => $id])->row_array();
    }

    public function getAdminByEmail($email)
    {
        return $this->db->get_where('admin', ['email' => $email])->row_array();
    }
}
