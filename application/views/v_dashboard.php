<!DOCTYPE html>
<html>
  <head>
	  <title>Welcome to K3</title>
	  <link href="<?php echo base_url().'assets/css/style1.css'?>" rel="stylesheet">
  </head>
  <body>
	<?php $this->load->view('v_main');?> <!--Include menu-->
    <div id="container">
      
      <div id="body">
	  
			<?php $prgkt=1; if($this->session->userdata('akses')=='3'): ?>
			

        		<h1>Peringkat</h1>
        		<ol><?php foreach($ranking as $rrow) {
					if($prgkt<=10){
						if($rrow->nama==$this->session->userdata('ses_nama')) echo '<li><b>'.$rrow->nama.'</b></li>';
						else echo '<li>'.$rrow->nama.'</li>';
						$prgkt++;continue;
					}
					$prgkt++;
					if($rrow->nama==$this->session->userdata('ses_nama')) echo '<li value="'.$prgkt.'"><b>'.$rrow->nama.'</b></li>';
					
				}?>
          		</ol>
		  
		  <?php elseif($this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='1'):?>
        		<h1>Hasil Tes</h1>
		  		<table id="t02">
					<tr><th></th><th>Nama</th><th>Nilai Quiz</th><th>Time Duration</th><th>Observasi</th><th>Nilai Akhir</th>
					</tr>
					<?php foreach($ranking as $rrow) { ?>
					<tr><td><?=$prgkt?>.</td><td><?=$rrow->nama?></td><td align="center"><?=$rrow->nilai?></td><td><?=$rrow->durasi?></td><td><?=$rrow->poin?></td><td><?=$rrow->total?></td>
					</tr><?php $prgkt++;}?>
		 		</table>
        		<br><h1>Bobot Soal</h1>
				<?php $this->load->view('v_bobotsoal');?>
		<?php endif;?>
        		<br><h1>Grafik Area Bahaya</h1>
				<?php $this->load->view('v_grafik');?>
        </div>
      </div>
  </body>
</html>
