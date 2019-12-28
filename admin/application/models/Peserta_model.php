<?php defined('BASEPATH') or exit('No direct script access allowed');


class Peserta_model extends CI_Model
{
    private $_table = "peserta";

    public $id_peserta;
    public $email_peserta;
    public $nama;
    public $tanggal_lahir;
    public $no_passport;
    public $exp_passport;
    public $status_tiket;
    public $hp;
    public $domisili;

    public function rules()
    {
        return [
            [
                'field' => 'email_peserta',
                'label' => 'Email_Peserta',
                'rules' => 'required'
            ],

            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal_Lahir',
                'rules' => 'required'
            ],

            [
                'field' => 'no_passport',
                'label' => 'No_Passport',
                'rules' => 'numeric'
            ],

            [
                'field' => 'exp_passport',
                'label' => 'Exp_Passport',
                'rules' => 'required'
            ],

            [
                'field' => 'status_tiket',
                'label' => 'Status_Tiket',
                'rules' => 'required'
            ],

            [
                'field' => 'hp',
                'label' => 'HP',
                'rules' => 'numeric'
            ],

            [
                'field' => 'domisili',
                'label' => 'Domisili',
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
        return $this->db->get_where($this->_table, ["id_peserta" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_peserta = uniqid();
        $this->email_peserta = $post["email_peserta"];
        $this->nama = $post["nama"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->no_passport = $post["no_passport"];
        $this->exp_passport = $post["exp_passport"];
        $this->status_tiket = $post["status_tiket"];
        $this->hp = $post["hp"];
        $this->domisili = $post["domisili"];

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_peserta = $post['id'];
        $this->email_peserta = $post['email_peserta'];
        $this->nama = $post['nama'];
        $this->tanggal_lahir = $post['tanggal_lahir'];
        $this->no_passport = $post['no_passport'];
        $this->exp_passport = $post['exp_passport'];
        $this->status_tiket = $post['status_tiket'];
        $this->hp = $post['hp'];
        $this->domisili = $post['domisili'];

        $this->db->update($this->_table, $this, array('id_peserta' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_peserta" => $id));
    }
}
