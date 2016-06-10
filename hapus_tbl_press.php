<?php
include('conn.php');

$id = $_GET['id'];

$query = mysql_query("delete from tbl_evaluasi_press where ID_evaluasi_press='$id'") or die(mysql_error());

if ($query) {

    header('location:tbl_press_admin.php');
}
?>
