<?php

$hostname="localhost";
$username="root";
$password="";
$database="paramount";

$koneksi = mysql_connect($hostname,$username,$password,$database) or die ("Koneksi database gagal");
mysql_select_db($database,$koneksi) or die("Tidak ada database yang dipilih");