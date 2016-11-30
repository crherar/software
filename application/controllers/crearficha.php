<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crearficha extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model("Fichas_model");
	}

	public function index(){
		$this->load->view('crearficha');
	}

	public function guardar(){
		
		if($this->input->is_ajax_request()){

			$this->load->model("Fichas_model");

			$rut = $this->input->post("rut");
			$nombre = $this->input->post("nombre");
			$apellido = $this->input->post("apellido");
			$fecha_nac = $this->input->post("fecha_nac");
			$direccion = $this->input->post("direccion");
			$celular = $this->input->post("celular");
			$email = $this->input->post("email");
			$historial = $this->input->post("historial");

			$datos = array("rut" => $rut,
				"nombre" => $nombre,
				"apellido" => $apellido,
				"fecha_nac" => $fecha_nac,
				"direccion" => $direccion,
				"celular" => $celular,
				"email" => $email,
				"historial" => $historial,
			);

			if($this->Fichas_model->guardar($datos)==true)
					echo "Datos guardados correctamente.";
			else 
					echo "Error, no se pudieron guardar los datos.";
		}
		else {
			show_404();
		}
	
	}
}
?>