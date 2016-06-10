<?php
   
   include "session.php";

   if(!isset($_SESSION['username'])){
      header("location:login.php");
      exit();
   }

   if($_SESSION['level']!="admin"){
       echo "<script> alert('Akses ditolak'); location = 'index.php'; </script>";
   }
?>

<!DOCTYPE html>
<html>
<style>
.tombol{
	background: #69c3ff;
	color:white;
	border-top:0;
	border-left:0;
	border-right:0;
	padding: 5px 10px;
	text-decoration:none;
	font-family:sans-serif;
	font-size: 10pt;
	cursor:pointer;	
}
.tombol:hover{
	background-color: #2C97DF;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #66b3ff;
    color: white;
}
.hapus{
  background: #ff3333;
  color:white;
  border-top:0;
  border-left:0;
  border-right:0;
  padding: 4px 4px;
  text-decoration:none;
  font-family:sans-serif;
  font-size: 10pt;
  cursor:pointer; 
  border-radius: 5px;
}
.hapus:hover{
  background-color:#cc0000;
}
.edit{
   background: #668cff;
  color:white;
  border-top:0;
  border-left:0;
  border-right:0;
  padding: 4px 4px;
  text-decoration:none;
  font-family:sans-serif;
  font-size: 10pt;
  cursor:pointer;
  border-radius: 5px; 
}
.edit:hover{
  background-color:#1a53ff;
}
</style>
<div>
	<a href="home_admin.php" class="tombol">Kembali</a>
</div>
<br><br>
<table cellpading="5" cellspacing="0" border="0" class="table">
	<tr>
		<th>No.</th>
		<th>Nama Karyawan</th>
		<th>Nama Department</th>
		<th>Action</th>
	</tr>
	
	<?php
	include('conn.php');
	$query=mysql_query("SELECT tbl_karyawan.ID_karyawan, tbl_karyawan.nama_karyawan, tbl_department.nama_department FROM tbl_karyawan, tbl_department WHERE tbl_karyawan.ID_department=tbl_department.ID_department  AND tbl_karyawan.ID_department=2;") or die(mysql_error());
	if(mysql_num_rows($query)==0){
			echo '<tr><td colspan="3"><center>Tidak ada data!</center></td></tr>';
		}
		else{
			$no=1;
			while($data=mysql_fetch_assoc($query)){
				echo'<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$data['nama_karyawan'].'</td>';
					echo '<td>'.$data['nama_department'].'</td>';
					?><td align="center">
						<a href="edit_karyawan.php?id=<?php echo $data['ID_karyawan']; ?>" class="edit">Edit</a>
                		<a href="hapus_karyawan.php?id=<?php echo $data['ID_karyawan']; ?>"onclick="return confirm('Anda yakin akan menghapus karyawan?')" class="hapus">Hapus</a>
            	
          			</td><?php
				echo '</tr>';
				$no++;
			}
		}
	?> 
</form>
</body>
</html>