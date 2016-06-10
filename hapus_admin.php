<?php
include('conn.php');

$id = $_GET['id'];

$query = mysql_query("delete from tbl_akun where ID_akun='$id'") or die(mysql_error());

if ($query) {

    header('location:daftar_akun.php');
}
?>
