<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		/*$this->load->view('welcome/sidebar_view');*/
		$this->load->view('welcome/principal_view');
		$this->load->view('welcome/foot_view');
	}
	public function contacto()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		$this->load->view('welcome/sidebar_view');
		$this->load->view('welcome/contacto_view');
		$this->load->view('welcome/foot_view');
	}
	public function alimentos()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		$this->load->view('welcome/sidebar_view');
		$this->load->view('welcome/alimentos_view');
		$this->load->view('welcome/foot_view');
	}
	public function ejercicios()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		$this->load->view('welcome/sidebar_view');
		$this->load->view('welcome/ejercicios_view');
		$this->load->view('welcome/foot_view');
	}
	public function empresas()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		$this->load->view('welcome/sidebar_view');
		$this->load->view('welcome/infoempresas_view');
		$this->load->view('welcome/foot_view');
	}
	public function personas()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		$this->load->view('welcome/sidebar_view');
		$this->load->view('welcome/infopersonas_view');
		$this->load->view('welcome/foot_view');
	}
}
