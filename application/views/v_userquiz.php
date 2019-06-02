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
			<h1 >User Admin</h1>
			<div class="btn-group">
				<form method="post" action="<?php echo base_url().'index.php/page/daftar' ?>">
						<input type="submit" value="User Daftar" class="button">
				</form>
				<form method="post" action="<?php echo base_url().'index.php/c_quiz/resetquiz/'?>">
					<input type="submit" value="Reset Tes" class="button">
				</form>
				<form method="post" action="<?php echo base_url().'index.php/c_login/editdivisi' ?>">
						<input type="submit" value="Edit Divisi" class="button">
				</form>
				</div><br clear="all">last reset: <?=$lasrst['reset']?><br>
			<table id="t01">
			  <tr>
				<th>NIP</th>
				<th>Nama User</th> 
				<th>Kesempatan Tes</th>
				<th>Divisi</th>
				<th>Pilihan</th>
			  </tr>
			<?php $nom=0;$id=$this->uri->segment(3);
        	foreach($user as $row) { 
				if($nom==$id){?>
				<form method="post" action="<?php echo base_url().'index.php/c_quiz/userquiz'?>">
				<tr>
					<td><input type="hidden" name="nip" value="<?=$row->NIP?>"> <?=$row->NIP?> </td>
					<td><?=$row->nama?></td> 
					<td><input type="text" name="quiz" value="<?=$row->quiz?>" size="15"></td>
					<td><select name="divisi">
					<?php foreach($listdiv as $rrrow){ ?>
					<option value="<?=$rrrow->iddiv?>" <?php if($row->divisi==$rrrow->iddiv){echo 'selected';}?> ><?=$rrrow->divisi ?></option>
					<?php }?>
					</select></td>
					<td id="btn"><input type="submit" value="Simpan" class="btnsave"></td>
			  	</tr>
				</form>
				<?php $nom++; continue;}?>
			  <tr>
				<td><?=$row->NIP?></td> 
				<td><?=$row->nama?></td>
				<td><?=$row->quiz?></td>
				<td><?=$row->divisi?></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_quiz/userquiz/'.$nom ?>" id="edit">Ubah</a></td>
			  </tr>
			<?php $nom++;} ?>
			</table>
        	<br>
        </div>
        
        </div> <!-- /container -->

</body>
</html>