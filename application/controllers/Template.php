<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Template extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		 $this->load->helper(array('form','url'));
        $this->load->library('FPDF');
            define('FPDF_FONTPATH',  $this->config->item('fonts_path'));
          $this->load->model('chartmodel');  
        $this->load->model('Template_model');
		if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
		
	}

    public function index()
        {
         $a['title']="Grafik Barang Masuk";
         $a['title1']="Grafik Barang Keluar";
         $a['report'] = $this->chartmodel->bulan();
          $a['report1'] = $this->chartmodel->keluar();
          $a['isi']="grafik";
          $this->load->view('template', $a);
          // $this->load->view('grafik', $a);   
         }

	public function masuk(){
		$a['title']="Barang Masuk";
		$a['isi']="barangmasuk";
		$a['barang'] = $this->Template_model->masuk();
		$this->load->view('template', $a);
	}

	public function keluar(){
		$a['title']="Barang Keluar";
		$a['isi']="barangkeluar";
		$a['barang'] = $this->Template_model->keluar();
		$this->load->view('template', $a);
	}
		function get_all_masuk(){
              $data['data_gallery']= $this->Template_model->masuk();
              $this->load->view('laporanfpdf',$data);
              
         
          }

          function get_all_keluar(){
              $data['data_gallery']= $this->Template_model->keluar();
              $this->load->view('laporanfpdfk',$data);
              
         
          }

      
	

	


	


}

	

 ?>