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
		$this->load->view('cliente/sidebar_view');
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
		$this->load->view('cliente/sidebar_view');
		if ($resultado->num > 0 &&  $valida_estado->lala == 0 ){
			$data['estado_fisico'] = $this->cliente_model->recuperar_estado();
			$this->load->view('cliente/estado_fisico_view',$data);
		}else{
			/*if ($this->session->flashdata('autorizado_por')){*/
				$data['objetivos'] = $this->cliente_model->getObjetivos();
				$this->load->view('cliente/primer_inicio_view',$data);
			/*}else{
				$this->load->view('cliente/autorizacion_view');
			}*/
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
		$this->load->view('cliente/sidebar_view');
		$this->load->view('cliente/Contador_de_calorias_view');
		$this->load->view('cliente/foot_view');
    }
   
    function mi_contador(){
		$this->load->view('cliente/head_view');
		$this->load->view('cliente/baner_view');
		$this->load->view('cliente/topbar_view');
		$this->load->view('cliente/sidebar_view');
		$this->load->view('cliente/Contador_calorias_cliente_view');
		$this->load->view('cliente/foot_view');
    }
   
    function asignar_fecha_detalle(){
		$datos = array('fecha_detalle' => $this->input->post('fecha_detalle'));
		$this->session->set_userdata($datos);
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

   	function misDietas(){
        $this->load->model('cliente/Cliente_model');
        $data = array(
            "dieta" => json_decode($this->Cliente_model->getDietaByIdCliente($this->session->userdata("id"))),
            "columnas" => $this->Cliente_model->cargar_columnas_tabla_dieta(),
            "filas" => $this->Cliente_model->cargar_filas_tabla_dieta(),
            "consumo" => $this->Cliente_model->getAlimentosConsumidos($this->session->userdata("id")),
            "cumplimiento" => $this->Cliente_model->getCumplimiento($this->session->userdata("id"))

        );
        $this->load->view('cliente/head_view');
        $this->load->view('cliente/baner_view');
        $this->load->view('cliente/topbar_view');
        $this->load->view('cliente/sidebar_view');
        $this->load->view('cliente/misDietas_view',$data);
        $this->load->view('cliente/foot_view');
    }

    function verificarProfesional(){
    	if($this->input->post("rut")){
			if($this->input->post("pw")){
				$rut = $this->input->post("rut");
				$pass = $this->input->post("pw");
				$this->load->model('login/login_model');
                $row = $this->login_model->valida_usuario($rut,$pass);
				if(isset($row)){
	                if($row->cliente_tipo == '2'){
	                	$this->session->set_flashdata('autorizado_por',$row->cliente_rut);
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
}
?>