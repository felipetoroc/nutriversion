<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_alimento extends CI_Controller {
	

	//function index()
	//{
		//$this->load->model('admin/dietas_model');
		//$dato['productos'] = $this->dietas_model->leerProductos();
		//$this->load->view('admin/productos_view',$dato);
		    
		
   //}
   
   function categoria_data()
   {
	   $this->load->model('admin/admin_model');
	   echo $this->admin_model->leer_categoria();
   }
   
   function index()
	{
		$this->load->view('admin/head_view');
		$this->load->view('admin/categoria_view');
		$this->load->view('admin/foot_view');
		    
		
   }
   
   public function create()
   {
	  $this->load->model('admin/admin_model');
      $this->admin_model->insertar_categoria();
	  //$this->load->model('admin/admin_model');
      echo 'insertado correctmanete';
   }

   public function add()
   {
     $this->load->view('admin/head_view');
     $this->load->view('admin/categoria_view');
     $this->load->view('admin/foot_view');
		    
   }
   
   public function eliminar_categoria(){
		$this->load->model('admin/Admin_model');
		echo $this->Admin_model->delete_categoria();
	}
	
	 public function editar_categoria(){
		$this->load->model('admin/Admin_model');
		echo $this->Admin_model->editar_categoria();
	}
	
	
	//************************sub_actegoria **************************************
	
	
		public function sub_categoria(){
		  $this->load->view('admin/head_view');
		 //**********************cargar combobox categoria *******************************
		  $this->load->model('admin/admin_model');
	      $data['categoria'] = $this->admin_model->recuperar_categoria();
		  $this->load->view('admin/sub_categoria_view',$data);
		  //***********************fin*****************************************************
		  $this->load->view('admin/foot_view');
	}
	
	   function sub_categoria_data()
   {
	   $this->load->model('admin/admin_model');
	   echo $this->admin_model->leer_sub_categoria();
   }
   
   public function create_sub_cate()
   {
	  $this->load->model('admin/admin_model');
      $this->admin_model->insertar_sub_categoria();
	  //$this->load->model('admin/admin_model');
      echo 'insertado correctamente';
   }
   
   public function eliminar_sub_categoria(){
		$this->load->model('admin/Admin_model');
		echo $this->Admin_model->delete_sub_categoria();
	}

   public function editar_sub_categoria(){
		$this->load->model('admin/Admin_model');
		echo $this->Admin_model->editar_sub_categoria();
		echo 'insertado correctamente';
	}
	
//************************producto **************************************
	
	public function productos(){
	
	    $this->load->view('admin/head_view');
		//**********************cargar combobox categoria *******************************
		  $this->load->model('admin/admin_model');
	      $data['sub_categoria'] = $this->admin_model->recuperar_sub_categoria();
		  $this->load->view('admin/productos_view',$data);
		  //***********************fin*****************************************************
		$this->load->view('admin/foot_view');
		
		 }
	
	function producto_data()
   {
	   $this->load->model('admin/admin_model');
	   echo $this->admin_model->leer_alimentos();
   }
   
   public function create_producto()
   {
	  $this->load->model('admin/admin_model');
      echo $this->admin_model->insertar_producto();
	  //$this->load->model('admin/admin_model');
      echo 'insertado correctamente';
   }
   
   
    function contador()
	{
		$this->load->view('admin/head_view');
		$this->load->view('admin/contador_view');
		$this->load->view('admin/foot_view');
		    
		
   }
   
   function contador_data()
   {
	   $this->load->model('admin/admin_model');
	   echo $this->admin_model->leer_contador();
   }
   
}
?>