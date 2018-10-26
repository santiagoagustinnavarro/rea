<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioSesion extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("logeoProfesor",["title"=>"Prueba"]);
		$this->load->view("footer");
	}
	function index2(){
		$this->load->view("logeoAdminUsuario",["title"=>"Prueba"]);
		$this->load->view("footer");
	}
	function index3(){
		$this->load->view("logeoAdminRecurso",["title"=>"Prueba"]);
		$this->load->view("footer");
	}
}
?>
