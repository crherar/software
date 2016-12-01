<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($email, $password){
		
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$resultado = $this->db->get("Usuario");
		if($resultado->num_rows()>0){
			return $resultado->row();
		}
		else{
			return false;
		}
	}
}
?>