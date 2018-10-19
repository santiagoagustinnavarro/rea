<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->view("header",["title"=>"Login"]);
		$this->load->view('inicio/login.php');
		$this->load->view("footer");
	}
}
?>
