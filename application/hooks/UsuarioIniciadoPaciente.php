<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 
class UsuarioIniciadoPaciente
{
	private $ci;
	private $controlador_no;
	private $metodo_ok;
	private $metodo_no;
	private $urlcorrecta;

	public function __construct()
	{
		$this->ci =& get_instance();
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
		if ($tipo_usuario == '1'){
			$this->controlador_no = ['welcome','login','clientepro','admin','registro'];
			$this->urlcorrecta = 'cliente';
		}
		if ($tipo_usuario == '2') {
			$this->controlador_no = ['welcome','login','cliente','admin','registro'];
			$this->urlcorrecta = 'clientepro';
		}
		if ($tipo_usuario == '3') {
			$this->controlador_no = ['welcome','login','cliente','clientepro','registro'];
			$this->urlcorrecta = 'admin';
		}
		if($session && in_array($class,$this->controlador_no))
		{
			if(!in_array($method,$this->metodo_ok)){
				redirect($this->urlcorrecta);
				
			}	
		}
		if($session && !in_array($class,$this->controlador_no))
		{
			if(in_array($method,$this->metodo_no)){
				redirect($this->urlcorrecta);
				
			}	
		}
	}
}
/*
/end hooks/home.php
*/