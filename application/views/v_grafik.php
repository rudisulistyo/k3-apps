
		<?php
		$jdat=0;
		foreach($grafb as $dta){
			$jdat++;
			$narea[] = $dta->namaarea;
			$jarea[] = $dta->jumlah;
			}
		?>
		<canvas id="grafarea" width="<?= $jdat*100 ?>px" height="300px"></canvas>
		<script type="text/javascript" src="<?= base_url().'assets/chartjs/Chart.js'?>"></script>
		<script>
var ctx = document.getElementById("grafarea").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($narea)?>,
        datasets: [{
            label: 'Jumlah Laporan',
            data: <?= json_encode($jarea)?>,
            backgroundColor:'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }]
    },
    options: {
		responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>