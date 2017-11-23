<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function index()
	{

		$this->load->model('login/reg_model');
		$this->load->model('comuna_model');
		$data = array(
			'objetivos' => $this->reg_model->getObjetivos(),
			'regiones' => $this->comuna_model->obtener_region()
		);
		$this->load->view('login/head_view');
		$this->load->view('login/baner_view');
		$this->load->view('login/topbar_view');
		$this->load->view('login/registro_view',$data);
		$this->load->view('login/foot_view');
	}
	public function registrar()
	{
		$nombre = strtoupper($this->input->post('nombre'));
        $apellidop = strtoupper($this->input->post('apellidop'));
        $apellidom = strtoupper($this->input->post('apellidom'));
        $rut = $this->input->post('rut');
		$fechaNac = $this->input->post('fechaNac');
		$email = $this->input->post('mail');
		$id_comuna = $this->input->post('id_comuna');
		$direccion = strtoupper($this->input->post('direccion'));
		$telefono = $this->input->post('telefono');
		$sexo = $this->input->post('sexo');
		$objetivo = $this->input->post('objetivo');
        $this->load->model('login/reg_model');
        $resultado = $this->reg_model->newUser($nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion,$sexo,$objetivo);
		if($resultado == 0)
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
			if($resultado == 1){
			    $this->session->set_flashdata('error','El Rut ingresado no es válido');
			    $this->index();
			}else{
				if($resultado == 2){
					$this->session->set_flashdata('error','El Rut o el mail ingresado ya existe');
			    	$this->index();
				}
			}
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

	public function provincia_data(){
		$this->load->model('comuna_model');
		echo json_encode($this->comuna_model->obtener_provincia());
	}
	public function comuna_data(){
		$this->load->model('comuna_model');
		echo json_encode($this->comuna_model->obtener_comuna());
	}
	
}