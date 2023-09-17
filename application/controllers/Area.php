<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Area"]);
		$this->load->view('inicio/area');
		$this->load->view("footer");
	}
	/** Esta funcion muestra el recurso que selecciona el usuario */
	function recurso(){
		$this->load->view("header",["title"=>"Recurso"]);
		$this->load->view('area/recurso');
		$this->load->view("footer");
	}
}
?>
