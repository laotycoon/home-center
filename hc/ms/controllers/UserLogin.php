<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Controller {
	
	public function __construct() 
	{        
	    parent::__construct();
	}
	
	public function index()
	{
		echo "b";
	}

	public function login()
	{
		$this->load->library('session');
		if(!empty($_SESSION['userLogin']))
		{
			$userLogin = $_SESSION['userLogin'];
		}
		
		$result['msg']='';
		if(!empty($_POST['username'])){
			$username=$_POST['username'];
		}else {
			$result['msg']='用户名不存在';
		}
		if(!empty($_POST['password'])){
			$password=$_POST['password'];
		}else {
			$result['msg']='密码为空';
		}
		$this->load->library('common/login/LoginService');
		$result['result']=$this->loginservice->login($username,$password);
		echo $result['msg'];
		
		$data['result']=$result;
		$this->load->view('ms/includes/header');
		$this->load->view('ms/includes/navbar');
		$this->load->view('ms/main',$data);
		$this->load->view('ms/includes/footer');
	}
}