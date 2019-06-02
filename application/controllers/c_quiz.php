<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_quiz extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function soal(){
		$this->load->model('m_quiz');
		$this->data['soal']=$this->m_quiz->getsoal();
		$qt = $this->m_quiz->gettime();//minute
		$qtt = $qt->row_array();
		$time_allowed = $qtt['quiztime']*60; //convert to seconds
		$this->session->set_userdata('time_allowed',$time_allowed);
		$this->load->view('v_quiz',$this->data);
	}
	public function editsoal(){
		$this->load->model('m_quiz');
		if(isset($_POST['soal'])){
			$gambar=$this->input->post('gbr');
			$this->m_quiz->editsoal($this->input->post('idsoal'),$this->input->post('soal'),$this->input->post('bobot'),$gambar,$this->input->post('jawaban'),$this->input->post('pilihan1'),$this->input->post('pilihan2'),$this->input->post('pilihan3'),$this->input->post('quiz'));
			$this->m_quiz->doupload();
		}
		//$data['images']='gdfdfgdfgdf';
		$this->data['soal']=$this->m_quiz->geteditsoal();
		//$this->data['images']=$this->m_quiz->geteditsoal();
		$this->data['idsquiz']=$this->m_quiz->getsoalq();
		$this->data['qtime']=$this->m_quiz->gettime()->row_array();//minute
		
		$this->load->view('v_soal',$this->data);
		// tambahkan bobot - setiap bobot memiliki interval
		
		
	}
	
	public function userquiz(){
		$this->load->model('m_quiz');
		$this->load->model('m_login');
		if(isset($_POST['nip'])){
			$this->m_quiz->userquiz($this->input->post('nip'),$this->input->post('quiz'),$this->input->post('divisi'));}
		$this->data['user']=$this->m_quiz->getuser();
		$this->data['lasrst']=$this->m_quiz->getrst()->row_array();
		$this->data['listdiv']=$this->m_login->getdivisi();
		$this->load->view('v_userquiz',$this->data);
	}
	public function resetquiz(){
		$this->load->model('m_quiz');
		$this->m_quiz->resetquiz();
		redirect('c_quiz/userquiz');
	}
	public function mulai(){
		$this->load->model('m_quiz');
		$this->data['try']=$this->m_quiz->gettry($this->session->userdata('ses_id'));
		$this->load->view('v_quizstart',$this->data);
	}
	public function hasil(){
		$this->load->model('m_quiz');
		$num=$this->m_quiz->getnumsoal();
		$nip=$this->session->userdata('ses_id');
		//$durasi=$this->input->post('durasi'); // variable durasi
		$durasi=time() - ($this->input->post('durasi'));
		$skor=0;
		
		$this->m_quiz->hapusnilai($nip);
		for($idsoal=0;$idsoal<$num;$idsoal++){ //loop
			$jawaban=$this->input->post($idsoal);
			$cek=$this->m_quiz->koreksi($idsoal,$jawaban);
			$nilai=$this->m_quiz->bobotmu($idsoal);
			if($cek->num_rows() > 0){ //jika jawaban benar 
				$this->m_quiz->nilaidb($idsoal,$nip,$nilai); // perhitungan skor
				$skor=$skor+$nilai;
				
			}else{
				$this->m_quiz->nilaidb($idsoal,$nip,0);
			}
		} //endloop
		
		//update hasil ke db
		
		$this->m_quiz->hasildb($nip,$skor,$durasi);
		//akses peringkat
		$rank=$this->m_quiz->peringkat($nip);
		$rank=$rank->row_array();
		$data['nilai']=$skor;
		$data['peringkat']=$rank['rank'];
		//$data['mulai']=$mulai;
		$data['durasi']=$durasi;
		$this->load->view('v_quizend',$data);
	}
	public function edittime(){
		
		$this->load->model('m_quiz');
		$this->m_quiz->updatetime($this->input->post('quistime'),$this->input->post('quisaktif'));
		redirect('c_quiz/editsoal');
	}
}
