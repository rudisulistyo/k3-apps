<style type="text/css">
	#navbar{
		list-style-type: none;
		margin: 0;
		margin-left: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;	
		position: fixed;
    	top: 0;
    	width: 100%;
	}
	#navbar li{
		float: left;
	}
	#navbar li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	li a:hover {
		background-color: #111;
	}
	#nama a:hover {
		background-color: #333;
	}
	#xit {
    	background-color: #f44336;
		color: white;
	}
	#xit  a:hover{
    	background-color: #da190b;
	}
</style>

<div >
  <ul id="navbar">
  <!--Akses Menu Untuk Admin-->
  <?php if($this->session->userdata('akses')=='1'):?>
      <li><a href="<?php echo base_url().'index.php/page'?>">Dashboard</a></li>
      <li><a href="<?php echo base_url().'index.php/page/soal'?>">Soal Tes</a></li>
	  <li><a href="<?php echo base_url().'index.php/page/soal2'?>">Soal Angket</a></li>
      <li><a href="<?php echo base_url().'index.php/page/areabahaya'?>">Area Bahaya</a></li>
	  <li><a href="<?php echo base_url().'index.php/page/userquiz'?>">User</a></li>
	  <li><a href="<?php echo base_url().'index.php/page/info'?>">Info</a></li>
	  <li><a href="<?php echo base_url().'index.php/page/obs'?>">Observasi</a></li>
  <!--Akses Menu Untuk super-->
  <?php elseif($this->session->userdata('akses')=='2'):?>
      <li><a href="<?php echo base_url().'index.php/page'?>">Dashboard</a></li>
      <li><a href="<?php echo base_url().'index.php/page/areabahaya'?>">Area Bahaya</a></li>
	  <li><a href="<?php echo base_url().'index.php/page/obs'?>">Observasi</a></li>
  <!--Akses Menu Untuk pegawai-->
  <?php else:?>
      <li><a href="<?php echo base_url().'index.php/page'?>">Dashboard</a></li>
      <li><a href="<?php echo base_url().'index.php/page/tes'?>">Tes</a></li>
	  <li><a href="<?php echo base_url().'index.php/page/tes2'?>">Angket</a></li>
      <li><a href="<?php echo base_url().'index.php/page/lapor'?>">Lapor Area Bahaya</a></li>
  <?php endif;?>
      <li id="xit" style="float:right"><a href="<?php echo base_url().'index.php/c_login/logout'?>">Keluar</a></li>
      <li id="nama" style="float:right"><a><?php echo $this->session->userdata('ses_nama');?></a></li>
  </ul>
</div>

