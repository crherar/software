<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $connection = mysqli_connect("localhost","root","", "cliniestetica");
// $connect = new mysqli("localhost", "root", "", "cliniestetica");

class Fichas_model extends CI_Model {

	function guardar($data){
		$this->db->insert("Paciente", $data);
	}

	function mostrar($valor){
		$this->db->like("rut", $valor);
		$consulta = $this->db->get("Paciente");
		return $consulta->result();
	}

	function eliminarficha($valor){
		$this->db->where("rut", $valor);
		$this->db->delete("Paciente");
		if($this->db->affected_rows()>0){
			return true;
		}
		else {
			return false;
		}
	}
}
?>