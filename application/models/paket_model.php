<?php defined('BASEPATH') or exit('No direct script access allowed');


class paket_model extends CI_Model
{
    private $_table = "paket";

    public $id_paket;
    public $nama;
    public $harga;
    public $harga_in_landtour;
    public $upgrade_kamar;
    public $keterangan_tambahan;
    public $visa;
    public $asuransi;
    public $simcard;
    public $upgrade_bagasi;

    public function rules()
    {
        return [
            [
                'field' => 'id_paket',
                'label' => 'Id_paket',
                'rules' => 'required'
            ],

            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'numeric'
            ],

            [
                'field' => 'harga_in_landtour',
                'label' => 'Harga_in_landtour',
                'rules' => 'numeric'
            ],

            [
                'field' => 'upgrade_kamar',
                'label' => 'Upgrade_kamar',
                'rules' => 'required'
            ],

            [
                'field' => 'keterangan_tambahan',
                'label' => 'Keterangan_tambahan',
                'rules' => 'required'
            ],

            [
                'field' => 'visa',
                'label' => 'Visa',
                'rules' => 'required'
            ],

            [
                'field' => 'asuransi',
                'label' => 'Asuransi',
                'rules' => 'required'
            ],

            [
                'field' => 'simcard',
                'label' => 'Simcard',
                'rules' => 'required'
            ],

            [
                'field' => 'upgrade_bagasi',
                'label' => 'Upgrade_bagasi',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_paket" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_paket = uniqid();
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->harga_in_landtour = $post["harga_in_landtour"];
        $this->upgrade_kamar = $post["upgrade_kamar"];
        $this->keterangan_tambahan = $post["keterangan_tambahan"];
        $this->visa = $post["visa"];
        $this->asuransi = $post["asuransi"];
        $this->simcard = $post["simcard"];
        $this->upgrade_bagasi = $post["upgrade_bagasi"];

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_paket = uniqid();
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->harga_in_landtour = $post["harga_in_landtour"];
        $this->upgrade_kamar = $post["upgrade_kamar"];
        $this->keterangan_tambahan = $post["keterangan_tambahan"];
        $this->visa = $post["visa"];
        $this->asuransi = $post["asuransi"];
        $this->simcard = $post["simcard"];
        $this->upgrade_bagasi = $post["upgrade_bagasi"];

        $this->db->update($this->_table, $this, array('id_paket' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_paket" => $id));
    }
}
