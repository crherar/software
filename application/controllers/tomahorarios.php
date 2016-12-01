<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tomahorarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model("Login_model");
	}


	public function index()
	{
		$this->load->view('tomahorarios');
	}

	function ingresar(){

		$this->load->model("Login_model");

		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$respuesta = $this->Login_model->login($email, $password);
	

		if($respuesta == true){
			
			
			// $data = [
			// 	"user" => $respuesta->id,
			// 	"login" => TRUE,
			// ];

			// $this->session->set_userdata($data);

		}
		else{
			echo "Error en logeo.";
		}
	}

}
?>