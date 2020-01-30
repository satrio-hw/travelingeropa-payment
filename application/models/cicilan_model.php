<?php
class Cicilan_model extends CI_Model
{
    public function getCicilanByIdOrder($id_order)
    {
        return $this->db->get('pembayaran',['id_order'=>$id_order])->row_array();
    }
    public function getCicilanByEmail($email)
    {
        return $this->db->get_where('pembayaran', ['email' => $email])->row_array();
    }
}
?>