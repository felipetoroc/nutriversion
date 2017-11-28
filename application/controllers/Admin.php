<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/head_view');
		$this->load->view('admin/baner_view');
		$this->load->view('admin/topbar_view');
		/*$this->load->view('admin/sidebar_view');*/
		$this->load->view('admin/principal_view');
		$this->load->view('admin/foot_view');
	}
	
	public function usuarios(){
		$this->load->model('comuna_model');
		$this->load->view('admin/head_view');
		$this->load->view('admin/baner_view');
		$this->load->view('admin/topbar_view');
		/*$this->load->view('admin/sidebar_view');*/
		$this->load->view('admin/mant_usuarios_view');
		$this->load->view('admin/foot_view');
	}
	
	public function usuarios_data(){
		  $this->load->model('admin/usuarios_model');
		  echo $this->usuarios_model->getUsers();
	}
	
	public function newEditUsuario($id_cliente=null){
		$this->load->model('admin/usuarios_model');
		$this->load->model('comuna_model');
		$data = array(
			'datos_usuario' => $this->usuarios_model->getUsersById($id_cliente),
			'regiones' => $this->comuna_model->obtener_region()
		);
		$this->load->view('admin/head_view');
		$this->load->view('admin/baner_view');
		$this->load->view('admin/topbar_view');
		/*$this->load->view('admin/sidebar_view');*/
		if ($id_cliente == null){
			$this->load->view('admin/nuevo_usuario_view',$data);
		}else{
			$this->load->view('admin/edit_usuario_view',$data);
		}

		$this->load->view('admin/foot_view');
	}
		
	public function editar_usuario(){
		$this->load->model('admin/usuarios_model');
		echo $this->usuarios_model->edit();
	}
	
	public function eliminar_usuario(){
		$id_cliente = $this->input->post('cliente_id');
		$this->load->model('admin/usuarios_model');
		echo $this->usuarios_model->delete($id_cliente);

	}
	
	public function provincia_data(){
		$this->load->model('comuna_model');
		echo json_encode($this->comuna_model->obtener_provincia());
	}
	public function comuna_data(){
		$this->load->model('comuna_model');
		echo json_encode($this->comuna_model->obtener_comuna());
	}

	public function registrar(){
		$fechainput = DateTime::createFromFormat('d/m/Y', $this->input->post('fechaNac'))->format('Y/m/d');
		$nombre = strtoupper($this->input->post('nombre'));
        $apellidop = strtoupper($this->input->post('apellidop'));
        $apellidom = strtoupper($this->input->post('apellidom'));
        $rut = $this->input->post('rut');
		$fechaNac = $fechainput;
		$email = $this->input->post('mail');
		$id_comuna = $this->input->post('id_comuna');
		$direccion = strtoupper($this->input->post('direccion'));
		$telefono = $this->input->post('telefono');
		$sexo = $this->input->post('sexo');
		$tipo = $this->input->post('tipo_usuario');
		$sucursal = $this->input->post('sucursal');
        $this->load->model('admin/usuarios_model');
        $resultado = $this->usuarios_model->newUser($nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion,$sexo,$tipo,$sucursal);
		if($resultado == 0)
		{
			redirect('index.php/admin/usuarios');
		}else{
			if($resultado == 1){
			    $this->session->set_flashdata('error','El Rut ingresado no es válido');
			    $this->nuevoUsuario();
			}else{
				if($resultado == 2){
					$this->session->set_flashdata('error','El Rut o el mail ingresado ya existe');
			    	$this->nuevoUsuario();
				}
			}
        }
    }
    public function editar(){
		$fechainput = DateTime::createFromFormat('d/m/Y', $this->input->post('fechaNac'))->format('Y/m/d');
		$id_cliente = $this->input->post('cliente_id');
		$nombre = strtoupper($this->input->post('nombre'));
        $apellidop = strtoupper($this->input->post('apellidop'));
        $apellidom = strtoupper($this->input->post('apellidom'));
        $rut = $this->input->post('rut');
		$fechaNac = $fechainput;
		$email = $this->input->post('mail');
		$id_comuna = $this->input->post('id_comuna');
		$direccion = strtoupper($this->input->post('direccion'));
		$telefono = $this->input->post('telefono');
		$sexo = $this->input->post('sexo');
		$tipo = $this->input->post('tipo_usuario');
		$sucursal = $this->input->post('sucursal');
        $this->load->model('admin/usuarios_model');
        $resultado = $this->usuarios_model->editUser($id_cliente,$nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion,$sexo,$tipo,$sucursal);
		if($resultado > 0)
		{
			redirect('admin/usuarios');
		}else{
			$this->session->set_flashdata('error','Ocurrio un error');
			$this->newEditUsuario($id_cliente);
		}
    }
}
?>