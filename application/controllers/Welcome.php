<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome/head_view');
		$this->load->view('welcome/baner_view');
		$this->load->view('welcome/topbar_view');
		$this->load->view('welcome/sidebar_view');
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
