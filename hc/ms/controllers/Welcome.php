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
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('/common/CurlWorker');
	}
	
	public function index()
	{
		$url = "http://localhost:8080/sso/control/checkLogin";
		$output=$this->curlworker->curl_request_to_json($url,'','',0);
		$status=$output['LoginStatus'];
		if ($status=='error') {
			$this->load->view('/includes/header');
			$this->load->view('login');
			$this->load->view('/includes/footer');
		}else{
			header("location:/hc/index.php/controller/main");
		}
	}
}
