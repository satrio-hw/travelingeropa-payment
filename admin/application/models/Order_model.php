<?php defined('BASEPATH') or exit('No direct script access allowed');


class Order_model extends CI_Model
{
    private $_table = "order";

    public $id_order;
    public $id_paket;
    public $email_pemesan;

    public function rules()
    {
        return [
            [
                'field' => 'id_paket',
                'label' => 'ID_Paket',
                'rules' => 'required'
            ],
            [
                'field' => 'email_pemesan',
                'label' => 'Email_Pemesan',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        // $this->db->select('pembayaran.id_order , paket.nama as nama_paket, pembayaran.email as email');
        // $this->db->from('order');
        // $this->db->join('paket', 'paket.id_paket = order.id_paket');
        // $this->db->join('pembayaran', 'pembayaran.id_order = order.id_order');
        // $query = $this->db->get();
        // return $query->result();
        return $this->db->get($this->_table)->result();
    }


    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_order" => $id])->row();
    }
}
