<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 
class UsuarioIniciadoProfesional
{
	private $ci;
	private $controlador_no;
	private $metodo_ok;
	private $metodo_no;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->controlador_no = ['welcome','login','cliente'];
		$this->metodo_ok = ['cerrar'];
		$this->metodo_no = ['iniciar'];
		$this->ci->load->helper('url');
		
	}	

	public function verificarAcceso()
	{
		$class = $this->ci->router->class;
		$method = $this->ci->router->method;
		$session = $this->ci->session->userdata('id');
		$tipo_usuario = $this->ci->session->userdata('tipo_usuario');
		if($session && in_array($class,$this->controlador_no))
		{
			if(!in_array($method,$this->metodo_ok)){
				redirect('clientepro');
				
			}	
		}
		if($session && !in_array($class,$this->controlador_no))
		{
			if(in_array($method,$this->metodo_no)){
				redirect('clientepro');
				
			}	
		}
	}
}
/*
/end hooks/home.php
*/