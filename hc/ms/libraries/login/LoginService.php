<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginService {
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function login($username,$password)
	{
		$userLogin['username'] = $username;
		$userLogin['password'] = $password;
		$this->CI->load->model('login_model');
		$row = $this->CI->login_model->get_login($userLogin);
		return $row;
	}
}