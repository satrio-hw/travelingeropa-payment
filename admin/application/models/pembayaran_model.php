<?php
class pembayaran_model extends CI_Model
{
    public function getAllPembayaran()
    {
        return $this->db->get('pembayaran')->result_array();
    }
    public function getPembayaranByID($id_order)
    {
        return $this->db->get_where('pembayaran', ['id_order' => $id_order])->row_array();
    }
    public function getPembayaranByEmail($email)
    {
        return $this->db->get_where('pembayaran', ['email' => $email])->row_array();
    }
}
?>