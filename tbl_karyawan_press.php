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
                     <li>
                        <a href="daftar_akun.php"><i class="fa fa-fw fa-wrench"></i> Panel Admin</a>
                    </li>
                     <li class="active">
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
                <div class="col-lg-6">
                <div class="panel panel-green">
                <div class="panel-heading">
                <i class="fa fa-fw fa-table"></i><strong> Daftar Karyawan</strong>
                <div class="pull-right">
                </div>
                </div>
  <div class="table-responsive">
  <table class="table table-hover">
  <tr>
    <th>No.</th>
    <th>Nama Karyawan</th>
    <th>Nama Department</th>
    <th>Action</th>
  </tr>
  
  <?php
  include('conn.php');
  $query=mysql_query("SELECT tbl_karyawan.ID_karyawan, tbl_karyawan.nama_karyawan, tbl_department.nama_department FROM tbl_karyawan, tbl_department WHERE tbl_karyawan.ID_department=tbl_department.ID_department;") or die(mysql_error());
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
            <a href="edit_karyawan.php?id=<?php echo $data['ID_karyawan']; ?>" class="btn btn-xs btn-info">Edit</a>
                    <a href="hapus_karyawan.php?id=<?php echo $data['ID_karyawan']; ?>"onclick="return confirm('Anda yakin akan menghapus karyawan?')" class="btn btn-xs btn-danger">Hapus</a>
              
                </td><?php
        echo '</tr>';
        $no++;
      }
    }
  ?> 
</form>
</table>
</div>
</div>
</div>

         <div class="row">
                <div class="col-lg-6">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-fw fa-table"></i><strong> Tambah Karyawan</strong>
                <div class="pull-right">
                </div>
                </div>
                <div class="panel-body">
<label class="control-label col-sm-2">Nama:</label>
<form class="form" action="tambah_karyawan_proses.php" method="post">
<input class="form-control" type="text" name="nama_karyawan" placeholder="Nama" required><br>
<label class="control-label col-sm-2">Department:</label><br><br>
  <input type="radio" name="depart" value="1" required>1. Press & Cutt<br>  
  <input type="radio" name="depart" value="2" required>2. Welding<br>
  <input type="radio" name="depart" value="3" required>3. Painting<br> 
  <input type="radio" name="depart" value="4" required>4. Assembling<br>
  <input type="radio" name="depart" value="5" required>5. Warehouse<br><br><br>
<input type="submit" name="pilih" class="btn btn-success">
</form>
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
