<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function validate_login($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));

		$query=$this->db->get('tblogin');

		if ($query->num_rows()==1) {
			$row =$query->row();
				$data=array(
					'SESS_USERNAME' => $row->kodelogin,
					'SESS_LEVEL' => $row->level,
					'SESS_GAMBAR' => $row->gambar,	
					'SESS_NAME' => $row->namalengkap);
		$this->session->set_userdata($data);
				return TRUE;
		}else{
			return FALSE;
		}
	}

}

 ?> 
