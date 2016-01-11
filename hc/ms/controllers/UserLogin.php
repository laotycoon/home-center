<?php
class UserLogin extends CI_Controller {

	public function index()
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$userLogin['username'] = $username;
		$userLogin['password'] = $password;
		
		$this->load->model('test_model');
		$data['test'] = $this->test_model->get_test();
//		$this->load->model('login_model');
//		$data['result'] = $this->login_model->get_login($userLogin);
		$this->load->view('ms/includes/header');
		$this->load->view('ms/includes/navbar');
		$this->load->view('ms/main',$data);
		$this->load->view('ms/includes/footer');
	}

	public function userLogin()
	{
		
	}
}