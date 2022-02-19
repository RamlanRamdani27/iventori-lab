<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Template_model extends CI_Model
{
	function __construct(){
		parent::__construct();
	}

	function masuk(){
	
		$this->db->from('tbmasuk');
			$this->db->join('tblogin','tbmasuk.kodelogin=tblogin.kodelogin','LEFT');
			$this->db->join('tbdetailmasuk','tbmasuk.nomasuk=tbdetailmasuk.nomasuk','LEFT');
			$this->db->join('tbbarangg','tbdetailmasuk.kodebarang=tbbarangg.kodebarang','LEFT');
			$this->db->join('tbmerek','tbbarangg.kodemerek=tbmerek.kodemerek','LEFT');
			$this->db->order_by('tbmasuk.nomasuk', 'desc');
			$query=$this->db->get();
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
	}


	function keluar(){
	
		$this->db->from('tbbarangkeluar');
			$this->db->join('tblogin','tbbarangkeluar.kodelogin=tblogin.kodelogin','LEFT');
			$this->db->join('tbdetailbarangkeluar','tbbarangkeluar.nokeluar=tbdetailbarangkeluar.nokeluar','LEFT');
			$this->db->join('tbbarangg','tbdetailbarangkeluar.kodebarang=tbbarangg.kodebarang','LEFT');
			$this->db->join('tbmerek','tbbarangg.kodemerek=tbmerek.kodemerek','LEFT');
			$this->db->order_by('tbbarangkeluar.nokeluar', 'desc');
			$query=$this->db->get();
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
	}

}