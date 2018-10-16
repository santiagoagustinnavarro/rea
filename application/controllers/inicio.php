<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Inicio","scripts"=>array("script.js"),"styles"=>array("portafolio.css")]);
		$this->load->view("home2");
		$this->load->view("footer");
	}

}
?>
