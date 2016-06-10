<?php
include('conn.php');

$id = $_GET['id'];

$query = mysql_query("delete from tbl_karyawan where ID_karyawan='$id'") or die(mysql_error());

if ($query) {

    header('location:tbl_karyawan_press.php');
}
?>
