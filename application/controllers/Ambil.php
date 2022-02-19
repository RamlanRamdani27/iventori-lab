<?php
Class Ambil extends CI_Controller{
    
    function __construct() {
        parent::__construct();
       
        $this->load->library('upload');
        $this->load->helper(array('form','url'));
        $this->load->library('FPDF');
            define('FPDF_FONTPATH',  $this->config->item('fonts_path'));
        $this->load->model('ambil_model');
        $this->load->model('ruangan_model');
        
        if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
         
    }

    public function index(){
        $a['title']="Ambil Barang";
        $a['isi']='ambilbarang';
        $a['ruangan']=$this->ruangan_model->tampil();
        $a['row']=$this->ambil_model->tampil();
        $this->load->view('template',$a);
    }

    public function ambil()
    {
        $id=$this->uri->segment(3);
        
        
        $idbarang=$id;

        $idpelanggan=$this->session->userdata('SESS_USERNAME');
        $qty=1;
        $this->ambil_model->fill_data($idbarang,$idpelanggan,$qty);
        if ($this->ambil_model->insert_data()) {
            echo "<script>alert('Berhasil Ditambahkan');window.location='".base_url()."Ambil'</script>";
        }
    }
    public function display(){
        $pelanggan=$this->session->userdata('SESS_USERNAME');
        $a['title']="Display Barang yang Mau Di Ambil";
        $a['isi']='displayker';
        $a['barang']=$this->ambil_model->get_all_data_($pelanggan);
        $a['ruangan']=$this->ruangan_model->tampil();
        $this->load->view('template', $a);
    }

        public function hapus(){

        $id  = $this->uri->segment(3);
        $where  = array('kodebarang'=>$id);
        $this->ambil_model->get_delete($where); 
        echo "<script>alert(' Data Berhasil Di hapus');</script>";
        redirect('Ambil/display','refresh');

   }

   function proses_transaksi(){
       
        $kode=$this->ambil_model->buat_kode_tr();
        $this->ambil_model->fill_cok($kode);
        if ($this->ambil_model->insert_co($kode)) {
            echo "<script>alert('Sukses');window.location='".base_url()."Template'</script>";
        }
    }


    public function printdata()
    {
        $id=$this->uri->segment(3);
        $idkeluar=$id;
        $idpelanggan=$this->session->userdata('SESS_USERNAME');
        $data['data_gallery']= $this->ambil_model->cetak($idkeluar,$idpelanggan);
        $this->load->view('cetakhasil',$data);
       
    }

}