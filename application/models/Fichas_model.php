<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $connection = mysqli_connect("localhost","root","", "cliniestetica");
// $connect = new mysqli("localhost", "root", "", "cliniestetica");

class Fichas_model extends CI_Model {

	function guardar($data){
		$this->db->insert("Paciente", $data);
	}
}
?>