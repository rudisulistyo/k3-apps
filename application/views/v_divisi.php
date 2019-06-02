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
			<h1>Ubah/Tambah Divisi</h1>
			<table id="t01">
			  <tr>
				<th>IDDivisi</th>
				<th>Nama Divisi</th>
				<th>Pilihan</th>
			  </tr>
			<?php $nom=0;$id=$this->uri->segment(3);
        	foreach($divs as $row) { 
				if($nom==$id){?>
				<form method="post" action="<?php echo base_url().'index.php/c_login/editdivisi'?>">
				<tr>
					<td width="15px"><input type="hidden" name="iddivisi" value="<?=$nom?>"> <?=$nom?> </td>
					<td><input type="text" name="divisi" value="<?=$row->divisi?>" size="30"></td>
					<td id="btn"><input type="submit" value="Simpan" class="btnsave"></td>
			  	</tr>
				</form>
				<?php $nom++; continue;}?>
			  <tr>
				<td><?=$nom?></td>
				<td><?=$row->divisi?></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_login/editdivisi/'.$nom ?>" id="edit">Ubah</a></td>
			  </tr>
			<?php $nom++;} 
				if($nom==$id){?>
				<form method="post" action="<?php echo base_url().'index.php/c_login/editdivisi'?>">
				<tr>
				  <td width="15px"><input type="hidden" name="iddivisi" value="<?=$nom?>"> <?=$nom?> </td>
				  <td><input type="text" name="divisi" value="" size="30"></td> 
				  <td id="btn"><input type="submit" value="Simpan" class="btnsave"></td>
			  	</tr>
				</form>
				<?php }else{ ?>
			  <tr>
				<td><?=$nom?></td>
				<td></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_login/editdivisi/'.$nom ?>" id="add">Tambah</a></td>
			  </tr><?php } ?>
			</table>
        	<br>
        </div>
        
        </div> <!-- /container -->


</body>
</html>