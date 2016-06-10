<html>
<?php
if(isset($_POST['pilih'])){
	include('conn.php');
		$nama  = $_POST['nama_karyawan'];
  		$depart = $_POST['depart'];
  		$input=mysql_query("INSERT INTO tbl_karyawan VALUES(NULL,'$nama','$depart')") or die (mysql_error());   
}

	if($input){
		echo "<script> alert('Karyawan sudah ditambahkan'); location = 'tambah_karyawan.php'; </script>";
	}
	else{
		echo "<script> alert('Gagal menambah karyawan'); location = 'tambah_karyawan.php'; </script>";
	}
?>
</html>