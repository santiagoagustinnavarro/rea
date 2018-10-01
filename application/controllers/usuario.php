<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    function traerDatos(){
        $this->load->model('Usuario_model');
        $data['usuarios']=$this->Usuario_model->getData();
        $this->load->view('testUsuario',$data);
    }
}




?>