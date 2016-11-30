<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modificarficha extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Fichas_model");
	
	}

	public function index()
	{
		$this->load->view('modificarficha');
	}

	public function mostrar(){
		$this->load->model("Fichas_model");
		if($this->input->is_ajax_request()){
			$buscar = $this->input->post("buscar");
			$devolverdatos = $this->Fichas_model->mostrar($buscar);
			echo json_encode($devolverdatos);
		}
		else {
			show_404();
		}
	}

	public function actualizar(){
		$this->load->model("Fichas_model");
		if($this->input->is_ajax_request()){

			$rut = $this->input->post("rut_sel");
			$direccion_new = $this->input->post("direccion_sel");
			$celular_new = $this->input->post("celular_sel");
			$email_new = $this->input->post("email_sel");
			$historial_new = $this->input->post("historial_sel");

			$datos = array(
				"direccion" => $direccion_new,
				"celular" => $celular_new,
				"email" => $email_new,
				"historial" => $historial_new
			);

			// echo "RUT:", $rut;
			// echo $datos["direccion"];
			// echo $datos["celular"];
			// echo $datos["email"];
			// echo $datos["historial"];

			if($this->Fichas_model->actualizar($rut, $datos)==true)
				echo "Datos actualizados correctamente.";
			else
				echo "Error, no se pudieron actualizar los datos.";
		}
		else {
			show_404();
		}
	}


	function eliminar(){

		$this->load->model("Fichas_model");
		
		if($this->input->is_ajax_request())
		{
			$rut = $this->input->post("valor");
			$datos = $this->Fichas_model->eliminar($rut);
			if($datos == true)
				echo "Datos eliminados correctamente.";
			else
				echo "Error, no se pudieron eliminar los datos.";
		}
		else {
			show_404();
		}
	}

}



?>