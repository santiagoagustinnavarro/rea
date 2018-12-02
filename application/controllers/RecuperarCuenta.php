<?php
class RecuperarCuenta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    /**
     * Esta funcion se encarga de generar el token correspondiente al usuario y enviar el enlace de recuperacion
     */
    public function index()
    {
        if ($this->input->method() === 'get') {//Verificamos que el metodo por el que se envia sea get
            $nombreUsuario=$this->input->get('nombreUsuario');
            if (!$nombreUsuario) {//Si no ingresaron nombreusuario cargamos la vista para su ingreso
                $this->load->view("header", array("title"=>"RestablecerClave"));
                $this->load->view("logeo/recuperarcuenta/ingresarusuario");
                $this->load->view("footer");
            } else {//Fue ingresado el nombre de usuario generamos el token para enviar el mail
                $user=$this->Usuario_model->get_usuario($nombreUsuario);
                if ($user!=null) {//Si el usuario existe generamos el token
                    $token= $this->generarToken($user);
                    $mensaje="<h1>Recuperacion de cuenta</h1><br/><a href=\"".base_url()."logeo/recuperarcuenta/actualizarclave/".$nombreUsuario."/".$token."\">Click aqui para cambiar su clave</a>";
                    $envio= $this->enviarMail($user["email"], "Recuperacion de usuario", $mensaje);
                    if ($envio) {
                        $this->load->view("header", array("title"=>"Mail enviado"));
                        $this->load->view("logeo/recuperarcuenta/ingresarusuario", array("mensaje"=>'<div class="alert alert-success text-center"><h4>'."Se ah enviado un enlace de recuperacion a su correo".'</h4></div>'));
                        $this->load->view("footer");
                    }
                } else {
                    $this->load->view("header", array("title"=>"RestablecerClave"));
                    $this->load->view("logeo/recuperarcuenta/ingresarusuario", ["mensaje"=>'<div class="alert alert-danger text-center"><h4>'."No existe el usuario".'</h4></div>']);
                    $this->load->view("footer");
                }
            }
        }
    }


    public function actualizarClave($nombreUsuario="", $token="")
    {
        if ($nombreUsuario!="" && $token!="") {
            if ($this->verificarToken($token, $nombreUsuario)) {
                if ($this->input->method()==="post") {
                    $clave=$this->input->post("clave");
                    $confirmarClave=$this->input->post("clave2");
                    if ($clave==$confirmarClave) {
                        $this->Usuario_model->update_usuario($nombreUsuario, array("clave"=>hash('sha224', $clave)));
                        $this->TenerEstadoToken_model->update_tenerestadotoken(array("fechaFin"=>date("Y-m-d")), array("fechaFin"=>null));
                        $this->TenerEstadoToken_model->add_tenerestadotoken(array("nombreEstadoToken"=>"utilizado","nroToken"=>$token,"fechaInicio"=>date("Y-m-d"),"hora"=>date("H:i:s")));
                        $this->load->view("header", array("title"=>"Clave actualizada"));
                        $this->load->view("logeo/recuperarcuenta/cambiarclave", ["nroToken"=>$token,"mensaje"=>'<div class="alert alert-success text-center"><h4>'."Clave actualizada con exito".'</h4></div>',"nombreUsuario"=>$nombreUsuario]);
                        $this->load->view("footer");
                    }else{
                        $this->load->view("header", array("title"=>"Clave actualizada"));
                        $this->load->view("logeo/recuperarcuenta/cambiarclave", ["nroToken"=>$token,"mensaje"=>'<div class="alert alert-warning text-center"><h4>'."Las claves no coinciden".'</h4></div>',"nombreUsuario"=>$nombreUsuario]);
                        $this->load->view("footer");
                    }
                } else {
                    $this->load->view("header", array("title"=>"Clave actualizada"));
                    $this->load->view("logeo/recuperarcuenta/cambiarclave");
                    $this->load->view("footer");
                }
            } else {
                $this->load->view("header", array("title"=>"Clave actualizada"));
                $this->load->view("logeo/recuperarcuenta/cambiarclave", ["mensaje"=>'<div class="alert alert-warning text-center"><h4>'."Vuelva a solicitar la recuperacion de la cuenta".'</h4></div>',"nroToken"=>$token,"nombreUsuario"=>$nombreUsuario]);
                $this->load->view("footer");
            }
        }
    }

    //////////////////////////////Comienzo de funciones auxiliares//////////////////////////////////////


    /**
     * Funcion auxiliar encargada de verificar que el token sea valido y pertenezca al usuario en cuestion
     * @param string $nroToken
     * @param string $nombreUsuario
     * @return boolean
     */
    private function verificarToken($nroToken, $nombreUsuario)
    {
        $token=$this->TokenRecupera_model->get_tokenrecupera($nroToken, array("nombreUsuario"=>$nombreUsuario));
        $tokenR=$this->TenerEstadoToken_model->get_tenerestadotoken($nroToken);
        if ($token!=null) {
            if ($tokenR["nombreEstadoToken"]=="pendiente" && $tokenR["fechaFin"]==null) {
                $res=true;
            } else {
                $res=false;
            }
        } else {
            $res=false;
        }
        return $res;
    }

    /**
     * Funcion auxiliar encargada de generar el token de forma aleatoria e invoca a la funcion de envio del mail
     * @param stdClass $user
     * @return string
     */
    private function generarToken($user)
    {
        //Verificamos que el token se haya podido insertar sino generamos una cadena nueva
        do {
            $token=rand(1, 9999).sha1($user["nombreUsuario"]);
            $datos=array("nombreUsuario"=>$user["nombreUsuario"],"nroToken"=>$token);
            $insercion=$this->TokenRecupera_model->add_tokenrecupera($datos);
        } while (!$insercion);
        $datosEstado=array("nroToken"=>$token,"nombreEstadoToken"=>"pendiente","fechaInicio"=>date("Y-m-d"),"hora"=>date("H:i:s"));
        $this->TenerEstadoToken_model->add_tenerestadotoken($datosEstado);
        return $token;
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

        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->AltBody = $mensaje;

        if (!$mail->send()) {
            
           // echo "Mailer Error: " . $mail->ErrorInfo;
            $envio=false;
        } else {
            
          $envio=true;
        }
        return $envio;
    }
}
