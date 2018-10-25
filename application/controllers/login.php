<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		if($this->input->post('nombreUsuario') && $this->input->post('clave')){
			$existe=$this->Usuario_model->get_usuario($this->input->post('nombreUsuario'),array("clave"=>hash('sha224',$this->input->post('clave'))));
			if(!is_null($existe)){
				$verEstado=$this->Tenerusuario_model->get_tenerusuario($this->input->post('nombreUsuario'));
				if($verEstado["nombreEstadoUsuario"]!="alta"){
					$mensaje ="El usuario se encuentra en estado ".$verEstado["nombreEstadoUsuario"];
				}else{
					
					$_SESSION['nombreUsuario']=$existe["nombreUsuario"];
					$_SESSION['nombreUsuario']=$existe["nombreUsuario"];
					$_SESSION['clave']=$this->input->post('clave');
					//redirect('inicio');
				}
			}else{
				$mensaje="usuario o contraseña incorrectos";
				
			}
		}else{
		$this->load->view("header",["title"=>"Login"]);
		$this->load->view('inicio/login.php');
		$this->load->view("footer");
	}
	if(isset($mensaje)){
		$this->load->view("header",["title"=>"Login"]);
		$this->load->view('inicio/login.php',["mensaje"=>$mensaje]);
		$this->load->view("footer");
	}
	}
}
?>
