<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
    {
			parent::__construct();
            if(null == $this->session->userdata("usuario")){
				if(null == $this->session->userdata("admin")){
					redirect("Welcome");	
				}
			}
    }

	public function index()
	{
		$this->load->view('admin/head_view');
		$this->load->view('admin/baner_view');
		$this->load->view('admin/topbar_view');
		$this->load->view('admin/sidebar_view');
		$this->load->view('admin/principal_view');
		$this->load->view('admin/foot_view');
	}
	
	public function usuarios(){
		$this->load->model('comuna_model');
		$data["regiones"] = $this->comuna_model->obtener_region();
		$this->load->view('admin/head_view');
		$this->load->view('admin/baner_view');
		$this->load->view('admin/topbar_view');
		$this->load->view('admin/sidebar_view');
		$this->load->view('admin/mant_usuarios_view',$data);
		$this->load->view('admin/foot_view');
	}
	
	public function usuarios_data(){
		  $this->load->model('admin/usuarios_model');
		  echo $this->usuarios_model->getUsers();
	}
	
	public function insertar_usuario(){
		$this->load->model('admin/usuarios_model');
		echo $this->usuarios_model->insert();
	}
		
	public function editar_usuario(){
		$this->load->model('admin/usuarios_model');
		echo $this->usuarios_model->edit();
	}
	
	public function eliminar_usuario(){
		$this->load->model('admin/usuarios_model');
		echo $this->usuarios_model->delete();
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
?>