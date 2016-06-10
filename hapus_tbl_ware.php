<?php
include('conn.php');

$id = $_GET['id'];

$query = mysql_query("delete from tbl_evaluasi_ware where ID_evaluasi_ware='$id'") or die(mysql_error());

if ($query) {

    header('location:tbl_ware_admin.php');
}
?>
