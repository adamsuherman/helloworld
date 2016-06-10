<?php
   
   include "session.php";

   if(!isset($_SESSION['username'])){
      header("location:login.php");
      exit();
   }

   if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
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
                <a class="navbar-brand" href="index.php">PT Paramount Bed Indonesia</a>
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
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Production Division <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="evaluasi_press.php">Press & Cutt Dept.</a>
                            </li>
                            <li>
                                <a href="evaluasi_weld.php">Welding Dept.</a>
                            </li>
                            <li>
                                <a href="evaluasi_paint.php">Painting Dept.</a>
                            </li>
                            <li>
                                <a href="evaluasi_assem.php">Assembling Dept.</a>
                            </li>
                            <li>
                                <a href="evaluasi_ware.php">Warehousing Dept.</a>
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
                                <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Evaluation System
                        </h1>
                        <div class="alert alert-info">
                                <i class="fa fa-dashboard"></i> Hello! <strong><?php echo $login_session ?></strong>
                            </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-8">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i><strong> Press & Cutt Department</strong>
                            <div class="pull-right">    
                            </div>
                        </div>

                        <div class="panel-body">
<form action="proses_press.php" method="post" class="form">
<div class="well">
<b>Keterangan:</b><br>
1 = Sangat tidak setuju<br>
2 = Tidak setuju<br>
3 = Cukup<br>
4 = Setuju<br>
5 = Sangat setuju<br>
</div>
<br><br>
<input type="text" name="nama_penilai" value="<?php echo $_SESSION['username']; ?>" hidden>
Masukan Nama Karyawan:
<?php
    include ('conn.php');
    $sql=mysql_query('SELECT *FROM tbl_karyawan where ID_department=1;');
    ?>
    <div class="control-group">
        <form action="" method="">
            <select name="nama_evaluasi" required>
                <option value="" required>Pilih Karyawan</option>
                <?php if (mysql_num_rows($sql)>0) { ?>
                    <?php while ($row = mysql_fetch_array($sql)) { ?>
                        <option> <?php echo $row['nama_karyawan'] ?> </option>
                <?php   }?>
            <?php   } ?>
            </select>
        </form>
<br><br><br>
Apakah karyawan bekerja dengan baik? <br>
    <input type="radio" name="soal1" value="1" required>1    
    <input type="radio" name="soal1" value="2" required>2   
    <input type="radio" name="soal1" value="3" required>3    
    <input type="radio" name="soal1" value="4" required>4
    <input type="radio" name="soal1" value="5" required>5<br>
    Komentar:<br>
    <textarea class="form-control" name="soal2" required></textarea><br>
<br>
Apakah karyawan bekerja dengan jujur? <br>
    <input type="radio" name="soal3" value="1" required>1  
    <input type="radio" name="soal3" value="2" required>2    
    <input type="radio" name="soal3" value="3" required>3    
    <input type="radio" name="soal3" value="4" required>4
    <input type="radio" name="soal3" value="5" required>5<br>
    Komentar:<br>
    <textarea class="form-control" name="soal4" required></textarea><br>
<br>
Apakah karyawan bekerja dengan tekun? <br>
    <input type="radio" name="soal5" value="1" required>1    
    <input type="radio" name="soal5" value="2" required>2    
    <input type="radio" name="soal5" value="3" required>3    
    <input type="radio" name="soal5" value="4" required>4
    <input type="radio" name="soal5" value="5" required>5<br>
    Komentar:<br>
    <textarea class="form-control" name="soal6" required></textarea><br>
<br>
<input type="submit" name="tambah" value="Submit" class="btn btn-primary">
</form>
</div>
</div>
</div>
 </div>
<div class="col-lg-4">
<div class="panel panel-primary">
<div class="panel panel-heading">
<strong> Hasil evaluasi</strong>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Waktu</th>
    </tr>
</thead>
    <?php
    include('conn.php');
    $hariini= date("Y-m-d");
    $query=mysql_query("SELECT * FROM tbl_evaluasi_press WHERE nama_penilai_press='$user_check' AND DATE(date_evaluasi_press) = DATE(NOW()) ORDER BY ID_evaluasi_press ASC") or die(mysql_error());

    if(mysql_num_rows($query)==0){
            echo '<tr><td colspan="3"><center>Anda belum melakukan evaluasi</center></td></tr>';
        }
        else{
            $no=1;
            while($data=mysql_fetch_assoc($query)){
                echo'<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$data['nama_evaluasi_press'].'</td>';
                    echo '<td>'.$data['date_evaluasi_press'].'</td>';
                echo '</tr>';
                $no++;
            }
        }
    ?>
    </table>
    </div>
    </div>
    </div>
    </div>

                <!-- /.row -->
           
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
