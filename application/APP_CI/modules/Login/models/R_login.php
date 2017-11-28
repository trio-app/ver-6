<?php

class R_login extends CI_Model {

	function Signin($data){
		$where = array(
			'userLogin' => $data['userid'],
			'userPassword' => md5($data['userpass'])
			);

		$this->db->select('*');
		$this->db->from('cpuser');
		$this->db->where($where);
		$query	= $this->db->get();
		$row	= $query->result_array();
                
		return $row;


	}
}