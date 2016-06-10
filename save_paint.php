<?php
	header("Cache-Control: no-cache, no-store, must-revalidate");
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=painting.xls");
?>
<html>
<table cellpading="5" cellspacing="0" border="1" class="table">
<tr bgcolor="#2C97DF">
<center><b>PT. Paramount Bed Indonesia</b></center>
	<h2><center>Dept. Painting</center></h2>
		<th>No.</th>
		<th>Penilai</th>
		<th>Nama</th>
		<th>Baik</th>
		<th>Komentar1</th>
		<th>Jujur</th>
		<th>Komentar2</th>
		<th>Tekun</th>
		<th>Komentar3</th>
		<th>Tanggal</th>
	</tr>
	
	<?php
	include('conn.php');
	$query=mysql_query("SELECT * FROM tbl_evaluasi_paint ORDER BY ID_evaluasi_paint ASC") or die(mysql_error());
	if(mysql_num_rows($query)==0){
			echo '<tr><td colspan="10"><center>Tidak ada data!</center></td></tr>';
		}
		else{
			$no=1;
			while($data=mysql_fetch_assoc($query)){
				echo'<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data['nama_penilai_paint'].'</td>';
					echo '<td>'.$data['nama_evaluasi_paint'].'</td>';
					echo '<td>'.$data['soal1_paint'].'</td>';
					echo '<td>'.$data['komentar1_paint'].'</td>';
					echo '<td>'.$data['soal2_paint'].'</td>';
					echo '<td>'.$data['komentar2_paint'].'</td>';
					echo '<td>'.$data['soal3_paint'].'</td>';
					echo '<td>'.$data['komentar3_paint'].'</td>';
					echo '<td>'.$data['date_evaluasi_paint'].'</td>';
				echo '</tr>';
				$no++;
			}
		}
	?>
	</form>
</html>