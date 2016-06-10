<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['edit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('conn.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id	= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$nik= $_POST['nik'];
  	$password = $_POST['password'];
  	$nama = $_POST['nama_akun'];
  	$level = $_POST['level'];
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE tbl_akun SET user_akun='$nik', pass_akun='$password', nama_akun='$nama', level_akun='$level' WHERE ID_akun='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo "<script> alert('Edit sukses'); location = 'daftar_akun.php'; </script>";
		
	}else{
		
		echo "<script> alert('Edit gagal'); location = 'daftar_akun.php'; </script>";
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>