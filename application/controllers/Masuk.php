<?php
Class Masuk extends CI_Controller{
	function __construct() {
        parent::__construct();
       
        
        $this->load->helper(array('form','url'));
        $this->load->model('barang_model');
        $this->load->model('masuk_model');
        
        if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
         
    }

    public function index(){
    	$kode = $this->masuk_model->kodemasuk();
    	if ($kode=='') {
    		$a['title']="Input Barang Masuk";
			$a['isi']='inputbarangmasuk';
			$a['kode'] = $this->masuk_model->buat_kode_tr();
			$this->load->view('template',$a);
    	}else{
    		redirect('Masuk/detail','refresh');
    	}
    	
		
	}

	public function next(){
		$data = array(
				'nomasuk' => $this->input->post('kode'),
				'tgl' => date("Y-m-d", strtotime($this->input->post('tanggal'))),
				'kodelogin' => $this->session->userdata('SESS_USERNAME'),
				'tglinput' => date("Y-m-d"),
			);
		$insert = $this->masuk_model->save($data);
		redirect('Masuk/detail','refresh');

	}

	public function detail(){
			$a['title']="Input Barang Masuk";
			$a['isi']='detailbarangmasuk';
			$a['kode'] = $this->masuk_model->kodemasuk();
			$a['barang'] = $this->barang_model->tampilgambar();
			$this->load->view('template',$a);
	}

	public function nextdetail(){
		$data = array(
				'nomasuk' => $this->input->post('kode'),
				'kodebarang' => $this->input->post('kodebarang'),
				'qty' => $this->input->post('qty'),
				'hargabeli' => $this->input->post('harga'),
				'ket' => $this->input->post('ket'),
			);
		$insert = $this->masuk_model->savedetail($data);
		redirect('Masuk/inputlagi','refresh');

	}

	public function inputlagi(){
			$a['title']="Input Barang Masuk";
			$a['isi']='inputlagibarangmasuk';
			$this->load->view('template',$a);
	}

	public function daftarbarang(){
			$a['title']="Daftar Barang Masuk";
			$a['isi']='daftarbarangmasuk';
			$a['barang'] = $this->masuk_model->daftarbarang();
			$this->load->view('template',$a);
	}
	
	public function barang(){

		$id=$this->uri->segment(3);
        $where=array('tbdetailmasuk.nomasuk'=>$id); 
        $a['title']='Detail Barang Masuk';
        $a['isi']='rincibarangmasuk';
         
        $a['row'] = $this->masuk_model->get_byimage($where);
        $this->load->view('template',$a);
   }

   public function hapus(){

   	   $where   = $this->uri->segment(3);
       
        $this->masuk_model->get_delete($where); 
 	    echo "<script>alert(' Data Barang Berhasil Di hapus');</script>";
		redirect('Barang/databarang','refresh');
   }

   public function editbarang(){

		$id=$this->uri->segment(3);
        $where=array('tbdetailmasuk.nomasuk'=>$id); 
        $a['title']='Detail Barang Masuk';
        $a['isi']='editbarangmasuk';
         
        $a['row'] = $this->masuk_model->get_byimage($where);
        $this->load->view('template',$a);
   }

    public function kartustok(){
    	
    		$a['title']="kartu stok Barang ";
			$a['isi']='kartustok';
			$a['barang'] = $this->masuk_model->kartustok();
			$this->load->view('template',$a);
    	
    	}


}
	?>