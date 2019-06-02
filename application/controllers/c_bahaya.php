<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_bahaya extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function listbhy(){
		$this->load->model('m_login');
		$this->data['areab']=$this->m_login->getareal();
		$this->load->view('v_listbahaya',$this->data);
	}
	public function inputbhy(){
		$this->load->model('m_bahaya');
		$this->data['area']=$this->m_bahaya->getareaasc();
		$this->load->view('v_inputbahaya',$this->data);
	}
	public function bahayap(){
		$this->load->model('m_bahaya');
		$idarea=$this->input->post('areac');
		$ketr=$this->input->post('message');
		$this->m_bahaya->bahayadb($idarea,$ketr);
		redirect('page');
	}
	public function hapuslap(){
		$this->load->model('m_bahaya');
		$id=$this->input->post('id');
		$ket=$this->input->post('ket');
		$nip=$this->input->post('nip');
		$this->m_bahaya->hapus($id,$nip);
		redirect('c_bahaya/listbhy');
	}
	public function editarea(){
		$this->load->model('m_bahaya');
		if(isset($_POST['area'])){
			$this->m_bahaya->editarea($this->input->post('idarea'),$this->input->post('area'));}
		$this->data['area']=$this->m_bahaya->getarea();
		$this->load->view('v_area',$this->data);
	}
}
