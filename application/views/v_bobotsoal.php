
	<table id="t02">
		<tr><th>ID</th><th>Soal</th><th>Nilai Bobot</th>
		<?php foreach($bobotsoal as $dts){?>
		</tr>
		<tr><td><?=$dts->idsoal?>.</td><td><?=$dts->soal?></td><td align="center"><?=$dts->bobot?></td>
		</tr>
		<?php }?>
	</table>