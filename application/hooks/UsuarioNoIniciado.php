<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 
class UsuarioNoIniciado
{
	private $ci;
	private $controlador_ok;
	private $metodo_ok;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->controlador_ok = ['welcome','login','registro','loginadmin'];
		$this->metodo_ok = ['iniciar','registrar','enviarMail'];
		$this->metodo_no = ['cerrar'];
		$this->ci->load->helper('url');
		
	}	

	public function verificarAcceso()
	{
		$class = $this->ci->router->class;
		$method = $this->ci->router->method;
		$session = $this->ci->session->userdata('id');

		if(empty($session) && !in_array($class,$this->controlador_ok)){
			if(!in_array($method,$this->metodo_ok)){
				redirect('login');
			}
		}
		if(empty($session) && in_array($class,$this->controlador_ok)){
			if(in_array($method,$this->metodo_no)){
				redirect('login');
			}
		}

		
	}
}
/*
/end hooks/home.php
*/