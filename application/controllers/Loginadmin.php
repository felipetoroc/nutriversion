<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginadmin extends CI_Controller {

	public function index()
	{
		$this->load->view('loginadmin/head_view');
		$this->load->view('loginadmin/principal_view');
		$this->load->view('loginadmin/foot_view');
	}
	public function iniciar(){
		if($this->input->post("usuario")){
			if($this->input->post("pw")){
					$usuario = $this->input->post("usuario");
					$pass = $this->input->post("pw");
					$tipo = "admin";
					$this->load->model('login/login_model');
                    			$resultado = $this->login_model->valida_usuario($usuario,$pass,$tipo);
					
					if($resultado > 0){
                        $this->session->set_userdata('id',$resultado);
						$this->session->set_userdata('usuario',$usuario);
						$this->session->set_userdata('admin',$tipo);
						redirect("Admin");
					}else{
						$this->session->set_flashdata('error', 'Usuario Incorrecto.');
						redirect("Loginadmin/index");
                        		}
			}else{
				$this->session->set_flashdata('error', 'Falta llenar el campo contraseña.');
				redirect("Loginadmin/index");	
			}
		}else{
			$this->session->set_flashdata('error', 'Falta llenar el campo usuario.');
			redirect("Loginadmin/index");	
		}
	}
	public function cerrar(){
		if(null !== $this->session->userdata("id")){
			$this->session->sess_destroy();
			redirect("welcome");
		}
	}
	public function ingresarmail(){
		$this->load->view('loginadmin/head_view');
		$this->load->view('loginadmin/ingresar_mail_view');
		$this->load->view('loginadmin/foot_view');
	}
	public function validar_mail(){
		$mail = $this->input->post('mail');
		$this->load->model('login/login_model');
		$resultado = $this->login_model->valida_mail($mail);
		if ($resultado == 1){
			$this->session->set_userdata('mail',$mail);
			redirect("Loginadmin/ingresarpass");
		}else{
			$this->session->set_flashdata('error', 'Mail no encontrado.');
			redirect("Loginadmin/ingresarmail");	
		}
	}
	public function ingresarpass(){
		$this->load->view('loginadmin/head_view');
		$this->load->view('loginadmin/ingresar_pass_view');
		$this->load->view('loginadmin/foot_view');
	}
	public function actualizar_pass(){
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		if ($pass1 == $pass2){
			$this->load->model('login/login_model');
			$resultado = $this->login_model->actualiza_pass($this->session->userdata('mail'),$pass1);
			if ($resultado == 1){
				redirect("Loginadmin/index");
			}else{
				$this->session->set_flashdata('error', 'Error de SQL');
				redirect("Loginadmin/ingresarpass");
			}
		}else{
			$this->session->set_flashdata('error', 'Las constraseñas no coinciden');
			redirect("Loginadmin/ingresarpass");
		}
		
		
	}
}