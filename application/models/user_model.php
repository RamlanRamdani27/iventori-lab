<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class user_model extends CI_Model
{
	var $data;
	var $tabel='tblogin';
	function __construct(){
		parent::__construct();
	}
	function cekusername($Username){
		$this->db->select('username');
		$this->db->where('username', $Username);
		$this->db->from($this->tabel);
		$query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
	}

	function fill_data($foto){
		$this->data=array(
			
			'username'=>$this->input->POST('username'),
			'password'=>md5($this->input->POST('password')),
			'gambar'=>$foto,
			'namalengkap'=>$this->input->POST('namalengkap'),
			'level'=>$this->input->POST('level'),
			
			);
	}

	function insert_data(){
		$insert=$this->db->insert($this->tabel,$this->data);
		return $insert;
	}

	function tampiluser(){
	
		$query=$this->db->get($this->tabel);
		if($query->num_rows() > 0){
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
        
        $this->db->where($where);
        $query = $this->db->get($this->tabel);
 
        //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }


    function get_barangkeluar($where) {
       
        $this->db->where($where);
        $query = $this->db->get('tbbarangkeluar');
 
        //cek apakah ada data
        if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
    }
}

 ?> 