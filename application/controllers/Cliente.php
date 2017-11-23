<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	
	public function __construct()
    {
			parent::__construct();
            if(null == $this->session->userdata("usuario")){
				if(null == $this->session->userdata("tipo_usuario")){
					if($this->session->userdata("tipo_usuario") <> 1){
						redirect("Welcome");	
					}
				}
			}
    }
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
         $this->session->userdata('imagen_url',$url);
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
			$this->load->view('cliente/primer_inicio_view');
		}
		$this->load->view('cliente/foot_view');
	}
	public function nuevo_estado(){
		$this->load->model("cliente/cliente_model");
		//echo $this->cliente_model->insertar_estado();
		$this->cliente_model->calculos();
		redirect('/cliente/estado');
		
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
            "consumo" => $this->Cliente_model->getAlimentosConsumidos($this->session->userdata("id"))
        );
        $this->load->view('cliente/head_view');
        $this->load->view('cliente/baner_view');
        $this->load->view('cliente/topbar_view');
        $this->load->view('cliente/sidebar_view');
        $this->load->view('cliente/misDietas_view',$data);
        $this->load->view('cliente/foot_view');
    }
}
?>