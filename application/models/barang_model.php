<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class barang_model extends CI_Model
{
	var $data;
	var $tabel='tbbarangg';
	function __construct(){
		parent::__construct();
	}


	function buat_kode_tr(){
		$this->db->select('RIGHT(tbbarangg.kodebarang,6) as kode', FALSE);
		$this->db->order_by('kodebarang', 'desc');
		$query=$this->db->get('tbbarangg');
		if ($query->num_rows() <> 0) {
			$data =$query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 6,"0",STR_PAD_LEFT);
		$kodejadi='BG'.date('ym').$kodemax;
		return $kodejadi;
	}


	function fill_data($foto){
		$this->data=array(
			'kodebarang'=>$this->input->POST('kodebarang'),
			'nama'=>$this->input->POST('namabarang'),
			'kodemerek'=>$this->input->POST('kodemerek'),
			'gambar'=>$foto,
			'kodelogin'=>$this->session->userdata('SESS_USERNAME'),
			'spesifikasi'=>$this->input->POST('spesifikasi'),
			
			);

		
	}

	function insert_data(){
		$insert=$this->db->insert($this->tabel,$this->data);
		return $insert;
	}
	function tampilgambar(){
		$this->db->select('tbbarangg.kodebarang,tbbarangg.nama,tbbarangg.kodemerek,tbbarangg.gambar,tbbarangg.tanggalinput,tbbarangg.kodelogin,tbbarangg.spesifikasi,tblogin.namalengkap,tbmerek.namamerek');
		$this->db->from('tbbarangg');
		$this->db->join('tbmerek','tbbarangg.kodemerek=tbmerek.kodemerek','LEFT');
		$this->db->join('tblogin','tbbarangg.kodelogin=tblogin.kodelogin','LEFT');
		
		$this->db->order_by('kodebarang', 'desc');
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return FALSE;
		}
	}

	//fungsi update ke database
     function get_update($data,$where){
       $this->db->where($where);
       $this->db->update($this->tabel, $data);
       return TRUE;
    }
 
  //fungsi delete ke database
  function get_delete($where){
       $this->db->where($where);
       $this->db->delete($this->tabel);
       return TRUE;
    }
 
//fungsi untuk menampilkan data per satuan dari tabel database
    function get_byimage($where) {
        $this->db->select('tbbarangg.kodebarang,tbbarangg.nama,tbbarangg.kodemerek,tbbarangg.gambar,tbbarangg.tanggalinput,tbbarangg.kodelogin,tbbarangg.spesifikasi,tblogin.namalengkap,tbmerek.namamerek');
		$this->db->from('tbbarangg');
		$this->db->join('tbmerek','tbbarangg.kodemerek=tbmerek.kodemerek','LEFT');
		$this->db->join('tblogin','tbbarangg.kodelogin=tblogin.kodelogin','LEFT');
        $this->db->where($where);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }
}

 ?> 