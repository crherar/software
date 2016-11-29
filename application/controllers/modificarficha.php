<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modificarficha extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
	}

	public function index()
	{
		$this->load->view('modificarficha');
	}

	public function mostrar(){
		if($this->input->is_ajax_request()){
			$buscar = $this->input->post("buscar");
			$datos = $this->Fichas_model->mostrar($buscar);
			echo json_encode($datos);
		}
		else{
			show_404();
		}


	}
}
?>