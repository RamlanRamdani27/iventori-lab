<?php
Class User extends CI_Controller{
    
    function __construct() {
        parent::__construct();
       
        $this->load->library('upload');
        $this->load->helper(array('form','url'));
        $this->load->model('merek_model');
        $this->load->model('user_model');
        
        if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
         
    }
    
    public function index(){
		$a['title']="Input User";
		$a['isi']='inputuser';
		$this->load->view('template',$a);
	}

	public function datauser(){
		$a['title']="Data User";
		$a['isi']='user';
		$a['list']=$this->user_model->tampiluser();
		
		$this->load->view('template',$a);
	}

	
	 function insert(){
	 	$Username=$this->input->post('username');
	 	$cek=$this->user_model->cekusername($Username);
	 	if ($cek=='') {
	 		$nmfile=$this->input->post('namalengkap');
		$config['upload_path']	= 'assets/images/users/';
		$config['allowed_types']= 'gif|jpg|jpeg|bmp|png';
		$config['max_size']= '2088';
		$config['max_width']= '1288';
		$config['max_height']= '768';
		$config['file_name']= $nmfile.date('his');

		

			$this->upload->initialize($config);
				if (! $this->upload->do_upload()) {
					$a=$this->upload->display_errors();
					echo $a;
				}else{
					$gbr =$this->upload->data();
					$foto=$gbr['file_name'];
					$this->user_model->fill_data($foto);
						if ($this->user_model->insert_data()) {
							# code...
							echo "<script>alert('Data User Berhasil Di simpan');</script>";
							redirect('User/index','refresh');
						}else{
							echo "<script>alert('Data User Gagal Di simpan');</script>";
						}
				}
	 	}else{
	 		echo "<script>alert('Username Sudah Ada');</script>";
	 		Redirect('User/index','refresh');
	 	}
		
	}

	
	

	 public function edit(){

		$id=$this->session->userdata('SESS_USERNAME');;
        $where=array('kodelogin'=>$id); 
        $a['title']='Informasi Personal';
        $a['isi']='profile';
        $a['barang']=$this->user_model->get_barangkeluar($where);
        $a['list'] = $this->user_model->get_byimage($where);
        $this->load->view('template',$a);
   }

   public function detail(){

		$id=$this->uri->segment(3);
        $where=array('kodelogin'=>$id); 
        $a['title']='Detail User';
        $a['isi']='detaillogin';
        
        $a['list'] = $this->user_model->get_byimage($where);
        $this->load->view('template',$a);
   }


    public function update(){
 
       
        $nmfile=$this->input->post('namalengkap');
        $path= 'assets/images/users/';
		$config['upload_path']	= $path;
		$config['allowed_types']= 'gif|jpg|jpeg|bmp|png';
		$config['max_size']= '2088';
		$config['max_width']= '1288';
		$config['max_height']= '768';
		$config['file_name']= $nmfile.date('his');
 
       $this->upload->initialize($config);
 
       $idgbr      = $this->session->userdata('SESS_USERNAME'); 
       $filelama   = $this->input->post('filelama'); 
 	   


       if(!$_FILES['filefoto']['name']== '')
       {
           if (!$this->upload->do_upload('filefoto'))
           {
           		$er_upload=$this->upload->display_errors();
               
               echo "<script>alert('Edit Data User gagal". $er_upload."');</script>";
							redirect('User/edit','refresh');	
 				
 
           }else{  
           	
              $gbr = $this->upload->data();
                $data = array(
                 'gambar' =>$gbr['file_name'],
                 'username'=>$this->input->POST('username'),
				 'namalengkap'=>$this->input->POST('namalengkap'),
 
               );
 
               @unlink($path.$filelama);
 
               $where =array('kodelogin'=>$idgbr);
               $this->user_model->get_update($data,$where); 
 
               echo "<script>alert('Edit Data User Berhasil');</script>";
							redirect('User/edit','refresh');
               

						
           }
       }else{ 
 
           $data = array(
               	 
				 'username'=>$this->input->POST('username'),
				 
				 
				 'namalengkap'=>$this->input->POST('namalengkap'),
           );
 
           $where =array('kodelogin'=>$idgbr); 
           $this->user_model->get_update($data,$where); 
 
            echo "<script>alert('Edit Data User Berhasil');</script>";
							redirect('User/edit','refresh');
       	}
  	 }
 

   	public function hapus(){

   	  $idgbr  = $this->uri->segment(3);

 
  
       $path= 'assets/images/users/';
       $where  = array('kodelogin'=>$idgbr);
       $rowdel = $this->user_model->get_byimage($where);
 
 		
       
       @unlink($path.$rowdel->gambar);

        $this->user_model->get_delete($where); 
 	    echo "<script>alert(' Data User Berhasil Di hapus');</script>";
		redirect('User/datauser','refresh');

   }




	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kodebarang') == '')
		{
			$data['inputerror'][] = 'kodebarang';
			$data['error_string'][] = 'kode barang is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('namabarang') == '')
		{
			$data['inputerror'][] = 'namabarang';
			$data['error_string'][] = 'nama barang is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggalmasuk') == '')
		{
			$data['inputerror'][] = 'tanggalmasuk';
			$data['error_string'][] = 'tanggal masuk is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kodemerek') == '')
		{
			$data['inputerror'][] = 'kodemerek';
			$data['error_string'][] = 'kode merek is gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('jumlah') == '')
		{
			$data['inputerror'][] = 'jumlah';
			$data['error_string'][] = 'jumlah is required';
			$data['status'] = FALSE;
		}

		

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}