<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['pilih'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('conn.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id	= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$nama_karyawan= $_POST['nama_karyawan'];
  	$department = $_POST['depart'];
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE tbl_karyawan SET nama_karyawan='$nama_karyawan', ID_department='$department' WHERE ID_karyawan='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo "<script> alert('Edit sukses'); location = 'tbl_karyawan_press.php'; </script>";
		
	}else{
		
		echo "<script> alert('Edit gagal'); location = 'tbl_karyawan_press.php'; </script>";
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>