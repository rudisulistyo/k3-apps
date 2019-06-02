<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_obs extends CI_Model {

	function getlistobs(){
		$query=$this->db->query("SELECT o.idobs,u.nip,u.nama,d.divisi,o.observasi,s.status,o.tgl FROM user u, observasi o, status s, divisi d,general g WHERE o.status=s.idstat AND d.iddiv=u.iddivisi AND u.NIP=o.nip AND o.approve=0 AND o.tgl>=g.reset ORDER BY o.nip");
		return $query->result();
	}
	function getlistobsadm(){
		$query=$this->db->query("SELECT o.idobs,u.nip,u.nama,d.divisi,o.observasi,s.status,o.tgl FROM user u, observasi o, status s, divisi d,general g WHERE o.status=s.idstat AND d.iddiv=u.iddivisi AND u.NIP=o.nip AND o.approve=0 AND o.tgl>=g.reset ORDER BY o.nip");
		return $query->result();
	}
	function editobs($idobs,$nip,$observasi,$status){
		$query=$this->db->query("SELECT * FROM observasi WHERE idobs='$idobs' LIMIT 1");
		if($query->num_rows()==0){ //insert
			$this->db->query("INSERT INTO observasi (idobs,nip,observasi,status,tgl) VALUES ('$idobs','$nip','$observasi','$status',CURDATE())");
		}else{ //update
			$this->db->query("UPDATE observasi SET nip='$nip',observasi='$observasi',status='$status',tgl=CURDATE() WHERE idobs='$idobs'");
		}
	}
	function obsapprove($idobs,$nip,$status){
		$query=$this->db->query("SELECT * FROM observasi WHERE idobs='$idobs' AND nip='$nip' LIMIT 1");
		if($query->num_rows()==1){
			$this->db->query("UPDATE observasi SET approve='1' WHERE idobs='$idobs'");
			if($status=="Fatality")
				$this->db->query("UPDATE user SET level='4' WHERE nip='$nip'");
			
		}else{ //update
			echo "data observasi tidak ada"; exit();
		}
	}
	function getstatus(){
		$query=$this->db->query("SELECT * FROM status");
		return $query->result();
		$numdata=$query->$query->num_rows();
		if($numdata<1){
			echo "tidak ada data status";
			exit();
		}
	}
	function getdivisi(){
		$query=$this->db->query("SELECT * FROM divisi");
		return $query->result();
		$numdata=$query->$query->num_rows();
		if($numdata<1){
			echo "tidak ada data divisi";
			exit();
		}
	}
	function getuser(){
		$query=$this->db->query("SELECT user.NIP, user.nama, divisi.divisi FROM user,divisi WHERE user.iddivisi=divisi.iddiv AND user.level=3");
		return $query->result();
		$numdata=$query->$query->num_rows();
		if($numdata<1){
			echo "tidak ada data user";
			exit();
		}
	}
	function getidobs(){
		$query=$this->db->query("SELECT MAX(idobs)+1 AS idobs FROM observasi");
		return $query;
	}
}