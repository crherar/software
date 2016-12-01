<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horasusuario_model extends CI_Model {

	//CONVERTIR
	// function guardar($data){
	// 	$this->db->insert("Paciente", $data);
	// 	if($this->db->affected_rows()>0){
	// 		return true;
	// 	}
	// 	else {
	// 		return false;
	// 	}
	// }

	function mostrarHorasDisponibles($valor){
		$this->db->like("especialidad", $valor);
		$consulta = $this->db->get("Hora_atencion");
		return $consulta->result();
	}

	function eliminarHoraDisponible($id){
		$this->db->where("id", $id);
		$this->db->delete("Hora_atencion");
		if($this->db->affected_rows()>0){
			return true;
		}
		else {
			return false;
		}
	}
}
?>





