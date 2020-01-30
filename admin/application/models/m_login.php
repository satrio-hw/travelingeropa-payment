<?php

class M_login extends CI_Model
{
    private $_table = "admin";

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
#        $this->db->where('email', $post["email"]);
 #       $user = $this->db->get($this->_table)->row();
        $sql ="SELECT * FROM `admin` WHERE `role` <>  'mailer' AND `email` = '".$post['email']."';";
        $user = $this->db->query($sql)->row();

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == "adm" || "spadm";

            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin) {
                // login sukses yay!
                $this->session->set_userdata(['email' => $post["email"], 'role' => $user->role]);
                return true;
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau Password yang dimasukan salah</div>');
        var_dump($user);
        // login gagal
        #return false;
    }
}
