<?php
Class Barang extends CI_Controller{
    
    function __construct() {
        parent::__construct();
       
        $this->load->library('upload');
        $this->load->helper(array('form','url'));
        $this->load->model('merek_model');
        $this->load->model('barang_model');
        
        if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
         
    }
    
    	public function index(){
		$a['title']="Input Daftar Barang";
		$a['isi']='inputbarang';
		$a['kode']=$this->barang_model->buat_kode_tr();
		$a['merek']=$this->merek_model->tampil();
		$this->load->view('template',$a);
	}

	public function databarang(){
		$a['title']="Daftar Data Barang";
		$a['isi']='barang';
	
		$a['list']=$this->barang_model->tampilgambar();
		$this->load->view('template',$a);
	}

	
	 function insert(){
		$nmfile=$this->input->post('namabarang');
		$config['upload_path']	= 'assets/images/barang/';
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
					$this->barang_model->fill_data($foto);
						if ($this->barang_model->insert_data()) {
							# code...
							echo "<script>alert('Data barang Berhasil Di simpan');</script>";
							redirect('Barang/databarang','refresh');
						}else{
							echo "<script>alert('Data barang Gagal Di simpan');</script>";
						}
				}
	}

	
	

	 public function edit(){

		$id=$this->uri->segment(3);
        $where=array('kodebarang'=>$id); 
        $a['title']='Edit Barang';
        $a['isi']='editbarang';
        $a['merek']=$this->merek_model->tampil();
        $a['list'] = $this->barang_model->get_byimage($where);
        $this->load->view('template',$a);
   }

   public function detail(){

		$id=$this->uri->segment(3);
        $where=array('kodebarang'=>$id); 
        $a['title']='Detail Barang';
        $a['isi']='detailbarang';
         $a['merek']=$this->merek_model->tampil();
        $a['list'] = $this->barang_model->get_byimage($where);
        $this->load->view('template',$a);
   }


    public function update(){
 
       
        $nmfile=$this->input->post('namabarang');
        $path   = 'assets/images/barang/';
		$config['upload_path']	= $path;
		$config['allowed_types']= 'gif|jpg|jpeg|bmp|png';
		$config['max_size']= '2088';
		$config['max_width']= '1288';
		$config['max_height']= '768';
		$config['file_name']= $nmfile.date('his');
 
       $this->upload->initialize($config);
 
       $idgbr      = $this->input->post('kodebarang'); 
       $filelama   = $this->input->post('filelama'); 
 	   


       if(!$_FILES['filefoto']['name']== '')
       {
           if (!$this->upload->do_upload('filefoto'))
           {
           		$er_upload=$this->upload->display_errors();
               
               echo "<script>alert('Edit Data Barang gagal". $er_upload."');</script>";
							redirect('Barang/edit','refresh');	
           }else{  
           	
              $gbr = $this->upload->data();
                $data = array(
                 'gambar' =>$gbr['file_name'],
                 
				 'nama'=>$this->input->POST('namabarang'),
				 'kodemerek'=>$this->input->POST('kodemerek'),
				 
				 'spesifikasi'=>$this->input->POST('spesifikasi'),
 
               );
 
               @unlink($path.$filelama);
 
               $where =array('kodebarang'=>$idgbr);
               $this->barang_model->get_update($data,$where); 
 
               echo "<script>alert('Edit Data Barang Berhasil');</script>";
							redirect('Barang/databarang','refresh');
               

						
           }
       }else{ 
 
           $data = array(
               	 
				 'nama'=>$this->input->POST('namabarang'),
				 'kodemerek'=>$this->input->POST('kodemerek'),
				 
				 'spesifikasi'=>$this->input->POST('spesifikasi'),
           );
 
           $where =array('kodebarang'=>$idgbr); 
           $this->barang_model->get_update($data,$where); 
 
            echo "<script>alert('Edit Data Barang Berhasil');</script>";
							redirect('Barang/databarang','refresh');
       	}
  	 }
 

   	public function hapus(){

   	  $idgbr  = $this->uri->segment(3);

 
  
       $path= 'assets/images/barang/';
       $where  = array('kodebarang'=>$idgbr);
       $rowdel = $this->barang_model->get_byimage($where);
 
 		
       
       @unlink($path.$rowdel->gambar);

        $this->barang_model->get_delete($where); 
 	    echo "<script>alert(' Data Barang Berhasil Di hapus');</script>";
		redirect('Barang/databarang','refresh');

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