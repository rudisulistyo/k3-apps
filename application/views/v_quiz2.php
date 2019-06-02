<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Welcome to K3</title>
	<style type="text/css">
		#container .top-timer{
		background-color: #9dd442;
		border:4px solid #6ab63c;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		color: #fff;
		display: block;
		font-size: 30px;
		margin: 0 auto;
		padding:5px;
		text-align: center;
		width: 14%;

		}
		#container .top-timer span{
		text-align:center;
		font-size:22px !important;
		display:block;
		color:#fff;
		}
		#container  a{
		text-align:center;
		text-decoration: none;
		}
	</style>
	<link href="<?php echo base_url().'assets/css/style1.css'?>" rel="stylesheet">
</head>
<?php
$time_allowed = 0;
$jam = time(); 
if($this->session->userdata('time_allowed')){
$time_allowed = $this->session->userdata('time_allowed');
}

if (!$this->session->userdata('endOfTimer')){
$endOfTimer = time() + $time_allowed;
$this->session->set_userdata('endOfTimer',$endOfTimer);
}


 
if(($this->session->userdata('endOfTimer') - time()) < 0) {
$timeTilEnd = 0;
}else{
$timeTilEnd = $this->session->userdata('endOfTimer') - time();
}
 
function secondsToWords($seconds){
$ret = "";
$hours = intval(intval($seconds) / 3600);
if($hours > 0){
$ret .= "$hours:";
}
$minutes = bcmod((intval($seconds) / 60),60);
if($hours > 0 || $minutes > 0){
$ret .= "$minutes:";
}
$seconds = bcmod(intval($seconds),60);
if($seconds < 10){
$ret .= "0"."$seconds";
}else{
$ret .= "$seconds";
}
return $ret;
}
?>
<body>
	<?php $this->load->view('v_main');?>
<div id="container">
        <div id="body">
			<h1 >Selamat Mengerjakan</h1>
			<div class="top-timer">
			<a href="javascript:void(0);"><span id="timer"><?php echo secondsToWords($timeTilEnd); ?></span></a>
			</div>
        	<form id="myForm" method="post" action="<?= base_url().'index.php/c_quiz/hasil'?>">
        	<?php $nom=1;
			$mulai=time();
        	shuffle($soal);
			
        	foreach($soal as $row) {
				if($nom>30)break;
        		$jwb = array($row->jawaban1, $row->jawaban2, $row->jawaban3, $row->jawaban4, $row->pilihan1, $row->pilihan2, $row->pilihan3, $row->pilihan4);
        		shuffle($jwb); ?>
        		<p><?=$nom.'. '.$row->soal ?><br>
				
				<?php 
				if(!empty($row->images)){
				echo	"<img src= '../../images/$row->images' /><br>"; //tampilkan gambar jika ada
				}
				
				?>
        		<input type="radio" name="<?=$row->IDsoal?>" value="<?=$jwb[0]?>"> <?=$jwb[0]?> <br>
				<input type="radio" name="<?=$row->IDsoal?>" value="<?=$jwb[1]?>"> <?=$jwb[1]?> <br>
				<input type="radio" name="<?=$row->IDsoal?>" value="<?=$jwb[2]?>"> <?=$jwb[2]?> <br>
        		<input type="radio" name="<?=$row->IDsoal?>" value="<?=$jwb[3]?>"> <?=$jwb[3]?> <br></p>
        		<?php $nom++;
				
					//echo "<script type='text/javascript'>alert('Waktu Menjawab ');</script>";

				} 
				?>
				<input type="hidden" name="timeawal" value="<?php echo ( $mulai); ?>"/>
				<input type="hidden" name="durasi" value="<?php echo ($mulai); ?>"/>  <!-- Durasi Sisa Waktu -->
				
        	<p><input type="submit" value="Selesai" class="btnedit"></p>
        	</form>
        </div>

        </div> <!-- /container -->
</body>
</html>
<script type="text/javascript">
 
var TimeLeft = '<?php echo $timeTilEnd; ?>';
TimeLeft = Number(TimeLeft);
function countdown(){
if(Number(TimeLeft) > 0) {
TimeLeft -= 1;
document.getElementById('timer').innerHTML = seconds2time(TimeLeft);
}else{
if(Number(TimeLeft) == 0){
clearInterval(CountFunc);
document.getElementById('myForm').submit();
return false;
}
}
}
 


var CountFunc = setInterval(countdown,1000);
 
function seconds2time (seconds) {
var hours   = Math.floor(seconds / 3600);
var minutes = Math.floor((seconds - (hours * 3600)) / 60);
var seconds = seconds - (hours * 3600) - (minutes * 60);
var time = "";
 
if (hours != 0) {
time = hours+":";
}
if (minutes != 0 || time !== "") {
minutes = (minutes < 10 && time !== "") ? "0"+minutes : String(minutes);
time += minutes+":";
}
if (time === "") {
time = seconds+"s";
}else {
time += (seconds < 10) ? "0"+seconds : String(seconds);
}
return time;
}
 
</script>