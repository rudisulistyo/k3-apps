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
			<h1>Hasil Tes</h1>
          <p>Nilai     : <?=$nilai ?></p>
          <p>Peringkat : <?=$peringkat ?></p>
		  <p>Durasi : <?= $durasi ?></p>
		 
        </div>
        
        </div> <!-- /container -->


</body>
</html>