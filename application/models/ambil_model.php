<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class ambil_model extends CI_Model
{

	function __construct()
		{
			parent::__construct();
		}

		function tampil() {
       
		$this->db->from('tbdetailmasuk');
		
		$this->db->join('tbbarangg','tbbarangg.kodebarang=tbdetailmasuk.kodebarang','LEFT');
		$this->db->join('tbmerek','tbmerek.kodemerek=tbbarangg.kodemerek','LEFT');
        
        $query = $this->db->get();
 
        if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
		}

		function fill_data($idbarang,$idpelanggan,$qty)
	{
		$this->data= array(
			'tanggal' => date('y/m/d'),
			'kodelogin' => $idpelanggan,
			'kodebarang' => $idbarang,
			'qty' => $qty,
			
			);
	}
	function insert_data()
	{
		$insert=$this->db->insert('tmp_keluar', $this->data);
		return $insert;
	}

	function get_all_data_($pelanggan){
		$query=$this->db->query("SELECT tmp_keluar.*,tbbarangg.*, tbmerek.*,tblogin.* FROM tmp_keluar, tbbarangg,tbmerek,tblogin
			WHERE tmp_keluar.kodebarang=tbbarangg.kodebarang AND tbmerek.kodemerek=tbbarangg.kodemerek AND tblogin.kodelogin=tmp_keluar.kodelogin  AND tmp_keluar.kodelogin='$pelanggan'");
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	 function get_delete($where){
       $this->db->where($where);
       $this->db->delete('tmp_keluar');
       return TRUE;
    }


    function buat_kode_tr(){
		$this->db->select('RIGHT(tbbarangkeluar.nokeluar,6) as kode', FALSE);
		$this->db->order_by('nokeluar', 'desc');
		$query=$this->db->get('tbbarangkeluar');
		if ($query->num_rows() <> 0) {
			$data =$query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 6,"0",STR_PAD_LEFT);
		$kodejadi='NK'.date('ym').$kodemax;
		return $kodejadi;
		}

	function get_all_data_pelanggan($pelanggan){
		$query=$this->db->query("SELECT tmp_keluar.*,tbbarangg.*, tbmerek.*,tblogin.* FROM tmp_keluar, tbbarangg,tbmerek,tblogin
			WHERE tmp_keluar.kodebarang=tbbarangg.kodebarang AND tbmerek.kodemerek=tbbarangg.kodemerek AND tblogin.kodelogin=tmp_keluar.kodelogin  AND tmp_keluar.kodelogin='$pelanggan'");
		if ($query->num_rows()>0) {
			return $query->result();
		}
		else{
			return FALSE;
		}
	}

	function fill_cok($kode){
		$pelanggan=$this->session->userdata('SESS_USERNAME');
		$ambil=$this->get_all_data_pelanggan($pelanggan);
		foreach ($ambil as $key => $row);
		$total=0;
		$total +=$row->qty;
		$this->datapemesan=array(
			'nokeluar'=>$kode,
			'kodelogin'=>$this->session->userdata('SESS_USERNAME'),
			'tanggalkeluar'=>date('Y/m/d'),
			'totalbarangkeluar'=>$total,
			);
	}

	function insert_co($kode){
		$this->db->trans_start();
		$pelanggan=$this->session->userdata('SESS_USERNAME');
		$insert=$this->db->insert('tbbarangkeluar', $this->datapemesan);
		if($insert){
			$ambil=$this->get_all_data_pelanggan($pelanggan);
			foreach ($ambil as $key => $row) {

				$this->datarinci=array(
					'nokeluar'=>$kode,
					'kodebarang'=>$row->kodebarang,
					'koderuangan'=>$this->input->post('koderuangan'),
					'qty'=>$row->qty
					);

				$insert=$this->db->insert('tbdetailbarangkeluar', $this->datarinci);
			}
			$this->db->where('kodelogin', $pelanggan);
			$delete=$this->db->delete('tmp_keluar');
		}

		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	function cetak($idkeluar,$idpelanggan){
	
		$this->db->from('tbbarangkeluar');
			$this->db->join('tblogin','tbbarangkeluar.kodelogin=tblogin.kodelogin','LEFT');
			$this->db->join('tbdetailbarangkeluar','tbbarangkeluar.nokeluar=tbdetailbarangkeluar.nokeluar','LEFT');
			$this->db->join('tbbarangg','tbdetailbarangkeluar.kodebarang=tbbarangg.kodebarang','LEFT');
			$this->db->join('tbmerek','tbbarangg.kodemerek=tbmerek.kodemerek','LEFT');
			$this->db->join('tbruangan','tbdetailbarangkeluar.koderuangan=tbruangan.koderuangan','LEFT');
			$this->db->where('tblogin.kodelogin',$idpelanggan);
			$this->db->where('tbbarangkeluar.nokeluar',$idkeluar);
			$query=$this->db->get();
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
	} 




}