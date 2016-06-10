<html>
<?php
if(isset($_POST['tambah'])){
	include('conn.php');
		$penilai=$_POST['nama_penilai'];
		$soal  = $_POST['nama_evaluasi'];
  		$soal1 = $_POST['soal1'];
  		$soal2 = $_POST['soal2'];
  		$soal3 = $_POST['soal3'];
  		$soal4 = $_POST['soal4'];
  		$soal5 = $_POST['soal5'];
  		$soal6 = $_POST['soal6'];
  		$input=mysql_query("INSERT INTO tbl_evaluasi_assem VALUES(NULL,'$penilai','$soal','$soal1','$soal2','$soal3','$soal4','$soal5','$soal6',NULL)") or die (mysql_error());   
}

	if($input){
		echo "<script> alert('Terimakasih anda sudah melakukan evaluasi'); location = 'evaluasi_assem.php'; </script>";
	}
	else{
		echo "<script> alert('Andda gagal melakukan evaluasi'); location = 'index.php'; </script>";
	}
?>
</html>