<?php
   session_start(); //mulai session, krena kita akan menggunakan session pd file php ini
   include 'conn.php'; //hubungkan dengan config.php untuk berhubungan dengan database

   $username=$_POST['username']; //tangkap data yg di input dari form login input username
   $password=$_POST['password']; //tangkap data yg di input dari form login input password

   $query=mysql_query("select * from tbl_akun where user_akun='$username' and pass_akun='$password'"); //melakukan pengampilan data dari database untuk di cocokkan
   $data=mysql_fetch_array($query);
   $xxx=mysql_num_rows($query); //melakukan pencocokan

   if($xxx==TRUE){ // melakukan pemeriksaan kecocokan dengan percabangan.
      $_SESSION['username']=$username;
      $_SESSION['level'] = $data['level_akun']; //jika cocok, buat session dengan nama sesuai dengan username
      if($data['level_akun']=='admin'){
         header('location:home_admin.php');
      }
      else if($data['level_akun']=='user'){
         header('location:index.php');
      }
      else{
         header('location:login.php');
      }
   }
   else{ //jika tidak tampilkan pesan gagal login
      header('location:login.php');
   }
?> 