<?php
include('conn.php');

$id = $_GET['id'];

$query = mysql_query("delete from tbl_evaluasi_weld") or die(mysql_error());

if ($query) {

    header('location:tbl_weld_admin.php');
}
?>