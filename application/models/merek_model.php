<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class merek_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function buat_kode_tr(){
		$this->db->select('RIGHT(tbmerek.kodemerek,6) as kode', FALSE);
		$this->db->order_by('kodemerek', 'desc');
		$query=$this->db->get('tbmerek');
		if ($query->num_rows() <> 0) {
			$data =$query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 6,"0",STR_PAD_LEFT);
		$kodejadi='MK'.date('ym').$kodemax;
		return $kodejadi;
	}


	public function get_by_id($id)
	{
		$this->db->from('tbmerek');
		$this->db->where('kodemerek',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert('tbmerek', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('tbmerek', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('kodemerek', $id);
		$this->db->delete('tbmerek');
	}

	function tampil(){
		$this->db->order_by('kodemerek', 'asc');
		$query= $this->db->get('tbmerek');
		if ($query->num_rows() > 0){
			return $query->result();
		}
		else {
			return FALSE;
		}
	}


}
