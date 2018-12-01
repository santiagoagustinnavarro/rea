<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		

		parent::__construct();
		$this->load->library("session");

	}
	function index(){
		$this->load->view("header",["title"=>"Inicio","scripts"=>array("script.js")]);
		$this->load->view("home3");
		$this->load->view("footer");
	}
}
?>
