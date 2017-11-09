<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dietas extends CI_Controller {

	

	function __construct()

	{

		parent::__construct();

    }

	

function dieta_cabecera()

	{

		$this->load->view('admin/head_view');

		$this->load->view('admin/dieta_cabecera_view');

		$this->load->view('admin/foot_view');

		    

		

   }

   

   //**********************dieta cabecera*************************************

   

    function dieta_cabecera_data()

   {

	   $this->load->model('admin/admin_model');

	   echo $this->admin_model->leer_dieta_cabecera();

   }

   

    public function create_dieta_cabecera()

   {

	  $this->load->model('admin/admin_model');

      $this->admin_model->insertar_dieta_cabecera();

	  //$this->load->model('admin/admin_model');

      echo 'insertado correctamente';

   }

   

    

   public function eliminar_dieta_cabecera(){

		$this->load->model('admin/Admin_model');

		echo $this->Admin_model->delete_dieta_cabecera();

	}



	 public function editar_dieta_cabecera(){

		$this->load->model('admin/Admin_model');

		echo $this->Admin_model->editar_dieta_cabecera();

	}

   



}

?>