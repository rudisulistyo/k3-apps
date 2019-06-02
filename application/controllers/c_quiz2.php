<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_quiz2 extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function soal(){
		$this->load->model('m_quiz2');
		$this->data['soal']=$this->m_quiz2->getsoal();
		$qt = $this->m_quiz2->gettime();//minute
		$qtt = $qt->row_array();
		$time_allowed = $qtt['quiztime']*60; //convert to seconds
		$this->session->set_userdata('time_allowed',$time_allowed);
		$this->load->view('v_quiz2',$this->data);
	}
	public function editsoal(){
		$this->load->model('m_quiz2');
		if(isset($_POST['soal'])){
			$gambar=$this->input->post('gbr');
			$this->m_quiz2->editsoal($this->input->post('idsoal'),$this->input->post('soal'),$this->input->post('bobot'),$gambar,$this->input->post('jawaban1'),$this->input->post('jawaban2'),$this->input->post('jawaban3'),$this->input->post('jawaban4'),$this->input->post('pilihan1'),$this->input->post('pilihan2'),$this->input->post('pilihan3'),$this->input->post('pilihan4'));
			$this->m_quiz2->doupload();
		}
		//$data['images']='gdfdfgdfgdf';
		$this->data['soal']=$this->m_quiz2->geteditsoal();
		//$this->data['images']=$this->m_quiz2->geteditsoal();
		$this->data['idsquiz']=$this->m_quiz2->getsoalq();
		$this->data['qtime']=$this->m_quiz2->gettime()->row_array();//minute
		
		$this->load->view('v_soal2',$this->data);
		// tambahkan bobot - setiap bobot memiliki interval
		
		
	}
	
	public function userquiz(){
		$this->load->model('m_quiz2');
		$this->load->model('m_login');
		if(isset($_POST['nip'])){
			$this->m_quiz2->userquiz($this->input->post('nip'),$this->input->post('quiz'),$this->input->post('divisi'));}
		$this->data['user']=$this->m_quiz2->getuser();
		$this->data['lasrst']=$this->m_quiz2->getrst()->row_array();
		$this->data['listdiv']=$this->m_login->getdivisi();
		$this->load->view('v_userquiz',$this->data);
	}
	public function resetquiz(){
		$this->load->model('m_quiz2');
		$this->m_quiz2->resetquiz();
		redirect('c_quiz2/userquiz');
	}
	public function mulai(){
		$this->load->model('m_quiz2');
		$this->data['try']=$this->m_quiz2->gettry($this->session->userdata('ses_id'));
		$this->load->view('v_quizstart2',$this->data);
	}
	public function hasil(){
		$this->load->model('m_quiz2');
		$num=$this->m_quiz2->getnumsoal();
		$nip=$this->session->userdata('ses_id');
		//$durasi=$this->input->post('durasi'); // variable durasi
		$durasi=time() - ($this->input->post('durasi'));
		$skor=0;
		
		$this->m_quiz2->hapusnilai($nip);
		for($idsoal=0;$idsoal<$num;$idsoal++){ //loop
			$jawaban=$this->input->post($idsoal);
			$cek=$this->m_quiz2->koreksi($idsoal,$jawaban);
			$nilai=$this->m_quiz2->bobotmu($idsoal);
			if($cek->num_rows() > 0){ //jika jawaban benar 
				$this->m_quiz2->nilaidb($idsoal,$nip,$nilai); // perhitungan skor
				$skor=$skor+$nilai;
				
			}else{
				$this->m_quiz2->nilaidb($idsoal,$nip,0);
			}
		} //endloop
		
		//update hasil ke db
		
		$this->m_quiz2->hasildb($nip,$skor,$durasi);
		//akses peringkat
		$rank=$this->m_quiz2->peringkat($nip);
		$rank=$rank->row_array();
		$data['nilai']=$skor;
		$data['peringkat']=$rank['rank'];
		//$data['mulai']=$mulai;
		$data['durasi']=$durasi;
		$this->load->view('v_quizend',$data);
	}
	public function edittime(){
		
		$this->load->model('m_quiz2');
		$this->m_quiz2->updatetime($this->input->post('quistime'),$this->input->post('quisaktif'));
		redirect('c_quiz2/editsoal');
	}
}
