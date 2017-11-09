<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function index()
	{
		$this->load->view('login/head_view');
		$this->load->view('login/baner_view');
		$this->load->view('login/topbar_view');
		$this->load->view('login/registro_view');
		$this->load->view('login/foot_view');
	}
	public function registrar()
	{
		$this->load->model('login/reg_model');
		if($this->reg_model->newUser() == 1)
		{
			redirect('Registro/usuario_creado');
			/*$this->email->from('admin@presupuesto.esy.es', 'NUTRILIFE');
			$this->email->to($this->input->post('mail')); 
			$this->email->cc('admin@presupuesto.esy.es'); 

			$this->email->subject('Correo de Prueba');
			$this->email->message('Probando la clase email');	

			$this->email->send();

			echo $this->email->print_debugger();*/
		}
	}
	public function usuario_creado()
	{
		$this->load->view('login/head_view');
		$this->load->view('login/baner_view');
		$this->load->view('login/topbar_view');
		$this->load->view('login/usuario_creado_view');
		$this->load->view('login/foot_view');
	}
	
}