<?php

class admin_model extends CI_Model
{
    public function getAllAdmins()
    {
        return $this->db->get('admin')->result_array();
    }

    public function getNameAdmin($id)
    {
        return $this->db->get_where('admin', ['id_admin' => $id])->row_array();  // Produces: SELECT title, content, date FROM mytable
    }
}
