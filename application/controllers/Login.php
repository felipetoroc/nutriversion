<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login/head_view');
		$this->load->view('login/baner_view');
		$this->load->view('login/topbar_view');
		$this->load->view('login/inicio_view');
		$this->load->view('login/foot_view');
	}

	public function iniciar(){
		if($this->input->post("rut")){
			if($this->input->post("pw")){
				$rut = $this->input->post("rut");
				$pass = $this->input->post("pw");
				$this->load->model('login/login_model');
                $row = $this->login_model->valida_usuario($rut,$pass);
				if(isset($row->cliente_id)){
					if($row->cliente_tipo == 4){
						$this->session->set_flashdata('error','Este usuario fue eliminado. Contacte al administrador');
						$this->index();
					}else{
						$this->session->set_userdata('id',$row->cliente_id);
		                $this->session->set_userdata('rut',$row->cliente_rut);
		                $this->session->set_userdata('nombre',$row->cliente_nombre);
		                $this->session->set_userdata('apellido',$row->cliente_apellido);
		                $this->session->set_userdata('fechaNac',$row->cliente_fecha_nacimiento);
		                $this->session->set_userdata('comuna_id',$row->cliente_comuna_id);
		                $this->session->set_userdata('email',$row->cliente_email);
		                $this->session->set_userdata('telefono',$row->cliente_telefono);
		                $this->session->set_userdata('direccion',$row->cliente_direccion);
		                $this->session->set_userdata('imagen_url',$row->cliente_imagen_url);
		                $this->session->set_userdata('tipo_usuario',$row->cliente_tipo);
		                $this->session->set_userdata('sexo',$row->cliente_sexo);
		                $this->session->set_userdata('comuna_nombre',$row->COMUNA_NOMBRE);
		                $this->session->set_userdata('region_nombre',$row->REGION_NOMBRE);
		                $this->session->set_userdata('provincia_nombre',$row->PROVINCIA_NOMBRE);
			            redirect('welcome');
			        }
				}else{
					if($row == 0){
						$this->session->set_flashdata('error', 'El rut ingresado no existe.');
						$this->index();
					}else{
						if($row == 1){
							$this->session->set_flashdata('error', 'Contraseña incorrecta. Intentelo Nuevamente.');
							$this->index();
						}
					}
                }
			}else{
				$this->session->set_flashdata('error', 'Falta llenar el campo contraseña.');
				$this->index();	
			}
		}else{
			$this->session->set_flashdata('error', 'Falta llenar el campo rut.');
			$this->index();	
		}
	}
	public function cerrar(){
		if(null !== $this->session->userdata("rut")){
			$this->load->model('login/login_model');
            $this->login_model->cerrarSesion($this->session->userdata("id"));
			$this->session->sess_destroy();
			redirect("welcome");
		}
	}
	public function ingresarmail(){
		$this->load->view('login/head_view');
		$this->load->view('login/ingresar_mail_view');
		$this->load->view('login/foot_view');
	}

	public function validar_mail(){
		$mail = $this->input->post('mail');
		$this->load->model('login/login_model');
		$resultado = $this->login_model->valida_mail($mail);
		if ($resultado == 1){
			$this->session->set_userdata('mail',$mail);
			redirect("login/ingresarpass");
		}else{
			$this->session->set_flashdata('error', 'Mail no encontrado.');
			redirect("login/ingresarmail");	
		}
	}

	public function ingresarpass(){
		$this->load->view('login/head_view');
		$this->load->view('login/ingresar_pass_view');
		$this->load->view('login/foot_view');
	}

	public function actualizar_pass(){
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		if ($pass1 == $pass2){
			$this->load->model('login/login_model');
			$resultado = $this->login_model->actualiza_pass($this->session->userdata('mail'),$pass1);
			if ($resultado == 1){
				redirect("login/index");
			}else{
				$this->session->set_flashdata('error', 'Error de SQL');
				redirect("login/ingresarpass");
			}
		}else{
			$this->session->set_flashdata('error', 'Las constraseñas no coinciden');
			redirect("login/ingresarpass");
		}		
	}
}