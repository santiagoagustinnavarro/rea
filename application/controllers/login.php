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
                $verEstado = $this->Tenerusuario_model->get_tenerusuario($this->input->post('nombreUsuario'));
                $verEstado["nombreEstadoUsuario"]=strtolower($verEstado["nombreEstadoUsuario"]);
                if ($verEstado["nombreEstadoUsuario"] != "alta") {
                    $mensaje = "El usuario se encuentra en estado " . $verEstado["nombreEstadoUsuario"];
                    $_SESSION["iniciada"]=false;
                } else {
                    $this->cargarSession();
                    $this->load->view("header", ["title" => "Home"]);
                    $this->load->view('inicio/login');
                    $this->load->view("footer");
                }
            } else {
                $mensaje = "Usuario o Contraseña incorrectos";
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

    private function cargarSession()
    {
        $_SESSION["iniciada"]=true;

        $rol = $this->Tienerol_model->get_tienerol($this->input->post('nombreUsuario'));
        $permisos = array();
        $petPermisos = $this->Contienepermiso_model->get_all_contienepermiso(array("nombreRol" => $rol["nombreRol"]));
        foreach ($petPermisos as $permiso) {
            $permisos[] = strtolower($permiso["aliasPermiso"]);
        }
        $_SESSION['nombreUsuario'] = $this->input->post('nombreUsuario');
        $_SESSION['clave'] = $this->input->post('clave');
        $_SESSION['permisos'] = $permisos;
        $_SESSION['rol']=strtolower($rol['nombreRol']); ?>
<?php
    }
}
