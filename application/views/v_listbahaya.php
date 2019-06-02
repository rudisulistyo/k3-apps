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
          <h1>Laporan Area Bahaya</h1>
			
			<?php if($this->session->userdata('akses')=='1'){?><div class="btn-group">
				<form method="post" action="<?php echo base_url().'index.php/c_bahaya/editarea/'?>">
					<input type="submit" value="Edit Area" class="button">
				</div><br clear="all"><br>
			<?php }?>
			
				<table id="t01">
				  <tr>
					<th>No</th>
					<th>Nama Pelapor</th> 
					<th>Area</th>
					<th>Keterangan</th>
					<?php if($this->session->userdata('akses')=='1') echo '<th>Pilihan</th>'?>
				  </tr>
					<?php $nom=1; foreach($areab as $row) { ?>
					<tr>
						<td><?=$nom?></td>
						<td><?=$row->nama?></td>
						<td><?=$row->namaarea?></td>
						<td><?=$row->keterangan?></td>
						<?php if($this->session->userdata('akses')=='1'){?>
						<td id="btn">
							<form method="post" action="<?php echo base_url().'index.php/c_bahaya/hapuslap/'?>">
								<input type="hidden" name="id" value="<?=$row->IDArea?>">
								<input type="hidden" name="ket" value="<?=$row->keterangan?>">
								<input type="hidden" name="nip" value="<?=$row->NIP?>">
								<input type="submit" value="Approve" class="btndel">
							</form>
						</td><?php }?>
					</tr><?php $nom++;}?>
				</table>
			<br>
        </div>
        </div> <!-- /container -->
</body>
</html>