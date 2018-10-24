<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		if($this->input->post('nombreUsuario') && $this->input->post('clave')){
			$existe=$this->Usuario_model->get_usuario($this->input->post('nombreUsuario'),array("clave"=>$this->input->post('clave')));
			if(count($existe)>0){
				$verEstado=$this->Tenerusuario_model->get_tenerestado();
			}else{

			}
		}else{
		$this->load->view("header",["title"=>"Login"]);
		$this->load->view('inicio/login.php');
		$this->load->view("footer");
	}
	}
}
?>
