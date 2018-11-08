<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    private $inciada;
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION["iniciada"])) {
            $_SESSION["iniciada"]=false;
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
        session_start();
        session_destroy();
        redirect('login');
    }

    private function cargarSession($user)
    {
        $_SESSION["iniciada"]=true;

        $rol = $this->Tienerol_model->get_tienerol($this->input->post('nombreUsuario'));
        $permisos = array();
        $petPermisos = $this->Contienepermiso_model->get_all_contienepermiso(array("nombreRol" => $rol["nombreRol"]));
        foreach ($petPermisos as $permiso) {
            $permisos[] = strtolower($permiso["aliasPermiso"]);
        }
        $_SESSION['nombre'] = $user["nombre"];
        $_SESSION['apellido'] = $user["apellido"];

        $_SESSION['dni'] = $user["dni"];

       

        $_SESSION['nombreUsuario'] = $this->input->post('nombreUsuario');
        $_SESSION['clave'] = $this->input->post('clave');
        $_SESSION['permisos'] = $permisos;
        $_SESSION['rol']=strtolower($rol['nombreRol']); ?>
<?php
    }
    /**
     * Esta funcion se encarga de generar el token y de reestablecer la clave
     */
    public function recuperarclave($nombreUsuario="", $idToken="")
    {
        if ($idToken=="") {//Caso en el que se ingresa sin token
            if ($nombreUsuario=="") {
                $this->load->view("header", array("title"=>"RestablecerClave"));
                $this->load->view("claveusuario");
                $this->load->view("footer");
            } else {
                $user=$this->Usuario_model->get_usuario($nombreUsuario);
                if ($user!=null) {//Si el usuario existe generamos el token
                    $this->generarToken($user);
                } else {
                    echo "El usuario no existe";
                }
            }
        } else {//Se ingreso con un token en caso de ser valido redirigimos para reestablecer la clave
            $verif=$this->verificarToken($idToken, $nombreUsuario);
            if ($verif) {
                $añadirEstado=$this->TenerEstadoToken_model->add_tenerestadotoken(array("nombreEstadoToken"=>"utilizado","idToken"=>$idToken));
                $this->load->view("header", array("title"=>"RestablecerClave"));
                $this->load->view("restablecerclave", array("idToken"=>$idToken,"nombreUsuario"=>$nombreUsuario));
                $this->load->view("footer");
            } else {
                echo "el token no existe wacho";
            }
        }
    }
    private function verificarToken($idToken, $nombreUsuario)
    {
        $tokenR=$this->TenerEstadoToken_model->get_tenerestadotoken($idToken, array("nombreUsuario"=>$nombreUsuario));
        if ($tokenR!=null) {
            if ($tokenR["nombreEstadoToken"]=="pendiente") {
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
        $datos=array("nombreUsuario"=>$user["nombreUsuario"],'idToken'=>$token);
        $insercion=false;
        while (!$insercion) {//While por si el numero generado de casualidad ya existe
            $insercion=$this->TokenRecupera_model->add_tokenrecupera($datos);
            if (!$insercion) {
                $datos["idToken"]=$datos["idToken"].rand(1, 999);
            }
        }
        unset($datos['nombreUsuario']);
        $datos['nombreEstadoToken']='pendiente';
        $insercionEstado=$this->TenerEstadoToken_model->add_tenerestadotoken($datos);
        $this->enviarMail($datos, $user);
    }
    private function enviarMail($datos, $user)
    {
        require 'sendgrid.env';
        require 'vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("rea@not-reply.com");
        $email->setSubject("Reestablecer clave");
        $email->addTo($user["email"]);
        $email->addContent("text/html", "Link de recuperacion de cuenta:".base_url()."/".$user["nombreUsuario"]."/".$datos["idToken"]);
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}
