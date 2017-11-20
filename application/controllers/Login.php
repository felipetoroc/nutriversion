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

		if($this->input->post("usuario")){

			if($this->input->post("pw")){

				if($this->input->post("tipo")){

					$usuario = $this->input->post("usuario");

					$pass = $this->input->post("pw");

					$tipo = $this->input->post("tipo");

					$this->load->model('login/login_model');

                    $resultado = $this->login_model->valida_usuario($usuario,$pass,$tipo);
					if($resultado > 0){
						$id = $resultado;
						
						$this->session->set_userdata('id',$id);
						if($tipo == "1"){

							$this->session->set_userdata('usuario',$usuario);

							$this->session->set_userdata('common',$tipo);

							redirect("Cliente");

						}

						if ($tipo == "2"){

							$this->session->set_userdata('usuario',$usuario);

							$this->session->set_userdata('pro',$tipo);

							redirect("Clientepro");

						}

					}else{

						$this->session->set_flashdata('error', 'Usuario Incorrecto.');

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

			$this->session->set_flashdata('error', 'Falta llenar el campo usuario.');

			redirect("Login/index");	

		}

	}

	public function cerrar(){

		if(null !== $this->session->userdata("usuario")){

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