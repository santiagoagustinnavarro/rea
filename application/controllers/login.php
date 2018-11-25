<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
           parent::__construct();

        $this->load->library('session');

     
       

        if (!isset($this->session->iniciada)) {
            $this->session->set_userdata(['iniciada'=>false]);
           
        }
    }
    public function index()
    {
        if ($this->input->post('nombreUsuario') && $this->input->post('clave')) {
            $existe = $this->Usuario_model->get_usuario($this->input->post('nombreUsuario'), array("clave" => hash('sha224', $this->input->post('clave'))));
            if (!is_null($existe)) {
                $verEstado = $this->TenerEstadoUsuario_model->get_tenerEstadoUsuario($this->input->post('nombreUsuario'));
                $verEstado["nombreEstadoUsuario"]=strtolower($verEstado["nombreEstadoUsuario"]);
                if ($verEstado["nombreEstadoUsuario"] != "alta") {
                    $mensaje = '<div class="alert alert-info text-center"><h4>'."El usuario se encuentra en estado ".$verEstado["nombreEstadoUsuario"].'</h4></div>';
                } else {
                    $this->cargarSession($existe);
                    $this->load->view("header", ["title" => "Home"]);
                    $this->load->view('home3');
                    $this->load->view("footer");
                }
            } else {
                $mensaje = '<div class="alert alert-danger text-center"><h4>'."Usuario o Contraseña incorrectos".'</h4></div>';
            }
        } else {
            $this->load->view("header", ["title" => "Login"]);
            $this->load->view('inicio/login');
            $this->load->view("footer");
        }
        if (isset($mensaje)) {
            $this->load->view("header", ["title" => "Login"]);
            $this->load->view('inicio/login', ["mensaje" => $mensaje]);
            $this->load->view("footer");
        }
    }
    public function cerrarSession()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    private function cargarSession($user)
    {
        
        $rol = $this->Tienerol_model->get_tienerol($this->input->post('nombreUsuario'));
        $permisos = array();
        $petPermisos = $this->Contienepermiso_model->get_all_contienepermiso(array("nombreRol" => $rol["nombreRol"]));
        foreach ($petPermisos as $permiso) {
            $permisos[] = strtolower($permiso["aliasPermiso"]);
        }
        $datos=array(
        'nombre'=>$user["nombre"],
        'apellido'=> $user["apellido"],
        'dni'=>$user["dni"],
        'email'=> $user["email"],
        'domicilio'=> $user["domicilio"],
        'nombreUsuario'=>$this->input->post('nombreUsuario'),
        'clave'=>$this->input->post('clave'),
        'permisos'=>$permisos,
        'rol'=>strtolower($rol['nombreRol']),
        'iniciada'=>true
        );
         $this->session->set_userdata($datos);
         ?>
<?php
    }
    /**
     * Esta funcion se encarga de generar el token y de reestablecer la clave
     */
    public function recuperarclave($nombreUsuario="", $nroToken="")
    {
        if ($nroToken=="") {//Caso en el que se ingresa sin token
            if ($nombreUsuario=="") {//Obtenido de la url
                $nombreUsuario=$this->input->get('nombreUsuario');
                if ($nombreUsuario=="") {//Obtenemos el del input
                    $this->load->view("header", array("title"=>"RestablecerClave"));
                    $this->load->view("claveusuario");
                    $this->load->view("footer");
                } else {
                    $user=$this->Usuario_model->get_usuario($nombreUsuario);
                    if ($user!=null) {//Si el usuario existe generamos el token
                        $envio= $this->generarToken($user);
                    } else {
                        $this->load->view("header", array("title"=>"RestablecerClave"));
                    $this->load->view("claveusuario",["mensaje"=>'<div class="alert alert-danger text-center"><h4>'."No existe el usuario".'</h4></div>']);
                    $this->load->view("footer");
                    }
                }
            } else {
                $user=$this->Usuario_model->get_usuario($nombreUsuario);
                if ($user!=null) {//Si el usuario existe generamos el token
                    $this->generarToken($user);
                } else {
                    echo "El usuario no existe";
                }
            }
        } else {//Se ingreso con un token en caso de ser valido redirigimos para reestablecer la clave
           

            $verif=$this->verificarToken($nroToken, $nombreUsuario);
            if ($verif) {
                $this->load->view("header", array("title"=>"RestablecerClave"));
                $this->load->view("restablecerclave", array("nombreUsuario"=>$nombreUsuario,"nroToken"=>$nroToken));
                $this->load->view("footer");
            } else {
                $this->load->view("header", array("title"=>"RestablecerClave"));
                $this->load->view("claveusuario", array("mensaje"=>'<div class="alert alert-warning text-center"><h4>'."El token es invalido".'</h4></div>'));
                $this->load->view("footer");
            }
        }
    }
   private function verificarToken($nroToken, $nombreUsuario)
    {   $token=$this->TokenRecupera_model->get_tokenrecupera($nroToken,array("nombreUsuario"=>$nombreUsuario));
        $tokenR=$this->TenerEstadoToken_model->get_tenerestadotoken($nroToken);
        if ($tokenR!=null && $token!=null) {
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
    
    private function generarToken($user)
    {
        $token=rand(1, 9999).sha1($user["nombreUsuario"]);
        $datos=array("nombreUsuario"=>$user["nombreUsuario"],'nroToken'=>$token);
        $insercion=$this->TokenRecupera_model->add_tokenrecupera($datos);
        /*while ($insercion<=0) {//While por si el numero generado de casualidad ya existe


            $datos["nroToken"]=$datos["nroToken"].rand(1, 999);
            $insercion=$this->TokenRecupera_model->add_tokenrecupera($datos);
        }*/
        
        $datos["nroToken"]=$token;
        unset($datos['nombreUsuario']);
        $datos['nombreEstadoToken']='pendiente';
        $datos["fechaInicio"]=date("Y-m-d");
        $datos["hora"]=date("H:i:s");
        $insercionEstado=$this->TenerEstadoToken_model->add_tenerestadotoken($datos);
        $envio= $this->enviarMail($datos, $user);
        if($envio){
            $this->load->view("header", array("title"=>"Mail enviado"));
                $this->load->view("claveusuario", array("mensaje"=>'<div class="alert alert-success text-center"><h4>'."Se ah enviado un enlace de recuperacion a su correo".'</h4></div>'));
                $this->load->view("footer");

        }
    }
    private function enviarMail($datos, $user)
    {
        /*  $this->load->library('email');
          $this->email->from('santiago.navarro@est.fi.uncoma.edu.ar', 'You');
          $this->email->to($user["email"]);
          echo $user["email"];
          $this->email->subject('My first email by Mailjet');
          $this->email->message("Link de validacion de la cuenta <a href=".base_url()."login/recuperarclave/".$user["nombreUsuario"]."/".$datos["idToken"].">".base_url()."login/recuperarclave/".$user["nombreUsuario"]."/".$datos["idToken"]."</a>");
          $envio=$this->email->send();
          if ($envio) {
              $res=true;
              echo "hola";
          } else {
              $res=false;
              echo ":(";
          }
          return $res;
          */
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = "\"D:\\xampp\\sendmail\\sendmail.exe\" -t";
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $this->email->initialize($config);
        $this->email->from('reanotreply@gmail.com', 'Programacionnet');
        $this->email->subject('Test Email (TEXT)');
        $this->email->to($user["email"]);
        $this->email->message('Codigo de recuperacion '.base_url()."login/recuperarclave/".$user['nombreUsuario']."/".$datos['nroToken']);
        if ($this->email->send()) {

            $res=true;
        } else {
            $res=false;
        }

        /*$dotenv = new \Dotenv\Dotenv("sendgrid");//Libreria necesaria para las variables contenidas en el archivo sendgrid.env
        $dotenv->load();
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("rea@not-reply.com");
        $email->setSubject("Reestablecer clave");
        $email->addTo($user["email"]);
        $key=getenv('SENDGRID_API_KEY');
        echo $key;
        $email->addContent("text/html", "Link de recuperacion de cuenta:".base_url()."login/recuperarclave/".$user["nombreUsuario"]."/".$datos["nroToken"]);
        $sendgrid = new \SendGrid($key);
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
           }*/
           return $res;
    }
}
