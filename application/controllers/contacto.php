<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }
    public function index()
    {
        if ($this->session->iniciada) {//Si la sesion se encuentra iniciada autocompletamos el campo del mail
            $emailUser=$this->session->email;
        }
        if ($this->input->method() === 'post') {//Obtenemos los datos del email y mensaje al cual enviar el mail
            $email=$this->input->post("email");
            $asunto=$this->input->post("asunto");
            $mensaje=$this->input->post("mensaje");
        } else {
            if (isset($emailUser)) {
                $this->load->view("header", ["title"=>"Contacto"]);
                $this->load->view('inicio/contacto', ["email"=>$emailUser]);
                $this->load->view("footer");
            }else{
				$this->load->view("header", ["title"=>"Contacto"]);
                $this->load->view('inicio/contacto');
                $this->load->view("footer");
			}
        }
    }


    private function enviarMail($email, $asunto, $mensaje)
    {
        $this->load->library("PHPMailer");
        $mail = $this->phpmailer->load();
        $mail->From = "rea@not-reply.com";
        $mail->IsSMTP();
        $mail->CharSet="UTF-8";
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = 'santiago.navarro@est.fi.uncoma.edu.ar';
        $mail->Password = '38365920s';
        $mail->SMTPAuth = true;
        $mail->FromName = "Full Name";
        //To address and name
        $mail->addAddress($email);
        //$mail->addAddress("recepient1@example.com"); //Recipient name is optional

        //Address to which recipient will reply
        $mail->addReplyTo("santiago.navarro@est.fi.uncoma.edu.ar", "Reply");

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Subject Text";
        $mail->Body = "<i>Mail body in HTML</i>";
        $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent successfully";
        }
    }
}
