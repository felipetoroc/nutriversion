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
		$nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $rut = $this->input->post('rut');
		$fechaNac = $this->input->post('fechaNac');
		$email = $this->input->post('mail');
		$sexo = $this->input->post('sexo');
		$objetivo = $this->input->post('objetivo');
        $this->load->model('login/reg_model');
        $resultado = $this->reg_model->newUser($nombre,$apellidos,$rut,$fechaNac,$email,$sexo,$objetivo);
		if($resultado->esrut == 1)
		{
			$this->usuario_creado();
			/*$this->email->from('admin@presupuesto.esy.es', 'NUTRILIFE');
			$this->email->to($this->input->post('mail')); 
			$this->email->cc('admin@presupuesto.esy.es'); 

			$this->email->subject('Correo de Prueba');
			$this->email->message('Probando la clase email');	

			$this->email->send();

			echo $this->email->print_debugger();*/
		}else{
		    $this->session->set_flashdata('error','Rut no valido');
		    $this->index();
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