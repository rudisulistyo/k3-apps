<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

	function getlogin($username,$password){
		$query=$this->db->query("SELECT * FROM user WHERE NIP='$username' AND pass=MD5('$password') AND level<=3 LIMIT 1");
		return $query;
	}
	function getnip($nip){
		$query=$this->db->query("SELECT * FROM user WHERE NIP='$nip' LIMIT 1");
		return $query;
	}
	function getrank(){
		//$query=$this->db->query("SELECT x.nip,x.nama,x.nilai, x.durasi,COALESCE(v.poin,0) AS poin,(x.nilai-COALESCE(v.poin,0)) AS total FROM (select u.nip,u.nama,u.level, h.nilai, h.durasi from user u, hasilquiz h WHERE u.NIP=h.NIP) x LEFT JOIN (SELECT o.nip,SUM(s.poin) AS poin FROM observasi o, status s WHERE o.status=s.idstat GROUP BY o.nip) AS V ON x.NIP=v.nip WHERE x.level=3 GROUP BY x.NIP ORDER BY total DESC");
		$query=$this->db->query("SELECT x.nip,x.nama,x.nilai, x.durasi,COALESCE(v.poin,0) AS poin,((x.nilai*0.4)+(COALESCE(v.poin,0)*0.6)) AS total FROM (select u.nip,u.nama,u.level, h.nilai, h.durasi from user u, hasilquiz h WHERE u.NIP=h.NIP) x LEFT JOIN (SELECT o.nip,SUM(s.poin) AS poin FROM observasi o, status s WHERE o.status=s.idstat GROUP BY o.nip) AS V ON x.NIP=v.nip WHERE x.level=3 GROUP BY x.NIP ORDER BY total DESC");
		return $query->result();
	}
	function getareal(){
		$query=$this->db->query("SELECT user.NIP, user.nama, area.IDArea, area.namaarea, areabahaya.keterangan FROM user, areabahaya, area WHERE user.NIP=areabahaya.NIP AND area.IDArea=areabahaya.IDArea AND areabahaya.approve='0'");
		return $query->result();
	}
	function daftar($nip,$nama,$pass,$lvl){
		$this->db->query("INSERT INTO user (NIP,nama,pass,level) VALUES ('$nip','$nama',MD5('$pass'),'$lvl')");
		$this->db->query("INSERT INTO userquiz (iduser,quiz) VALUES ('$nip','3')");
	}
	function getinfo(){
		$query=$this->db->query("SELECT info FROM general LIMIT 1");
		return $query->result();
	}
	function updateinfo($info){
		$this->db->query("UPDATE general SET info='$info' WHERE 1");
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
	function editdivisi($iddivisi,$divisi){
		$query=$this->db->query("SELECT * FROM divisi WHERE iddiv='$iddivisi' LIMIT 1");
		if($query->num_rows()==0){ //insert
			$this->db->query("INSERT INTO divisi (iddiv,divisi) VALUES ('$iddivisi','$divisi')");
		}else{ //update
			$this->db->query("UPDATE divisi SET divisi='$divisi' WHERE iddiv='$iddivisi'");
		}
	}
}
