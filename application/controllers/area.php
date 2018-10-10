<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Inicio"]);
		$this->load->view('inicio/area');
		$this->load->view("footer");
	}

}
?>
