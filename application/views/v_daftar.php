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
			<h1>Daftar</h1>
			<table>
				<form method="post" action="<?php echo base_url().'index.php/c_login/daftar'?>">
			 	<tr>
					<th>NIP</th> <td><input type="text" name="nip" value="<?php echo $this->session->flashdata('nip');?>" required autofocus> </td><td style="text-align: left"><?php echo $this->session->flashdata('msg');?></td>
				</tr>
				<tr>
					<th>Nama</th> <td><input type="text" name="nama" value="<?php echo $this->session->flashdata('nama');?>" required> </td><td></td>
				</tr>
					<th>Password</th> <td><input type="password" name="pass" required> </td><td></td>
				<tr>
					<th>Ulangi Password</th> <td><input type="password" name="pass2" required> </td><td style="text-align: left"><?php echo $this->session->flashdata('msg2');?></td>
				</tr>
				<tr>
					<th></th> <td ><input type="submit" value="Simpan" class="btnsave"></td>
				</tr>
				</form>
			</table>
        	<br>
        </div>
        
        </div> <!-- /container -->


</body>
</html>