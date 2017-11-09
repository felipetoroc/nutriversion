<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getUsers(){
		$query = $this->db->query("SELECT * FROM cliente left join comuna on cliente_comuna_id = comuna_id");
		$tabla = "";
		
		foreach($query->result_array() as $row )
		{
			$tabla.='{
			"cliente_id":"'.$row['cliente_id'].'",
			"cliente_nombre":"'.$row['cliente_nombre'].'",
			"cliente_apellido":"'.$row['cliente_apellido'].'",
			"cliente_fecha_nacimiento":"'.$row['cliente_fecha_nacimiento'].'",
			"cliente_comuna_id":"'.$row['cliente_comuna_id'].'",
			"COMUNA_NOMBRE":"'.$row['COMUNA_NOMBRE'].'",
			"cliente_direccion":"'.$row['cliente_direccion'].'",
			"cliente_usuario":"'.$row['cliente_usuario'].'",
			"cliente_email":"'.$row['cliente_email'].'",
			"cliente_celular":"'.$row['cliente_celular'].'",
			"cliente_telefono":"'.$row['cliente_telefono'].'",
			"cliente_tipo":"'.$row['cliente_tipo'].'"
			},';		
		}
		$tabla = substr($tabla,0, strlen($tabla) - 1);
	
		return   '{"data":['.$tabla.']}';	
	}
	function insert(){
	    $respuesta = "";
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$comuna = $this->input->post('comuna');
		$usuario = $this->input->post('usuario');
		$email = $this->input->post('email');
		$celular = $this->input->post('celular');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$tipo = $this->input->post('tipo');
		
		$query = $this->db->query("insert into cliente ( 
		cliente_nombre,
		cliente_apellido,
		cliente_fecha_nacimiento,
		cliente_comuna_id,
		cliente_usuario,
		cliente_email,
		cliente_celular,
		cliente_telefono,
		cliente_direccion,
		cliente_tipo )
		VALUES (
		'$nombre',
		'$apellido',
		'$fecha_nacimiento',
		'$comuna',
		'$usuario',
		'$email',
		'$celular',
		'$telefono',
		'$direccion',
		'$tipo')");
		return $query;
	}
	function edit(){
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$comuna = $this->input->post('comuna');
		$usuario = $this->input->post('usuario');
		$email = $this->input->post('email');
		$celular = $this->input->post('celular');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$tipo = $this->input->post('tipo');
		
		$query = $this->db->query("update cliente set 
		cliente_nombre = '$nombre',
		cliente_apellido = '$apellido',
		cliente_fecha_nacimiento = '$fecha_nacimiento',
		cliente_comuna_id = '$comuna',
		cliente_usuario = '$usuario',
		cliente_email = '$email',
		cliente_celular = '$celular',
		cliente_telefono = '$telefono',
		cliente_direccion = '$direccion',
		cliente_tipo = '$tipo'
		where cliente_id = '$id'");
	}
	
	function delete(){
	    $respuesta = "";
		$query = $this->db->query("delete from cliente where cliente_id = ".$this->input->post('cliente_id'));
		return $query;
	}
}
?>