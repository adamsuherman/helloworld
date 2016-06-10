<html>
<?php
if(isset($_POST['submit'])){
	include('conn.php');
		$nik  = $_POST['nik'];
  		$password = $_POST['password'];
  		$nama = $_POST['nama_akun'];
  		$level = $_POST['level'];
  		$input=mysql_query("INSERT INTO tbl_akun VALUES(NULL,'$nik','$password','$nama','$level')") or die (mysql_error());   
}

	if($input){
		echo "<script> alert('Pendaftaran sukses'); location = 'daftar_akun.php'; </script>";
	}
	else{
		echo "<script> alert('Gagal mendaftar'); location = 'home_admin.php'; </script>";
	}
?>
</html>