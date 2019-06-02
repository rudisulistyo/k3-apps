<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_quiz2 extends CI_Model {

	function getsoal(){
		//$query=$this->db->query("SELECT soalquiz2.* FROM soalquiz2, quiz,(SELECT idquiz FROM quiz ORDER BY RAND() LIMIT 1) AS r WHERE soalquiz2.IDsoal=quiz.idsoal AND quiz.idquiz=r.idquiz");
		$query=$this->db->query("SELECT soalquiz2.* FROM soalquiz2, general WHERE soalquiz2.idquiz=general.quizaktif");
		return $query->result();
		$numdata=$query->$query->num_rows();
		if($numdata<1){
			echo "tidak ada data soal";
			exit();
		}
	}
	function getsoalq(){
		$query=$this->db->query("SELECT idquiz FROM soalquiz2 GROUP BY idquiz ORDER BY idquiz ASC");
		return $query->result();
		$numdata=$query->$query->num_rows();
		if($numdata<1){
			echo "tidak ada data quiz";
			exit();
		}
	}
	function getnumsoal(){
		$this->db->select("IDsoal, soal, jawaban");
		$this->db->from("soalquiz2");
		$query=$this->db->get();
		return $query->num_rows();
	}
	function koreksi($idsoal,$jawaban){
		$query=$this->db->query("SELECT * FROM soalquiz2 WHERE IDsoal='$idsoal' AND jawaban='$jawaban' LIMIT 1");
		return $query;
	}
	function hapusnilai($nip){
		$this->db->query("DELETE FROM nilai WHERE nip='$nip'");
	}
	function nilaidb($idsoal,$nip,$nilai){
		$this->db->query("INSERT INTO nilai(idsoal, nip, nilai) VALUES ('$idsoal','$nip', '$nilai')");
	}
	function bobotsoal(){
		//$query=$this->db->query("SELECT n.idsoal, soalquiz2.soal, n.bobot FROM soalquiz2, nilai, (SELECT idsoal, SUM(nilai)/COUNT(nilai) AS bobot FROM nilai GROUP BY idsoal) AS n WHERE soalquiz2.IDsoal=nilai.idsoal AND nilai.idsoal=n.idsoal GROUP BY idsoal ORDER BY bobot ASC");
		$query=$this->db->query("SELECT idsoal, soal, bobot FROM soalquiz2 ORDER BY idsoal ASC");
		return $query->result();
	}
	
	function bobotmu($idsoal){
		$query=$this->db->query("SELECT bobot FROM soalquiz2 WHERE IDsoal='$idsoal' limit 1");
		$query = $query->row();
		$query = $query->bobot;
		$bobot= $query;
		//$query = $this->db->query($bobot);
		return $bobot;
	}
	function hasildb($nip,$nilai,$durasi){
		$query=$this->db->query("SELECT * FROM hasilquiz WHERE NIP='$nip' LIMIT 1");
		if($query->num_rows()==0){
			//insert    
			$this->db->query("INSERT INTO hasilquiz (NIP,nilai,durasi,tanggal) VALUES ('$nip','$nilai','$durasi',CURDATE())");
		}else{
			//update
			$this->db->query("UPDATE hasilquiz SET NIP='$nip',nilai='$nilai',durasi='$durasi',tanggal=CURDATE() WHERE NIP='$nip'");
		}
		$this->db->query("UPDATE userquiz SET quiz=quiz-1 WHERE iduser='$nip'");
	}
	// Fungsi untuk melakukan proses upload file
	function doupload() { 
         $config['upload_path']   = './images/'; 
         $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
         $config['max_size']      = 100; 
         //$config['max_width']     = 1024; 
         //$config['max_height']    = 768;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error); 
         }
			
         else { 
            $data = $this->upload->data(); 
			$data = array('images' => $this->upload->data());
            //$this->load->view('upload_success', $data); 
         } 
	} 
	function geteditsoal(){
		$query=$this->db->query("SELECT IDsoal,soal,bobot,images,jawaban1, jawaban2, jawaban3, jawaban4, pilihan1,pilihan2,pilihan3,pilihan4 FROM soalquiz2");
		return $query->result();
	}
	function editsoal($idsoal,$soal,$bobot,$images,$jawaban1,$jawaban2,$jawaban3,$jawaban4,$pilihan1,$pilihan2,$pilihan3,$pilihan4){
		$query=$this->db->query("SELECT * FROM soalquiz2 WHERE IDsoal='$idsoal' LIMIT 1");
		if($query->num_rows()==0){ //insert
			$this->db->query("INSERT INTO soalquiz2 (IDsoal,soal,bobot,images,jawaban1,jawaban2,jawaban3,jawaban4,pilihan1,pilihan2,pilihan3,pilihan4) VALUES ('$idsoal','$soal','$bobot', '$images', '$jawaban1', '$jawaban2', '$jawaban3', '$jawaban4','$pilihan1','$pilihan2','$pilihan3','$pilihan4')");
		}else{ //update
		//$images="woooww";
			$this->db->query("UPDATE soalquiz2 SET soal='$soal',bobot='$bobot', images='$images',jawaban1='$jawaban1',jawaban2='$jawaban2',jawaban3='$jawaban4',jawaban1='$jawaban4',pilihan1='$pilihan1',pilihan2='$pilihan2',pilihan3='$pilihan3',pilihan4='$pilihan4' WHERE IDsoal='$idsoal'");
		}
	}
	function getuser(){
		$query=$this->db->query("SELECT user.NIP, user.nama, divisi.divisi, userquiz.quiz FROM user, userquiz, divisi WHERE user.NIP=userquiz.iduser AND user.iddivisi=divisi.iddiv AND user.level=3");
		return $query->result();
		$numdata=$query->$query->num_rows();
		if($numdata<1){
			echo "tidak ada data user";
			exit();
		}
	}
	function peringkat($nip){
		$query=$this->db->query("SELECT * FROM (SELECT @pos:=@pos+1 rank,t.* FROM (SELECT x.nip,x.nama,x.nilai,COALESCE(v.poin,0) AS poin,(x.nilai-COALESCE(v.poin,0)) AS total FROM (select u.nip,u.nama,u.level, h.nilai from user u, hasilquiz h WHERE u.NIP=h.NIP) x LEFT JOIN (SELECT o.nip,SUM(s.poin) AS poin FROM observasi o, status s WHERE o.status=s.idstat GROUP BY o.nip) AS V ON x.NIP=v.nip WHERE x.level=3 GROUP BY x.NIP ORDER BY total DESC) t, (SELECT @pos:=0) r) tabel WHERE tabel.nip='$nip'");
		return $query;
	}
	function resetquiz(){
		$this->db->query("UPDATE userquiz SET quiz='3' WHERE 1");
		$this->db->query("UPDATE general SET reset=CURDATE() WHERE 1");
	}
	function userquiz($nip,$quiz,$divisi){
		$this->db->query("UPDATE userquiz SET quiz='$quiz' WHERE iduser='$nip'");
		$this->db->query("UPDATE user SET iddivisi='$divisi' WHERE NIP='$nip'");
	}
	function gettry($id){
		$query=$this->db->query("SELECT * FROM userquiz WHERE iduser='$id'");
		return $query->result();
	}
	function gettime(){
		$query=$this->db->query("SELECT quiztime,quizaktif FROM general WHERE 1");
		return $query;
	}
	function getrst(){
		$query=$this->db->query("SELECT reset FROM general WHERE 1");
		return $query;
	}
	function updatetime($time,$aktif){
		$this->db->query("UPDATE general SET quiztime='$time',quizaktif='$aktif' WHERE 1");
	}
}
