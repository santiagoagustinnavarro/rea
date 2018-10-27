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
                if ($verEstado["nombreEstadoUsuario"] != "alta") {
                    $mensaje = "El usuario se encuentra en estado " . $verEstado["nombreEstadoUsuario"];
                } else {

                    $this->cargarSession();
                    $this->load->view("header", ["title" => "Home"]);
                    $this->load->view('inicio/login');
                    $this->load->view("footer");

                }
            } else {
                $mensaje = "usuario o contraseña incorrectos";

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

        session_destroy();
        $this->load->view("header", ["title" => "Login"]);
        $this->load->view('inicio/login');
        $this->load->view("footer");

    }

    private function cargarSession()
    {

        $rol = $this->Tienerol_model->get_tienerol($this->input->post('nombreUsuario'));
        $permisos = array();
        $petPermisos = $this->Contienepermiso_model->get_all_contienepermiso(array("nombreRol" => $rol["nombreRol"]));
        foreach ($petPermisos as $permiso) {
            $permisos[] = $permiso["aliasPermiso"];
        }
        $_SESSION['nombreUsuario'] = $this->input->post('nombreUsuario');
        $_SESSION['clave'] = $this->input->post('clave');
        $_SESSION['permisos'] = $permisos;
        $_SESSION['iniciada'] = true;
    }
}
