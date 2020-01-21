<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mailer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    }
    function index()
    {
        $the_mailer = $this->db->get_where('admin', ['role' => 'mailer'])->row_array();
        #var_dump($the_mailer);

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.' . $the_mailer['alamat']; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = $the_mailer['email']; // user email
        $mail->Password = base64_decode($the_mailer['password']); // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom($the_mailer['email'], ''); // user email
        $mail->addReplyTo('', ''); //user email

        // Add a recipient
        $mail->addAddress($this->session->userdata('sendto')); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'Info Pembayaran Traveling Eropa'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        $mail->AddAttachment(base_url('assets/img/logo_block.png'), 'logo.png');

        $mail->AddEmbeddedImage('logo.png', 'logo', 'logo.png');

        // Email body content
        if ($this->session->userdata('konfirmasi') == 'diterima') {
            $mailContent = "<h2 align='middle'>Traveling Eropa</h2><br> <img scr=\'cid:logo\' align='middle''/> <br><br><br>Dengan ini kami dari traveling eropa memberitahukan bahwa pembayaran anda dengan detail : <br><br>
                        Email Pemesan<ensp>: <b>" . $this->session->userdata('sendto') . "</b><br>
                        No Pesanan<ensp>: <b>" . $this->session->userdata('idorder') . "</b><br>
                        Pembayaran<ensp>: <b>" . $this->session->userdata('type') . "</b><br>
                        <br>Telah <b>berhasil kami konfirmasi</b>. Bila anda membutuhkan bantuan lebih lanjut, silahkan hubungi customer service kami";
        }
        if ($this->session->userdata('konfirmasi') == 'ditolak') {
            $mailContent = "<h2 align='middle'>Traveling Eropa</h2><br> <img scr=\'cid:logo\' align='middle''/> <br><br><br>Dengan ini kami dari traveling eropa memberitahukan bahwa pembayaran anda dengan detail : <br><br>
                        Email Pemesan<ensp>: <b>" . $this->session->userdata('sendto') . "</b><br>
                        No Pesanan<ensp>: <b>" . $this->session->userdata('idorder') . "</b><br>
                        Pembayaran<ensp>: <b>" . $this->session->userdata('type') . "</b><br>
                        <br>dengan sangat berat hati <b>kami tolak</b>. Penolakan dikarenakan beberapa alasan khusus. Bila anda membutuhkan informasi lebih lanjut, silahkan hubungi customer service kami";
        }
        if ($this->session->userdata('konfirmasi') == 'pending') {
            $mailContent = "<h2 align='middle'>Traveling Eropa</h2><br> <img scr=\'cid:logo\' align='middle''/> <br><br><br>Dengan ini kami dari traveling eropa memberitahukan bahwa pembayaran anda dengan detail : <br><br>
                        Email Pemesan<ensp>: <b>" . $this->session->userdata('sendto') . "</b><br>
                        No Pesanan<ensp>: <b>" . $this->session->userdata('idorder') . "</b><br>
                        Pembayaran<ensp>: <b>" . $this->session->userdata('type') . "</b><br>
                        <br>memiliki beberapa <b>data prasyarat/ketentuan</b> yang belum terpenuhi, antara lain :<br><br>
                        <b>" . $this->session->userdata('req') . "
                        </b><br><br>
                        . Bila anda membutuhkan informasi lebih lanjut, silahkan hubungi customer service kami";
        }
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            $this->session->unset_userdata('konfirmasi');
            $this->session->unset_userdata('sendto');
            $this->session->unset_userdata('idorder');
            $this->session->unset_userdata('type');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Mail Error :' . $mail->ErrorInfo . '<br>1. Cek kembali pengatran mailer<br>2. pastikan hanya 1 mailer pada tabel admin</div>');
            redirect(base_url('cmanagementpembayaran/mp'));
        } else {
            if ($this->session->userdata('konfirmasi') == 'pending') {
                $data = ['konfirmasi' => $this->session->userdata('req')];
                $this->session->unset_userdata('req');
            } else if ($this->session->userdata('konfirmasi') == 'diterima') {
                $data = ['konfirmasi' => 'confirmed'];
            } else {
                $data = ['konfirmasi' => 'REJECTED'];
            }
            $this->db->where(['email' => $this->session->userdata('sendto'), 'id_order' => $this->session->userdata('idorder'), 'pembayaran' => $this->session->userdata('type')]);
            $this->db->update('pembayaran', $data);
            $this->session->unset_userdata('konfirmasi');
            $this->session->unset_userdata('sendto');
            $this->session->unset_userdata('idorder');
            $this->session->unset_userdata('type');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Email Berhasil dikirimkan</div>');
            redirect(base_url('cmanagementpembayaran/mp'));
        }
    }
}
