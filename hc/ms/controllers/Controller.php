<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
	
	public function __construct()
	{        
	    parent::__construct();
		//$this->load->library('/common/CurlWorker');
	}
	
	public function _remap($method, $params = array())
	{
		$url = "http://localhost:8080/sso/control/ssoCheckLogin";
		$output=$this->curlworker->curl_request_to_json($url,'',true,0);
		$status=$output['LoginStatus'];
		echo var_dump($_COOKIE);
		if ($status!='success') {
			//header("location:/hc/index.php");
		}		
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		show_404();
	}
	
	public function index()
	{
		echo 'ok';
	}

	public function login()
	{
		$this->load->library('session');
		if(!empty($_SESSION['userLogin']))
		{
			$userLogin = $_SESSION['userLogin'];
		}
		$result['msg']='';
		if(!empty($_POST['USERNAME'])){
			$username=$_POST['USERNAME'];
		}else {
			$result['msg']='用户名不存在';
		}
		if(!empty($_POST['PASSWORD'])){
			$password=$_POST['PASSWORD'];
		}else {
			$result['msg']='密码为空';
		}
		$url = "http://localhost:8080/sso/control/ssoLogin";
		$post_data = array(
			"USERNAME" => $username,
			"PASSWORD" => $password
		);
		$output=$this->curlworker->curl_request_to_json($url,$post_data,'',0);
		if(!empty($output['_LOGIN_PASSED_']))
		{
			$_SESSION['username'] = $username;
			header("location:/hc/index.php/controller/main");
		}else
		{
			$_SESSION['_ERROR_MESSAGE_'] = $output['_ERROR_MESSAGE_'];
			header("location:/hc/index.php");
		}
		echo var_dump($_SESSION);
	}
	function remoteLoginByPost($username,$password){
		$data=array(
			"USERNAME" => $username,
			"PASSWORD" => $password
		);
		$data=http_build_query($data);
		$opts=array(
			'http'=>array(
				'method'=>'POST',
				'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
				"Content-Length: ".strlen($data)."\r\n",
				'content'=>$data
			),
		);
		$context=stream_context_create($opts);
		$html=file_get_contents('http://localhost:8080/sso/control/ssoLogin',false,$context);
		echo $html;
	}
	
	public function main()
	{
		$this->load->view('/includes/header');
		$this->load->view('/includes/navbar');
		$this->load->view('/includes/main');
		$this->load->view('/includes/footer');
	}
	
	public function page1()
	{
		$this->load->view('/includes/header');
		$this->load->view('/includes/navbar');
		$this->load->view('/page1');
		$this->load->view('/includes/footer');
	}
	
	public function page2()
	{
		$this->load->view('/includes/header');
		$this->load->view('/includes/navbar');
		$this->load->view('/page2');
		$this->load->view('/includes/footer');
	}
}