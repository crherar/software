<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fichas_model extends CI_Model {

	function guardar($data){
		$this->db->insert("Paciente", $data);
		if($this->db->affected_rows()>0){
			return true;
		}
		else {
			return false;
		}
	}

	function eliminar($valor){
		$this->db->where("rut", $valor);
		$this->db->delete("Paciente");
		if($this->db->affected_rows()>0){
			return true;
		}
		else {
			return false;
		}
	}

	function mostrar($valor){
		$this->db->like("rut", $valor);
		$consulta = $this->db->get("Paciente");
		return $consulta->result();
	}

	function actualizar($rut, $datos){
		$this->db->where("rut", $rut);
		$this->db->update("Paciente", $datos);
		if($this->db->affected_rows()>0){
			return true;
		}
		else {
			return false;
		}
	}
}
?>





