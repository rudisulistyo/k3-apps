<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_bahaya extends CI_Model {

	function getareaasc(){
		$query=$this->db->query("SELECT * FROM area ORDER BY namaarea ASC");
		return $query->result();
	}
	function getarea(){
		$query=$this->db->query("SELECT * FROM area");
		return $query->result();
	}
	function bahayadb($idarea,$ketr){
		$nip=$this->session->userdata('ses_id');
		$this->db->query("INSERT INTO areabahaya (IDArea,NIP,keterangan) VALUES ('$idarea','$nip','$ketr')");
	}
	function getlistlap(){
        $query = $this->db->query("SELECT  area.namaarea, COUNT(areabahaya.IDArea) AS jumlah FROM areabahaya, area WHERE area.IDArea=areabahaya.IDArea GROUP BY areabahaya.IDArea");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
	function hapus($id,$nip){
		$this->db->query("UPDATE areabahaya SET approve='1' WHERE IDArea='$id' AND NIP='$nip'");
		//$query = $this->db->query("DELETE FROM areabahaya WHERE IDArea='$id' AND keterangan='$ket' AND NIP='$nip'");
	}
	function editarea($idarea,$area){
		$query=$this->db->query("SELECT * FROM area WHERE IDArea='$idarea' LIMIT 1");
		if($query->num_rows()==0){ //insert
			$this->db->query("INSERT INTO area (IDArea,namaarea) VALUES ('$idarea','$area')");
		}else{ //update
			$this->db->query("UPDATE area SET namaarea='$area' WHERE IDArea='$idarea'");
		}
	}
}
