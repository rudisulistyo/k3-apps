<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Welcome to K3</title>
	<link href="<?php echo base_url().'assets/css/style1.css'?>" rel="stylesheet">
</head>
<body>
	<?php $this->load->view('v_main');?>
<div id="container">
        
        <div id="body"> 
			<h1 >Observasi Pegawai</h1> 
			<table id="t01">
			  <tr>
				<th>NIP</th>
				<th>Nama</th> 
				<th>Divisi</th>
				<th>Observasi</th>
				<th>Status</th>
				<th>Tanggal</th>
				<th>Pilihan</th>
			  </tr>
			<?php if($this->session->userdata('akses')=='2'){ ?>
			
			<?php $nom=0;$id=$this->uri->segment(3);
        	foreach($listobs as $row) { 
				if($nom==$id){?>
				<form method="post" action="<?php echo base_url().'index.php/c_obs/editobs'?>">
					<input type="hidden" name="idobs" value="<?=$row->idobs?>">
				<tr>
					<td><input type="hidden" name="nip" value="<?=$row->nip?>"> <?=$row->nip?> </td>
					<td><input type="hidden" name="nama" value="<?=$row->nama?>"> <?=$row->nama?> </td> 
					<td><input type="hidden" name="divisi" value="<?=$row->divisi?>"> <?=$row->divisi?></td>
					<td><input type="text" name="observasi" value="<?=$row->observasi?>" size="50"></td>
					<td><select name="status">
					<?php foreach($listatus as $rrow){ ?>
					<option value="<?=$rrow->idstat?>" <?php if($row->status==$rrow->status){echo 'selected';}?> ><?=$rrow->status ?></option>
					<?php }?>
					</select></td>
					<td><?=$row->tgl?></td>
					<td id="btn"><input type="submit" class="btnsave" value="Simpan" ></td>
			  	</tr>
				</form>
				<?php $nom++; continue;}?>
			  <tr>
				<td width="20px"><?=$row->nip?></td>
				<td width="20px"><?=$row->nama?></td> 
				<td width="20px"><?=$row->divisi?></td>
				<td width="30px"><?=$row->observasi?></td>
				<td width="60px"><?=$row->status?></td>
				<td width="80px"><?=$row->tgl?></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_obs/editobs/'.$nom ?>" id="edit">Ubah</a></td>
				  
			  </tr>
			<?php $nom++;} ?>
				<form method="post" action="<?php echo base_url().'index.php/c_obs/editobs'?>">
					<input type="hidden" name="idobs" value="<?=$gidobs['idobs']?>">
				<tr>
					<td colspan="3" ><select name="nip" style="width: 150px"  ><?php foreach($listuser as $usrow){ ?>
					<option value="<?=$usrow->NIP ?>">
					<?=$usrow->NIP ?>&emsp;<?=$usrow->nama ?>&emsp;<?=$usrow->divisi ?>&emsp;
					
					</option>
					<?php }?></select></td> 
					<td><input type="text" name="observasi" value="" size="50"></td>
					<td><select name="status">
					<?php foreach($listatus as $rrow){ ?>
					<option value="<?=$rrow->idstat?>"><?=$rrow->status ?></option>
					<?php }?>
					</select></td>
					<td> </td>
					<td id="btn"><input type="submit" class="btnsave" value="Tambah" ></td>
			  	</tr>
				</form>
			<?php }else if($this->session->userdata('akses')=='1'){ ?>
				
			<?php $nom=0;$id=$this->uri->segment(3);
        	foreach($listobs as $row) { 
				if($nom==$id){?>
				<form method="post" action="<?php echo base_url().'index.php/c_obs/editobsadm'?>">
					<input type="hidden" name="idobs" value="<?=$row->idobs?>">
				<tr>
					<td><input type="hidden" name="nip" value="<?=$row->nip?>"> <?=$row->nip?> </td>
					<td><input type="hidden" name="nama" value="<?=$row->nama?>"> <?=$row->nama?> </td>
					<td><input type="hidden" name="divisi" value="<?=$row->divisi?>"> <?=$row->divisi?></td>
					<td><input type="hidden" name="observasi" value="<?=$row->observasi?>"> <?=$row->observasi?></td>
					<td><input type="hidden" name="status" value="<?=$row->status?>"> <?=$row->status?> </td>
					<td><?=$row->tgl?></td>
					<td id="btn"><input type="submit" class="btnsave" value="Setuju" ></td>
			  	</tr>
				</form>
				<?php $nom++; continue;}?>
			  <tr>
				<td><?=$row->nip?></td>
				<td><?=$row->nama?></td> 
				<td><?=$row->divisi?></td>
				<td><?=$row->observasi?></td>
				<td width="60px"><?=$row->status?></td>
				<td><?=$row->tgl?></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_obs/editobsadm/'.$nom ?>" id="edit">Pilih</a></td>
			  </tr>
			<?php $nom++;}  ?>
			
			<?php } ?>
			</table>
			<br>
        </div>
        </div> <!-- /container -->
</body>
</html>