<?php
class dp_model extends CI_Model
{
    public function doLogin()
    {
        return $this->db->get('pemesan')->result_array();
    }

    public function getPesananByEmail($email)
    {
        return $this->db->get_where('pesanan', ['email' => $email])->row_array();
    }
    public function getPaket()
    {
        return $this->db->get('paket')->getAll();
    }
}
?>