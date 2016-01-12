<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function Login_model() {
		parent::Model();
	}

	public function get_login($userLogin)
	{
		$result =array('result'=>'','msg'=>'');
		$username = $userLogin['username'];
		$password = $userLogin['password'];
		$sql = "SELECT * FROM USER_LOGIN where user_login_id= ?";
		$query = $this->db->query($sql, $username);
		if($query->num_rows()>0){
			$result['result']="success";
		}else{
			$result['result']="error";
			$result['msg']="用户名不存在。";
		}
		$fields=array("user_login_id"=>$username);
		$row=$this->delegator->findByAnd('USER_LOGIN',$fields,null);
		return $row;
	}
}

