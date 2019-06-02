<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_obs extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('m_obs');
	}
	public function editobs(){
		if(isset($_POST['idobs'])){
			$this->m_obs->editobs($this->input->post('idobs'),$this->input->post('nip'),$this->input->post('observasi'),$this->input->post('status'));
		}
		$this->data['listobs']=$this->m_obs->getlistobs();
		$this->data['listuser']=$this->m_obs->getuser();
		$this->data['gidobs']=$this->m_obs->getidobs()->row_array();
		$this->data['listatus']=$this->m_obs->getstatus();
		$this->data['listdiv']=$this->m_obs->getdivisi();
		$this->load->view('v_obs',$this->data);
	}
	public function editobsadm(){
		if(isset($_POST['idobs'])){
			$this->m_obs->obsapprove($this->input->post('idobs'),$this->input->post('nip'),$this->input->post('status'));
		}
		$this->data['listobs']=$this->m_obs->getlistobsadm();
		$this->load->view('v_obs',$this->data);
	}
}