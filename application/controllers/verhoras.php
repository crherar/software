<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verhoras extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Horasusuario_model");
	
	}

	public function index()
	{
		$this->load->view('verhoras');
	}


	public function mostrarHorasDisponibles(){

		$this->load->model("Horasusuario_model");

		if($this->input->is_ajax_request()){

			$buscar = $this->input->post("buscar_por_especialidad");
			$devolverdatos = $this->Horasusuario_model->mostrarHorasDisponibles($buscar);
			echo json_encode($devolverdatos);
		}
		else {
			show_404();
		}
	}

	function eliminarHora(){

		$this->load->model("Horasusuario_model");
		
		if($this->input->is_ajax_request())
		{
			$id = $this->input->post("valor");
			$datos = $this->Horasusuario_model->eliminarHoraDisponible($id);
			if($datos == true)
				echo "Hora de atención tomada.";
			else
				echo "Error, no se pudo tomar la hora de atención.";
		}
		else {
			show_404();
		}
	}
}


?>