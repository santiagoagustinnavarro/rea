<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    function login(){
        $this->load->model('Usuario_model');
        $res=$this->Usuario_model->login();
        $this->load->view('testUsuario',["logeo"=>$res]);
    }
}




?>