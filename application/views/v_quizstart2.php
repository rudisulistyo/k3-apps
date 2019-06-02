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
        <div id="body"><h1>ANGKET KARYAWAN </h1>
			<p>	<?php foreach($try as $row){?> 
				Anda memiliki <?=$row->quiz; ?> kesempatan untuk melakukan Angket ini.
				<?php if($row->quiz!=0){ ?>
				<form method="post" action="<?php echo base_url().'index.php/c_quiz2/soal'?>">
					<input type="submit" value="Mulai" class="btnedit">
				</form><?php } }?>
			</p>
        </div>
        </div> <!-- /container -->

</body>
</html>