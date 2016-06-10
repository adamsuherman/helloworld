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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PBI Evaluation System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PT Paramount Bed Indonesia</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $login_session ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home_admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Production Division <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="tbl_press_admin.php">Press & Cutt Dept.</a>
                            </li>
                            <li>
                                <a href="tbl_weld_admin.php">Welding Dept.</a>
                            </li>
                            <li>
                                <a href="tbl_paint_admin.php">Painting Dept.</a>
                            </li>
                            <li>
                                <a href="tbl_assem_admin.php">Assembling Dept.</a>
                            </li>
                            <li>
                                <a href="tbl_ware_admin.php">Warehousing Dept.</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit"></i> Administration Division <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="">Legal Dept.</a>
                            </li>
                            <li>
                                <a href="">General Affairs Dept.</a>
                            </li>
                            <li>
                                <a href="">Export/Import Dept.</a>
                            </li>
                            <li>
                                <a href="">Accounting/IT Dept.</a>
                            </li>
                        </ul>
                    </li>
                     <li class="active">
                        <a href="daftar_akun.php"><i class="fa fa-fw fa-wrench"></i> Panel Admin</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-table"></i> Karyawan <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="tbl_karyawan_press.php">Data Karyawan</a>
                            </li>
                        </ul>
                    </li>
                                <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administrator
                        </h1>
                <div class="row">
                <div class="col-lg-8">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-fw fa-table"></i><strong> Edit Akun</strong>
                <div class="pull-right">
                </div>
                </div>
                <div class="panel-body">
                <form action="edit_admin_proses.php" method="post" class="form">
                     <?php
  //proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
  
  //include atau memasukkan file koneksi ke database
  include('conn.php');
  
  //membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
  $id = $_GET['id'];
  
  //melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
  $show = mysql_query("SELECT * FROM tbl_akun WHERE ID_akun='$id'");
  
  //cek apakah data dari hasil query ada atau tidak
  if(mysql_num_rows($show) == 0){
    
    //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
    header('location:daftar_akun.php');
    
  }else{
  
    //jika data ditemukan, maka membuat variabel $data
    $data = mysql_fetch_assoc($show); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
  
  }
  ?>
<div class="form-group">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label class="control-label col-sm-2">Nama:</label>
<input type="text" name="nama_akun" placeholder="Nama" value="<?php echo $data['nama_akun']; ?>" class="form-control"><br>
<label class="control-label col-sm-2">NIK:</label>
<input type="text" name="nik" placeholder="NIK" value="<?php echo $data['user_akun']; ?>" class="form-control"><br>
<label class="control-label col-sm-2">Password:</label>
<input type="password" name="password" placeholder="Password" value="<?php echo $data['pass_akun']; ?>" class="form-control"><br>
<label class="control-label col-sm-2">Level Akses:</label>
   <select name="level" required>
      <option value="">Pilih Level</option>
      <option value="admin" <?php if($data['level_akun'] == 'admin'){ echo 'selected'; } ?>">Administrator</option>
      <option value="user" <?php if($data['level_akun'] == 'user'){ echo 'selected'; } ?>">User</option>
   </select><br><br>
<input type="submit" name="edit" class="btn btn-success">
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                      </div>
                      </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
