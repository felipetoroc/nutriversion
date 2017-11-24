<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("id")){
			if($this->session->userdata("rut")){
				if($this->session->userdata("tipo_usuario") == "1"){
					redirect("Cliente");
				}else{
					if($this->session->userdata("tipo_usuario") == "2"){
						redirect("Clientepro");
					}
				}
			}
		}else{
			$this->load->view('login/head_view');
			$this->load->view('login/baner_view');
			$this->load->view('login/topbar_view');
			$this->load->view('login/inicio_view');
			$this->load->view('login/foot_view');
		}
	}

	public function iniciar(){
		if($this->input->post("rut")){
			if($this->input->post("pw")){
				if($this->input->post("tipo")){
					$rut = $this->input->post("rut");
					$pass = $this->input->post("pw");
					$tipo = $this->input->post("tipo");
					$this->load->model('login/login_model');
                    $resultado = $this->login_model->valida_usuario($rut,$pass,$tipo);
					if($resultado > 0){
						$id = $resultado;	
						$this->session->set_userdata("id",$id);
						$this->session->set_userdata("rut",$rut);
						$this->session->set_userdata("tipo_usuario",$tipo);
						if($this->session->userdata("tipo_usuario") <> "2"){
							$this->index();
						}else{
							echo "hola";
						}
					}else{
						$this->session->set_flashdata('error', 'Rut Incorrecto.');
						redirect("Login/index");
                    }
				}else{
					$this->session->set_flashdata('error', 'Debe selecciona tipo de usuario.');
					redirect("Login/index");
				}
			}else{
				$this->session->set_flashdata('error', 'Falta llenar el campo contraseña.');
				redirect("Login/index");	
			}
		}else{
			$this->session->set_flashdata('error', 'Falta llenar el campo rut.');
			redirect("Login/index");	
		}
	}
	public function cerrar(){
		if(null !== $this->session->userdata("rut")){
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