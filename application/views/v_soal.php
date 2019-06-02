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
			<h1 >Pengaturan Tes</h1>
			<table id="t01">
				<form method="post" action="<?php echo base_url().'index.php/c_quiz/edittime'?>">
				<tr>
					<td>Durasi tes </td>
					<td><input type="text" name="quistime" value="<?=$qtime['quiztime']?>" size="3"> menit</td>
				</tr>
				
				<tr>
					<td>Quiz aktif </td>
					<td><input type="text" name="quisaktif" value="<?=$qtime['quizaktif']?>" size="3"></td>
				</tr>
				<tr><td></td><td id="btn"><input type="submit" class="btnsave" value="Simpan" ></td></tr>
				</form>
			
			</table>
			<br>
			<h1 >Ubah/Tambah Soal Tes</h1>
			<table id="t01">
			  <tr>
				<th>ID</th>
				<th>Soal</th> 
				<th>Bobot</th> 
				<th>Gambar</th>
				<th>Jawaban benar</th>
				<th colspan="3">Jawaban salah</th>
				<th>Quiz</th>
				<th>Pilihan</th>
			  </tr>
			<?php $nom=0;$id=$this->uri->segment(3);
        	foreach($soal as $row) { 
				if($nom==$id){?>
				<form id="upload_form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'index.php/c_quiz/editsoal'?>" style="display:none;">
				<tr>
					<td width="15px"><input type="hidden" name="idsoal" value="<?=$nom?>"> <?=$nom?> </td>
					<td><input type="text" name="soal" value="<?=$row->soal?>" size="40"></td> 
					<td><input type="text" name="bobot" value="<?=$row->bobot?>" size="4"></td>
					<td>
					<input type="file"  name="images" id="images" onchange="changeEventHandler(event);" style="display: none;" >
					<input type="button" value="Browse" onclick="document.getElementById('images').click();" />
					<input type="text" name="gbr" id="gbr">
					</td> 
					<td><input type="text" name="jawaban" value="<?=$row->jawaban?>" size="11"></td>
					<td><input type="text" name="pilihan1" value="<?=$row->pilihan1?>" size="11"></td>
					<td><input type="text" name="pilihan2" value="<?=$row->pilihan2?>" size="11"></td>
					<td><input type="text" name="pilihan3" value="<?=$row->pilihan3?>" size="11"></td>
					
					<td><select name="quiz">
					<?php  foreach($idsquiz as $rrow){ ?>
					<option value="<?=$rrow->idquiz ?>" <?php if($row->idquiz==$rrow->idquiz)echo 'selected';?> ><?=$rrow->idquiz ?></option>
					<?php }?>
					<option value="<?=($rrow->idquiz)+1 ?>"  ><?=($rrow->idquiz)+1 ?></option>
					</select></td>
					
					<td id="btn"><input type="submit" class="btnsave" value="Simpan" ></td>
			  	</tr>
				</form>
				<?php $nom++; continue;}?>
			  <tr>
				<td><?=$nom?></td>
				<td><?=$row->soal?></td> 
				<td><?=$row->bobot?></td>
				<td><?=$row->images?></td>
				<td><?=$row->jawaban?></td>
				<td><?=$row->pilihan1?></td>
				<td><?=$row->pilihan2?></td>
				<td><?=$row->pilihan3?></td>
				<td><?=$row->idquiz?></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_quiz/editsoal/'.$nom ?>" id="edit">Ubah</a></td>
			  </tr>
			<?php $nom++;} 
				if($nom==$id){?>
				<?php echo form_open_multipart('c_quiz/editsoal')?>
				<tr>
					<td width="15px"><input type="hidden" name="idsoal" value="<?=$nom?>"> <?=$nom?> </td>
					<td><input type="text" name="soal" value="" size="75"></td> 
					<td><input type="text" name="bobot" value="" size="5"></td>
					<td><input type="file" name="images" value="" size="10"></td>
					<td><input type="text" name="jawaban" value="" size="15"></td>
					<td><input type="text" name="pilihan1" value="" size="15"></td>
					<td><input type="text" name="pilihan2" value="" size="15"></td>
					<td><input type="text" name="pilihan3" value="" size="15"></td>
					<td><select name="quiz">
					<?php foreach($idsquiz as $rrow){ ?>
					<option value="<?=$rrow->idquiz ?>"><?=$rrow->idquiz ?></option>
					<?php }?>
					<option value="<?=($rrow->idquiz)+1 ?>"  ><?=($rrow->idquiz)+1 ?></option>
					</select></td>
					<td id="btn"><input type="submit" class="btnsave" value="Simpan" ></td>
			  	</tr>
				<?php echo form_close(); ?>
				<?php }else{ ?>
			  <tr>
				<td><?=$nom?></td>
				<td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
				<td id="btn"><a href="<?php echo base_url().'index.php/c_quiz/editsoal/'.$nom ?>" id="add">Tambah</a></td>
			  </tr><?php } ?>
			</table>
        	<br>
        </div>
        
        </div> <!-- /container -->

			
</body>
</html>
		<script type="text/javascript">
		
			function changeEventHandler(event){
				
				var text = (event.target.value);
				text = text.substring(12, text.length);
				document.getElementById("gbr").value = text;
				//alert(text);
				
			}
		</script>