<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Inicio de prueba","scripts"=>array("script.js")]);
		$this->load->view("inicio/index");
		$this->load->view("footer");
	}
	function index2(){
		$this->load->view("header",["title"=>"Inicio","scripts"=>array("script.js")]);
		$this->load->view("home2");
		$this->load->view("footer");
	}
	function index3(){
		$this->load->view("header",["title"=>"Inicio","scripts"=>array("script.js")]);
		$this->load->view("home3");
		$this->load->view("footer");
	}

}
?>
