<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Inicio","styles"=>array("heroic-features.css")]);
		$this->load->view("home2");
		$this->load->view("footer");
	}

}
?>
