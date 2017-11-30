<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	
    //subir imagen
    public function actualizarUrlC(){
        $nombre_file= $this->input->post('url_imagen');
        echo $nombre_file;
        $usuario_id=$this->session->userdata('id');
        $mi_archivo = 'url_imagen';
        $config['upload_path'] = "img/";
        $config['file_name'] = "usuario".$usuario_id.".jpg";
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        $config['overwrite'] = true;

        //difinimos url archivo
        $url=$config['upload_path'].$config['file_name'];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }
        $data['uploadSuccess'] = $this->upload->data();
         $this->load->model("cliente/Cliente_model");
         echo $this->Cliente_model->actualizarUrlM($url);
         $this->session->set_userdata('imagen_url',$url);
         redirect('/cliente/', 'refresh');
         redirect('/cliente/', 'refresh');
         redirect('/cliente/', 'refresh');
        //Termino subir imagen

    }

	public function index(){
		$this->load->view('cliente/head_view');
		$this->load->view('cliente/baner_view');
		$this->load->view('cliente/topbar_view');
		/*$this->load->view('cliente/sidebar_view');*/
		$this->load->view('cliente/principal_view');
		$this->load->view('cliente/foot_view');
	}
	public function estado(){
		$this->load->model("cliente/cliente_model");
		$resultado = $this->cliente_model->contar_filas();
		$valida_estado = $this->cliente_model->Valida_estado_fisico();
		$this->load->view('cliente/head_view');
		$this->load->view('cliente/baner_view');
		$this->load->view('cliente/topbar_view');
		/*$this->load->view('cliente/sidebar_view');*/
		if ($resultado->num > 0 &&  $valida_estado->lala == 0 ){
			$data['estado_fisico'] = $this->cliente_model->recuperar_estado($this->session->userdata('id'));
			$this->load->view('cliente/estado_fisico_view',$data);
		}else{
			$data['mensaje'] = "El nutricionista aún no ingresa o actualiza su estado físico.";	
			$this->load->view('cliente/estado_desactualizado_view',$data);
		}
		$this->load->view('cliente/foot_view');
	}
	public function nuevo_estado(){
		$id_cliente = $this->session->userdata('id');
		$altura = $this->input->post('Altura');
		$peso = $this->input->post('Peso');
		$cuello = $this->input->post('Cuello');
		$cintura = $this->input->post('Cintura');
		$cadera = $this->input->post('Cadera');
		$factor = $this->input->post('factor');
		$objetivo = $this->input->post('objetivo');
		$this->load->model("cliente/cliente_model");
		//echo $this->cliente_model->insertar_estado();
		if($this->cliente_model->calculos($id_cliente,$altura,$peso,$cuello,$cintura,$cadera,$factor,$objetivo)){
			redirect('cliente/estado');
		}
	}
	
	public function calcular_datos(){
		
	}
	
    function contador()
	{
		$this->load->view('cliente/head_view');
		$this->load->view('cliente/baner_view');
		$this->load->view('cliente/topbar_view');
		/*$this->load->view('cliente/sidebar_view');*/
		$this->load->view('cliente/Contador_de_calorias_view');
		$this->load->view('cliente/foot_view');
    }
   
    function mi_contador(){
		$this->load->view('cliente/head_view');
		$this->load->view('cliente/baner_view');
		$this->load->view('cliente/topbar_view');
		/*$this->load->view('cliente/sidebar_view');*/
		$this->load->view('cliente/Contador_calorias_cliente_view');
		$this->load->view('cliente/foot_view');
    }
   
    function asignar_fecha_detalle(){
    	$fechaCorrecta = $this->input->post("fecha_detalle");
		$datos = array('fecha_detalle' => $fechaCorrecta);
		$this->session->set_userdata($datos);
   	}
   	function desasignar_fecha_detalle(){
		$this->session->unset_userdata('fecha_detalle');
   	}

	function contador_data(){
	   $this->load->model('cliente/Cliente_model');
	   echo $this->Cliente_model->leer_contador();
   	}
   
    function ver_contador_data(){
	   $this->load->model('cliente/Cliente_model');
	   echo $this->Cliente_model->leer_contador_cliente();
   	}
   
   function contador_contador_cabecera(){
	   $this->load->model('cliente/Cliente_model');
	   echo $this->Cliente_model->insertar_contador_cobecera();
   }   
   
   function contador_detalle(){
	   $this->load->model('cliente/Cliente_model');
	   echo $this->Cliente_model->insertar_contador_detalle();
   }   
   
   public function eliminar_detalle_contador(){
		$this->load->model('cliente/Cliente_model');
		echo $this->Cliente_model->delete_detalle_contador();
	}

	//funcion de ver grafico
    function Ver_grafico_peso_data(){
	   $this->load->model('cliente/Cliente_model');
	   $this->output
        ->set_content_type('application/json')
        ->set_output($this->Cliente_model->Infromacion_peso_grafico());
   	}
	
	function solo_grafico(){
	   $this->load->view('cliente/GraficoPeso_view');
   	}

   	function misDietas($fecha=null){
   		$fechaPrueba;
   		if($fecha != null){
   			$fechas = explode("-",$fecha);
   			if(count($fechas) == 3){
   				$verificarFecha = checkdate($fechas[1],$fechas[0],$fechas[2]);
			 	if($verificarFecha == true){
		   			$fechaPrueba = $fecha;
		   		}else{
		   			$fechaPrueba = date('d')."-".date("m")."-".date("Y");
		   		}
   			}else{
   				$fechaPrueba = date('d')."-".date("m")."-".date("Y");
   			}
	   	}else{
	   		$fechaPrueba = date('d')."-".date("m")."-".date("Y");
	   	}
	   	$fechaCorrect = DateTime::createFromFormat('d-m-Y',$fechaPrueba)->format('Y/m/d');
        $this->load->model('cliente/Cliente_model');
        $id_dieta = $this->Cliente_model->getIdDietaByIdCliente($this->session->userdata("id"));
        if ($id_dieta > 0){
        	$data = array(
	            "dieta" => json_decode($this->Cliente_model->getDietaByIdCliente($this->session->userdata("id"))),
	            "columnas" => $this->Cliente_model->cargar_columnas_tabla_dieta(),
	            "filas" => $this->Cliente_model->cargar_filas_tabla_dieta(),
	            "consumo" => $this->Cliente_model->getAlimentosConsumidos($this->session->userdata("id"),$fechaCorrect),
	            "cumplimiento" => $this->Cliente_model->getCumplimiento($this->session->userdata("id"),$fechaCorrect),
	            "fechaIngresada" => DateTime::createFromFormat('Y/m/d',$fechaCorrect)->format('d-m-Y'),
	            'calorias_cal' => $this->Cliente_model->get_sum_calorias_contador($fechaCorrect,$this->session->userdata("id")),
	            'calorias' => $this->Cliente_model->getCaloriasDieta($id_dieta)
	        );
	        $this->load->view('cliente/head_view');
	        $this->load->view('cliente/baner_view');
	        $this->load->view('cliente/topbar_view');
	        /*$this->load->view('cliente/sidebar_view');*/
	        $this->load->view('cliente/misDietas_view',$data);
	        $this->load->view('cliente/foot_view');
        }else{
        	$data['mensaje'] = "El nutricionista aún le asigna una dieta";
        	$this->load->view('cliente/head_view');
	        $this->load->view('cliente/baner_view');
	        $this->load->view('cliente/topbar_view');
	        /*$this->load->view('cliente/sidebar_view');*/
	        $this->load->view('cliente/estado_desactualizado_view',$data);
	        $this->load->view('cliente/foot_view');
        }
    }

    function verificarProfesional(){
    	if($this->input->post("rut")){
			if($this->input->post("pw")){
				$rut = $this->input->post("rut");
				$pass = $this->input->post("pw");
				$this->load->model('login/login_model');
                $row = $this->login_model->valida_usuario($rut,$pass);
				if(isset($row)){
	                if($row->cliente_tipo == '2' | $row->cliente_tipo == '3'){
	                	$this->session->set_flashdata('autorizado_por',$row->cliente_rut);
	                	redirect("cliente/estado");
	                }else{
	                	$this->session->set_flashdata('error', 'Datos Incorrectos');
						redirect("cliente/estado");
	                }
				}else{
					$this->session->set_flashdata('error', 'Datos Incorrectos');
					redirect("cliente/estado");
                }
			}else{
				$this->session->set_flashdata('error', 'Falta llenar el campo contraseña.');
				redirect("cliente/estado");	
			}
		}else{
			$this->session->set_flashdata('error', 'Falta llenar el campo rut.');
			redirect("cliente/estado");	
		}
    }

    function datosUsuario(){
    	$this->load->model('comuna_model');
		$data = array(
			'regiones' => $this->comuna_model->obtener_region()
		);
    	$this->load->view('cliente/head_view');
        $this->load->view('cliente/baner_view');
        $this->load->view('cliente/topbar_view');
        /*$this->load->view('cliente/sidebar_view');*/
        $this->load->view('cliente/editar_datos_usuario',$data);
        $this->load->view('cliente/foot_view');
    }

    function editUser(){
    	$nombre = strtoupper($this->input->post('nombre'));
        $apellidop = strtoupper($this->input->post('apellidop'));
        $apellidom = strtoupper($this->input->post('apellidom'));
        $rut = $this->session->userdata('rut');
		$fechaNac = $this->input->post('fechaNac');
		$email = $this->input->post('mail');
		if ($this->input->post('id_comuna') <> ""){
			$id_comuna = $this->input->post('id_comuna');
		}else{
			$id_comuna = $this->session->userdata('comuna_id');
		}
		$direccion = strtoupper($this->input->post('direccion'));
		$telefono = $this->input->post('telefono');
        $this->load->model('cliente/Cliente_model');
        $resultado = $this->Cliente_model->editUser($nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion);
		if($resultado == 1)
		{
            $this->session->set_userdata('nombre',$nombre);
            $this->session->set_userdata('apellido',$apellidop." ".$apellidom);
            $this->session->set_userdata('fechaNac',$fechaNac);
            $this->session->set_userdata('comuna_id',$id_comuna);
            $this->session->set_userdata('email',$email);
            $this->session->set_userdata('telefono',$telefono);
            $this->session->set_userdata('direccion',$direccion);	
			redirect('cliente');
		}else{
			if($resultado == 0){
				$this->session->set_flashdata('error','No se pudo actualizar');
		    	$this->index();
			}
        }
    }
    public function provincia_data(){
		$this->load->model('comuna_model');
		echo json_encode($this->comuna_model->obtener_provincia());
	}
	public function comuna_data(){
		$this->load->model('comuna_model');
		echo json_encode($this->comuna_model->obtener_comuna());
	}
	public function prueba($fecha=null){
		$fechas = explode("-",$fecha);
		echo count($fechas);
		 /*checkdate(month,day,year);*/
	}
}
?>