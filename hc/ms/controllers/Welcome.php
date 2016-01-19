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
	public function _remap($method, $params = array())
	{
		//$method = 'process_'.$method;
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		show_404();
	}
	
	public function index()
	{
		$this->load->library('session');
		//print_r($_SESSION);
		$this->load->view('/includes/header');
		if(!empty($_SESSION['userLogin']))
		{
			$userLogin = $_SESSION['userLogin'];
			$this->load->view('/includes/navbar');
		}
		else{
			$this->load->view('login');
		}
		$this->load->view('/includes/footer');
	}
}
