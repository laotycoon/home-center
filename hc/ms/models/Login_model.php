<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}

	function Login_model() {
		parent::Model();
	}

	public function get_login($userLogin)
	{
		$username = $userLogin['username'];
		$password = $userLogin['password'];
		$sql = "SELECT * FROM USER_LOGIN where user_login_id= ? ";
		$query = $this->db->query($sql, $username);
		return $query->num_rows();
	}
}