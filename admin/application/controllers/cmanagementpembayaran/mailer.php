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
        $mail->Host     = 'travelingeropapay.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = '#####'; // user email
        $mail->Password = '#####'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('te-info@travelingeropapay.com', ''); // user email
        $mail->addReplyTo('', ''); //user email

        // Add a recipient
        $mail->addAddress($this->session->userdata('sendto')); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'SMTP Codeigniter'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "Halo " . $this->session->userdata('sendto') . " ini adalah email test dari traveling eropa. Pesanan anda dengan ID :" . $this->session->userdata('event') . " telah diproses"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        $this->session->unset_userdata('sendto');
        $this->session->unset_userdata('event');
        redirect(base_url('cmanagementpembayaran/mp'));
    }
}
