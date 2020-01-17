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

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'rio.elmaestro@gmail.com'; // user email
        $mail->Password = ''; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('rio.elmaestro@gmail.com', ''); // user email
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
                        Email Pemesan<ensp>:" . $this->session->userdata('sendto') . "<br>
                        No Pesanan<ensp>:" . $this->session->userdata('idorder') . "<br>
                        Pembayaran<ensp>:" . $this->session->userdata('type') . "<br>
                        <br>Telah <b>berhasil kami konfirmasi</b>. Bila anda membutuhkan bantuan lebih lanjut, silahkan hubungi customer service kami";
        }
        if ($this->session->userdata('konfirmasi') == 'ditolak') {
            $mailContent = "<h2 align='middle'>Traveling Eropa</h2><br> <img scr=\'cid:logo\' align='middle''/> <br><br><br>Dengan ini kami dari traveling eropa memberitahukan bahwa pembayaran anda dengan detail : <br><br>
                        Email Pemesan<ensp>:" . $this->session->userdata('sendto') . "<br>
                        No Pesanan<ensp>:" . $this->session->userdata('idorder') . "<br>
                        Pembayaran<ensp>:" . $this->session->userdata('type') . "<br>
                        <br>dengan sangat berat hati <b>kami tolak</b>. Penolakan dikarenakan beberapa alasan khusus. Bila anda membutuhkan informasi lebih lanjut, silahkan hubungi customer service kami";
        }
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        $this->session->unset_userdata('sendto');
        $this->session->unset_userdata('idorder');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('konfirmasi');
        redirect(base_url('cmanagementpembayaran/mp'));
    }
}
