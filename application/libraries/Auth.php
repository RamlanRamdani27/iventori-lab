<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	
	

    function check_user_authentification($admin_only = 0)
    {
    	$CI =& get_instance();
		$CI->load->library('session');
		if(!$CI->session->userdata('ADMIN'))
		{
			echo "<script>alert('Silahkan Login');window.location='".base_url()."welcome';</script>";
			
 		}
 		
 		 		
    }
}

?>
