<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class masuk_model extends CI_Model
{

	function __construct()
		{
			parent::__construct();
		}

		function buat_kode_tr(){
		$this->db->select('RIGHT(tbmasuk.nomasuk,6) as kode', FALSE);
		$this->db->order_by('nomasuk', 'desc');
		$query=$this->db->get('tbmasuk');
		if ($query->num_rows() <> 0) {
			$data =$query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 6,"0",STR_PAD_LEFT);
		$kodejadi='NM'.date('ym').$kodemax;
		return $kodejadi;
		}

		function save($data){
			$insert=$this->db->insert('tbmasuk',$data);
			return $insert;
		}



		function kodemasuk(){
			$kode=$this->session->userdata('SESS_USERNAME');
			$this->db->where('kodelogin',$kode );
			$this->db->where('tglinput=date(now())');
			$query=$this->db->get('tbmasuk');
			 if ($query->num_rows() == 1) {
            return $query->row();
           }
			
		}

		function savedetail($data){
			$insert=$this->db->insert('tbdetailmasuk',$data);
			return $insert;
		}

		function daftarbarang(){
			
			$this->db->from('tbmasuk');
			$this->db->join('tblogin','tbmasuk.kodelogin=tblogin.kodelogin','LEFT');
			$this->db->order_by('nomasuk', 'desc');
			$query=$this->db->get();
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
		}

		function get_byimage($where) {
       
		$this->db->from('tbdetailmasuk');
		
		$this->db->join('tbbarangg','tbbarangg.kodebarang=tbdetailmasuk.kodebarang','LEFT');
		$this->db->join('tbmerek','tbmerek.kodemerek=tbbarangg.kodemerek','LEFT');
        $this->db->where($where);
        $query = $this->db->get();
 
        if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
		}

		public function get_delete($where){
		    $this->db->trans_start();
		    $this->db->select('nomasuk');
		    $this->db->from('tbmasuk');
		    $this->db->where('nomasuk',$where);
		    $query = $this->db->get();
		    $detailmasuk = $query->row();

		         $this->db->where('nomasuk',$where);
		         $hps = $this->db->delete('tbmasuk');
		      if($hps){
		      		$this->db->select('kodebarang');
				    $this->db->from('tbdetailmasuk');
				   	$this->db->where('nomasuk', $detailmasuk->nomasuk);
				    $query = $this->db->get();
				    $kartustok = $query->row();

		          	 $this->db->where('nomasuk', $detailmasuk->nomasuk);
		             $hpsdetailmasuk = $this->db->delete('tbdetailmasuk');
		             // if ($hpsdetailmasuk) {
		             // 	$this->db->where('kodebarang', $kartustok->kodebarang);
		             // 	$hpsdetailmasuk = $this->db->delete('tbkartustok');
		             // }
		        }

		      $this->db->trans_complete();
		      return $this->db->trans_status();
		    }


		    function kartustok(){
		    	$this->db->from('tbkartustok');
			$this->db->join('tbbarangg','tbbarangg.kodebarang=tbkartustok.kodebarang','LEFT');
			$this->db->join('tbmerek','tbmerek.kodemerek=tbbarangg.kodemerek','LEFT');
			$query=$this->db->get();
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
		    }

}
?>