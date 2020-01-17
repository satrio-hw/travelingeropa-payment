<?php

class mjoin extends CI_Model
{
    public function jpaket()
    {
    }

    public function jpeserta()
    {
        $this->db->select('peserta.id_order as peserta_order');
        $this->db->from('order');
        $this->db->join('peserta', 'peserta.id_order = order.id_order');
        $this->db->where('order.id_order = peserta.id_order');
        $query = $this->db->get();
        return $query->result();
    }
}
