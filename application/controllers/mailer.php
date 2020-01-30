<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer extends CI_Controller
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
        // var_dump($the_mailer);
        // var_dump($this->session->userdata('email'));

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = $the_mailer['alamat']; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->Username = $the_mailer['email']; // user email
        $mail->Password = base64_decode($the_mailer['password']); // password email
        $mail->SMTPSecure = 'ssl';
        #$mail->SMTPSecure = 'tls';
        $mail->Port     = 465;
        #$mail->Port = 25;
        
        $mail->setFrom('te-info@travelingeropapay.com', ''); // user email

        $mail->From = "te-info@travelingeropapay.com";
        $mail->FromName = "Travelingeropa Info Pembayaran"; 
    
        // Add a recipient
        $mail->addAddress($this->session->userdata('email'));
        // Email subject
        $mail->Subject = 'Info Pembayaran Traveling Eropa'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        $mail->AddAttachment(base_url('assets/img/logo_block.png'), 'logo.png');

        $mail->AddEmbeddedImage('logo.png', 'logo', 'logo.png');

        // Email body content
        $mailContent = "<h2 align='middle'>Traveling Eropa</h2><br> 
            <img scr=\'cid:logo\' align='middle''/> 
            <br><br><br> Terimakasih " . $this->session->userdata('namapenyetor') . " telah memilih kami sebagai rekan perjalanan anda.
            Demi mempermudah dan menjamin keamanan data anda selama melakukan setor bukti pembayaran, anda dapat mengakses <a href='travelingeropapay.com'>travelingeropapay.com</a> dengan memasukan data sebagai berikut : <br><br>
                        Email Terdaftar<ensp>: <b>" . $this->session->userdata('email') . "</b><br>
                        Nama Penyetor terdaftar<ensp>: <b>" . $this->session->userdata('namapenyetor') . "</b><br>
                        Tanggal lahir<ensp>: <b>" . $this->session->userdata('ttlpenyetor') . "</b><br>
                        No. HP terdaftar<ensp>: <b>" . $this->session->userdata('hppenyetor') . "</b><br>
            <br>kemudian silahkan mengikuti petunjuk pada website kami</b>. Bila anda membutuhkan bantuan lebih lanjut, silahkan hubungi customer service kami
            <br>
            <br>
            <i>Best Regard,
            <br>
            Travelingeropa<br>
            Your Best Travel Partner</i>";

        $mail->Body = $mailContent;
        // var_dump( $this->session->userdata());

        // Send email
        if (!$mail->send()) {
            $this->session->unset_userdata('sendto');
            $this->session->unset_userdata('namapenyetor');
            $this->session->unset_userdata('ttlpenyetor');
            $this->session->unset_userdata('hppenyetor');
            $this->session->unset_userdata('notif');
            $this->session->set_userdata('stat', 'gagalkirimemail');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role = "alert">Mail Error :' . $mail->ErrorInfo . '<br>1. Cek kembali pengatran mailer<br>2. pastikan hanya 1 mailer pada tabel admin</div>');
            // echo '   haaaiiii    ';
            // echo $mail->ErrorInfo;
            redirect(base_url('cindex'));
        } else {
            $this->session->unset_userdata('notif');
            redirect(base_url('cindex/addpjtodb'));
        }
    }
}
