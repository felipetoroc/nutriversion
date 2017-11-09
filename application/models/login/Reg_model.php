<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_model extends CI_Model {

    var $cliente_nombre   = '';
    var $cliente_apellido = '';
	var $cliente_email = '';
	var $cliente_usuario = '';
	var $cliente_contrasena = '';
	var $cliente_tipo = '';
	var $objetivo = '';
	var $cliente_sexo = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function newUser()
    {
		$this->cliente_nombre = $this->input->post('nombre');
		$this->cliente_apellido =  $this->input->post('apellidos');
		$this->cliente_email = $this->input->post('mail');
		$this->cliente_tipo = 'common';
		$this->cliente_sexo = $this->input->post('sexo');
        $this->cliente_usuario =  $this->input->post('usuario');
		$this->cliente_contrasena = $this->encrypt->encode($this->input->post('pw'));
		$this->objetivo = $this->input->post('objetivo');
		$this->cliente_imagen_url= 'img/usuario.jpg';
        return $this->db->insert('cliente',$this);
    }
}
?>