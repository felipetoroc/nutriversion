<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dietas_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function leerProductos(){
		$query = $this->db->query("select * from producto");
		return $query;
	}
}
?>