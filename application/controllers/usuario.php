<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    function login(){
        $this->load->model('Usuario_model');
        $usuarios=$this->Usuario_model->login();
        if(count($usuarios)>0){
            $this->load->view('testUsuario',["usuarios"=>$usuarios]);
        }

    }
    function registro(){
        $this->load->view('inicio/index');
        $this->load->view('inicio/register');
        
    }
}




?>