<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library("session");
	}
	function index(){
		$this->load->model("Valoracion_model");
		$destacados=$this->Valoracion_model->ranking();
		$this->load->view("header",["title"=>"Inicio"]);
		$this->load->view("inicio/home",["ranking"=>$destacados]);
		$this->load->view("footer");
		

	}
}
?>
