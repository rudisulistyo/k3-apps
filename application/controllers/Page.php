<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
	$this->load->model('m_login');
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }

  function index(){
	$this->load->model('m_quiz2');
	$this->load->model('m_quiz');
	$this->data['ranking']=$this->m_login->getrank();
	$this->data['bobotsoal']=$this->m_quiz->bobotsoal();
	$this->load->model('m_bahaya');
	$this->data['grafb']=$this->m_bahaya->getlistlap();
	$this->load->view('v_dashboard',$this->data);
  }

  function areabahaya(){
    // function ini hanya boleh diakses oleh admin dan super
    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
      redirect('c_bahaya/listbhy');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function obs(){
    // function ini hanya boleh diakses oleh admin dan super
    if($this->session->userdata('akses')=='1'){
      redirect('c_obs/editobsadm');
	}else if($this->session->userdata('akses')=='2'){
	  redirect('c_obs/editobs');
	}else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function daftar(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='1'){
      $this->load->view('v_daftar');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function soal(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='1'){
      redirect('c_quiz/editsoal');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function soal2(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='1'){
      redirect('c_quiz2/editsoal');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function userquiz(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='1'){
      redirect('c_quiz/userquiz');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function userquiz2(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='1'){
      redirect('c_quiz2/userquiz');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function info(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='1'){
      redirect('c_login/info');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function tes(){
    // function ini hanya boleh diakses oleh pegawai
    if($this->session->userdata('akses')=='3'){
	redirect('c_quiz/mulai');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function tes2(){
    // function ini hanya boleh diakses oleh pegawai
    if($this->session->userdata('akses')=='3'){
	redirect('c_quiz2/mulai');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function lapor(){
    // function ini hanya boleh diakses oleh pegawai
    if($this->session->userdata('akses')=='3'){
      redirect('c_bahaya/inputbhy');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
}
