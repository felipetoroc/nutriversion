<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comuna_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function obtener_region(){
		$query = $this->db->query("select * from region");
		return $query->result();
	}
	function obtener_provincia(){
		$query = $this->db->query("select * from provincia where provincia_region_id = ".$this->input->post('region_id'));
		return $query->result();
	}
	function obtener_comuna(){
		$query = $this->db->query("select * from comuna where comuna_provincia_id = ".$this->input->post('provincia_id'));
		return $query->result();
	}	
	function obtener_sucursales(){
		$query = $this->db->query("select * from sucursal");
		return $query->result();
	}
}
?>