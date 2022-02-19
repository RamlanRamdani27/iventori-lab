<?php
Class merek extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('merek_model');
        $this->load->helper('url');
        if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
    }
    
    function index(){
        //$this->load->view('template');
        $this->load->helper('url');

        $a['title']="Merek Barang";
		$a['isi']="merek";
		$a['merek']=$this->merek_model->tampil();
		$a['kode']=$this->merek_model->buat_kode_tr();
		$this->load->view('template', $a);
    }

	public function ajax_edit($id)
	{
		$data = $this->merek_model->get_by_id($id);
		// $data->tanggalmasuk = ($data->tanggalmasuk == '0000-00-00') ? '' : $data->tanggalmasuk; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'kodemerek' => $this->input->post('kodemerek'),
				'namamerek' => $this->input->post('namamerek'),
				
				
			);
		$insert = $this->merek_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kodemerek' => $this->input->post('kodemerek'),
				'namamerek' => $this->input->post('namamerek'),
				
			);
		$this->merek_model->update(array('kodemerek' => $this->input->post('kodemerek')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->merek_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kodemerek') == '')
		{
			$data['inputerror'][] = 'kodemerek';
			$data['error_string'][] = 'Kode Merek Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('namamerek') == '')
		{
			$data['inputerror'][] = 'namamerek';
			$data['error_string'][] = 'Nama Merek Kosong';
			$data['status'] = FALSE;
		}


		

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}