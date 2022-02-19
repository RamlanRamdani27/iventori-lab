<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		// $this->load->helper(array('form','url'));
		$this->load->model('login_model');
	}

	public function index(){
		
		
		$this->load->view('Login');
	}

	public function ceklogin(){
		$username=$this->input->post('txtusername');
		$password=$this->input->post('txtpassword');

		$query=$this->login_model->validate_login($username,$password);
		if($query){
			
			redirect('Template/index');
		}else{

			echo"<script>alert('Gagal Login');window.location='".base_url()."Login/index'</script>";
		}
	}

	
	public function logout(){
         
         $this->session->userdata(session_destroy());
        echo "<script>alert('Anda Berhasil Logout'); window.location='".base_url()."Login/index'</script>";	
    	}


}

