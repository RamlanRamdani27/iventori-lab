<?php
Class ruangan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('ruangan_model');
        $this->load->helper('url');
        if ($this->session->userdata('SESS_USERNAME')==null) {
			redirect('Login/index','refresh');
		}
    }
    
    function index(){
        //$this->load->view('template');
        $this->load->helper('url');

        $a['title']="Ruangan";
		$a['isi']="ruangan";
		$a['ruangan']=$this->ruangan_model->tampil();
		$a['kode']=$this->ruangan_model->buat_kode_tr();
		$this->load->view('template', $a);
    }

	public function ajax_edit($id)
	{
		$data = $this->ruangan_model->get_by_id($id);
		// $data->tanggalmasuk = ($data->tanggalmasuk == '0000-00-00') ? '' : $data->tanggalmasuk; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'koderuangan' => $this->input->post('koderuangan'),
				'namaruangan' => $this->input->post('namaruangan'),
				
				
			);
		$insert = $this->ruangan_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'koderuangan' => $this->input->post('koderuangan'),
				'namaruangan' => $this->input->post('namaruangan'),
				
			);
		$this->ruangan_model->update(array('koderuangan' => $this->input->post('koderuangan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->ruangan_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('koderuangan') == '')
		{
			$data['inputerror'][] = 'koderuangan';
			$data['error_string'][] = 'Kode Ruangan Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('namaruangan') == '')
		{
			$data['inputerror'][] = 'namaruangan';
			$data['error_string'][] = 'Nama Ruangan Kosong';
			$data['status'] = FALSE;
		}


		

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}