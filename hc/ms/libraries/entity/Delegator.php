<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delegator {
	
	protected $CI;
	
	public function __construct()
    {
        $this->CI =& get_instance();
    }
	
	public function findByAnd($entityName,$fields,$orderBy) {
		$sql = "SELECT * FROM ".$entityName." where 1=1 ";
		$where="";
		foreach ($fields as $key => $value){
			$where=$where." and ".$key."='".$value."' ";
		}
		if(!empty($where))
			$sql=$sql.$where;
		if(!empty($orderBy))
			$sql=$sql." order by ".$orderBy;
		$query = $this->CI->db->query($sql);
		$row = $query->first_row('array');
		return $row;
	}
}