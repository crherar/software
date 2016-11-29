<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eliminarficha extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model("Fichas_model");
	
	}

	public function index()
	{
		$this->load->view('eliminarficha');
	}

	public function eliminar(){
		$this->load->database();
		$this->load->model("Fichas_model");
		$valor = $this->input->post("rut");
		if($this->Fichas_model->eliminarficha($valor)==true)
		{
			echo "Registro Eliminado.";
		}
		else{
			echo "No se pudieron eliminar los datos.";
		}
	}


}
?>