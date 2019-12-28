<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mailer extends CI_Controller {

	public function __construct() { 
                parent::__construct(); 
                
                require APPPATH.'libraries/phpmailer/src/Exception.php';
                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
                require APPPATH.'libraries/phpmailer/src/SMTP.php';
                 
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
                    $mail->Username = 'te-info@travelingeropapay.com'; // user email
                    $mail->Password = 'DekM)h4_G)!W'; // password email
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;
            
                    $mail->setFrom('te-info@travelingeropapay.com', ''); // user email
                    $mail->addReplyTo('', ''); //user email
            
                    // Add a recipient
                    $mail->addAddress('rio.elmaestro@gmail.com'); //email tujuan pengiriman email
            
                    // Email subject
                    $mail->Subject = 'SMTP Codeigniter'; //subject email
            
                    // Set email format to HTML
                    $mail->isHTML(true);
            
                    // Email body content
                    $mailContent = "&lt;h1>tes aja&lt;/h1>
                        &lt;p>Laporan email SMTP Codeigniter.&lt;/p>"; // isi email
                    $mail->Body = $mailContent;
            
                    // Send email
                    if(!$mail->send()){
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                        echo 'Message has been sent';
                    }
                }

}

