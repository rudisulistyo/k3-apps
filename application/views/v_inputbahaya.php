<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to K3</title>
	<link href="<?php echo base_url().'assets/css/style1.css'?>" rel="stylesheet">
</head>
<body>
	<?php $this->load->view('v_main');?>
<div id="container">
        
        <div id="body">
			<h1 >Laporan Area Berbahaya</h1>
        <form method="post" action="<?php echo base_url().'index.php/c_bahaya/bahayap'?>">
        <p>Area
        <select name="areac">
        	<?php foreach($area as $row){?>
  			<option value="<?=$row->IDArea ?>"><?=$row->namaarea ?></option>
  			<?php }?>
		</select></p>
		<p>
		<textarea name="message" rows="10" cols="40" placeholder="Keterangan"></textarea></p>
		<p><input type="submit" value="Selesai" class="btnedit"></p> 
		</form>
        </div>
    </div> <!-- /container -->
</body>
</html>