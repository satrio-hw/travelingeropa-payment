<?php
class Index_model extends CI_Model
{
    public function doLogin()
    {
        return $this->db->get('pemesan')->result_array();
    }
    public function getPemesanByEmail($email)
    {
        return $this->db->get_where('pemesan', ['email' => $email])->row_array();
    }
}
?>