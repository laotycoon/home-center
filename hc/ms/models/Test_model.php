<?php
class Test_model extends CI_Model {
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	function Test_model() {
		parent::Model();
	}
	
	public function get_test()
	{
		$query = $this->db->query('SELECT * FROM USER_LOGIN');
		return $query->num_rows();
	}

}