<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_bahaya');
    }
    function index(){
        $x['data']=$this->m_bahaya->getlistlap();
        $this->load->view('v_grafik',$x);
    }
}