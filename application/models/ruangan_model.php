<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruangan_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function buat_kode_tr(){
		$this->db->select('RIGHT(tbruangan.koderuangan,6) as kode', FALSE);
		$this->db->order_by('koderuangan', 'desc');
		$query=$this->db->get('tbruangan');
		if ($query->num_rows() <> 0) {
			$data =$query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 6,"0",STR_PAD_LEFT);
		$kodejadi='RG'.date('ym').$kodemax;
		return $kodejadi;
	}


	public function get_by_id($id)
	{
		$this->db->from('tbruangan');
		$this->db->where('koderuangan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('tbruangan', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('tbruangan', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('koderuangan', $id);
		$this->db->delete('tbruangan');
	}

	function tampil(){
		$this->db->order_by('koderuangan', 'asc');
		$query= $this->db->get('tbruangan');
		if ($query->num_rows() > 0){
			return $query->result();
		}
		else {
			return FALSE;
		}
	}


}
