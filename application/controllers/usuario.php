<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    function login(){
        $this->load->model('Usuario_model');
        $usuario=$this->Usuario_model->login();
        $this->load->view('header',["title"=>"testUsuario"]);
        $this->load->view('inicio/index');
        $this->load->view('testUsuario',["estado"=>$usuario->nombre,"usuario"=>$usuario->nombreUsuario]);
        $this->load->view('footer');
        //Recordamos que en la línea 10 el atributo nombre hace referencia al nombre del estado

    }
    function registro(){
        $this->load->model('Usuario_model');
        $usuario=$this->Usuario_model->registro();
        $this->load->view('header',["title"=>"testUsuario2"]);
        $this->load->view('inicio/index');
        $this->load->view('testUsuario2',["resultado"=>$usuario]);
        $this->load->view('footer');

    }
    
}




?>