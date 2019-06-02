<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Welcome to K3</title>
	
	<link rel="stylesheet" type="text/css" href=<?php echo base_url().'assets/css/bootstrap.min.css'?>>
	<script type="text/javascript" src=<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>></script>
	<script type="text/javascript" src=<?php echo base_url().'assets/js/bootstrap.min.js'?>></script>
	<link href="<?php echo base_url().'assets/css/style1.css'?>" rel="stylesheet">
</head>
<body>
	<?php if(isset($info)){ ?>
<div id="infopop" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p><?php foreach($info as $row) { echo $row->info;}?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div><script type="text/javascript">$('#infopop').modal('show');</script> <?php } ?>
	<div class="bg">
    <div class="content">
		<div id="cntr">
        <div id="body">
			
			<h1 align="center" >Login K3</h1>
          <form  action="<?php echo base_url().'index.php/c_login/auth'?>" method="post">
			<table>
            <tr><td>
            <input type="text" id="username" name="username" placeholder="NIP" required autofocus>
        	</td></tr>
        	<tr><td>
            <input type="password" id="password" name="password" placeholder="Password" required>
            </td></tr>
            <tr><td>
            <button type="submit" class="btnedit">Masuk</button> <?php echo $this->session->flashdata('msg');?>
        	</td></tr></table>
          </form>
        
        </div>
	</div>
		</div>
    	<div class="slide show" style="background-image: url('<?= base_url().'assets/img/bg1.jpg'?>');"></div>
		<div class="slide" style="background-image: url('<?= base_url().'assets/img/bg2.jpg'?>');"></div>
		<div class="slide" style="background-image: url('<?= base_url().'assets/img/bg3.jpg'?>');"></div>
		<div class="slide" style="background-image: url('<?= base_url().'assets/img/bg4.jpg'?>');"></div>
		<div class="slide" style="background-image: url('<?= base_url().'assets/img/bg5.jpg'?>');"></div>
</div>
	<script type="text/javascript">$('#myModal').modal('show');</script>
	<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>"></script>
	<script>
		function cycleBackgrounds() {
			var index = 0;
			$imageEls = $('.bg .slide'); 
			setInterval(function () {
				index = index + 1 < $imageEls.length ? index + 1 : 0;
				$imageEls.eq(index).addClass('show');
				$imageEls.eq(index - 1).removeClass('show');
			}, 4000);
		};
		$(function () {
			cycleBackgrounds();
		});
	</script>
</body>
</html>
