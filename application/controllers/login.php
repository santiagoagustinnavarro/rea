<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->input->post('nombreUsuario') && $this->input->post('clave')) {
            $existe = $this->Usuario_model->get_usuario($this->input->post('nombreUsuario'), array("clave" => hash('sha224', $this->input->post('clave'))));
            if (!is_null($existe)) {
                $verEstado = $this->Tenerusuario_model->get_tenerusuario($this->input->post('nombreUsuario'));
                $verEstado["nombreEstadoUsuario"]=strtolower($verEstado["nombreEstadoUsuario"]);
                if ($verEstado["nombreEstadoUsuario"] != "alta") {
                    $mensaje = '<div class="alert alert-info text-center"><h4>'."El usuario se encuentra en estado ".$verEstado["nombreEstadoUsuario"].'</h4></div>';
                } else {

                    $this->cargarSession();
                    $this->load->view("header", ["title" => "Home"]);
                    $this->load->view('inicio/login');
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

    private function cargarSession()
    {
        session_start();
        $rol = $this->Tienerol_model->get_tienerol($this->input->post('nombreUsuario'));
        $permisos = array();
        $petPermisos = $this->Contienepermiso_model->get_all_contienepermiso(array("nombreRol" => $rol["nombreRol"]));
        foreach ($petPermisos as $permiso) {
            $permisos[] = strtolower($permiso["aliasPermiso"]);
        }
        $_SESSION['nombreUsuario'] = $this->input->post('nombreUsuario');
        $_SESSION['clave'] = $this->input->post('clave');
        $_SESSION['permisos'] = $permisos;
        $_SESSION['rol']=strtolower($rol['nombreRol']);
    ?>
    <script>alert(" <?php 
        echo $_SESSION['rol'];
    

?>")</script> <?php } }
?>
