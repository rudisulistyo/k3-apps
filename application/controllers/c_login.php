<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	function index(){
		if(null !== $this->session->flashdata('msg')){
			$this->load->view('v_login');
		}else{
			$this->data['info']=$this->m_login->getinfo();
			$this->load->view('v_login',$this->data);}
	}
	public function auth(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		
		$cek=$this->m_login->getlogin($username,$password);
		if($cek->num_rows() > 0){ //jika login berhasil
                $data=$cek->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses',$data['level']);
                $this->session->set_userdata('ses_id',$data['NIP']);
                $this->session->set_userdata('ses_nama',$data['nama']);
				redirect('page');
        }else{  // jika username dan password tidak ditemukan atau salah
            $url=base_url();
            echo $this->session->set_flashdata('msg','NIP atau Password Salah');
            redirect($url);
		}
	}
	function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
	public function daftar(){
		$salah=false;
		$nip=$this->input->post('nip');
		$nama=$this->input->post('nama');
		$pass=$this->input->post('pass');
		$pass2=$this->input->post('pass2');
		$lvl=3;
		$cek=$this->m_login->getnip($nip);
		if($cek->num_rows()>0){
            $this->session->set_flashdata('msg','NIP sudah ada');
			$salah=true;
        }if($pass!=$pass2){
            $this->session->set_flashdata('msg2','Password harus sama');
			$salah=true;
        }if($salah){
			$this->session->set_flashdata('nip',$nip);
			$this->session->set_flashdata('nama',$nama);
			redirect('page/daftar');
		}
		$this->m_login->daftar($nip,$nama,$pass,$lvl);
		redirect('c_quiz/userquiz');
	}
	public function info(){
		if(isset($_POST['info'])){
			$this->m_login->updateinfo($this->input->post('info'));
		}
		$this->data['infos']=$this->m_login->getinfo();
		$this->load->view('v_editinfo',$this->data);
	}
	public function editdivisi(){
		$this->load->model('m_login');
		if(isset($_POST['divisi'])){
			$this->m_login->editdivisi($this->input->post('iddivisi'),$this->input->post('divisi'));}
		$this->data['divs']=$this->m_login->getdivisi();
		$this->load->view('v_divisi',$this->data);
	}
}
