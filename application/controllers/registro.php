<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Registro"]);
		$this->load->view('inicio/registrarse');
		$this->load->view("footer");
	}

}
?>
