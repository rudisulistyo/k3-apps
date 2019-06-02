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
			<h1>Ubah Info</h1>
			<table>
			<?php foreach($infos as $row) { ?>
				<form method="post" action="<?php echo base_url().'index.php/c_login/info'?>">
				<tr>
					<td><textarea name="info" rows="10" cols="40" placeholder="Informasi"><?=$row->info?></textarea></td> 
			  	</tr>
				<tr><td id="btn"><input type="submit" value="Simpan" class="btnsave"></td></tr>
				</form>
				<?php }?>
			</table>
        	<br>
        </div>
        
        </div> <!-- /container -->
</body>
</html>