<?php
session_start();
require_once '../database/config.php';
$konstruktor = 'teknisi_gantipw';
if ($_SESSION['hak_akses']!=2){
  $usr = $_SESSION['user'];
  $waktu = date('Y-m-d H:i:s');
  $auth = $_SESSION['hak_akses'];
  $nama = $_SESSION['nama'];
  if ($auth==1)
  {
    $tersangka = "Admin";

  }
  if($auth==0){
    $tersangka = "Super Admin";
  }
  if ($auth > 2 ) { 
    
    $tersangka = "Unknown";
  }
  $ket = "Pengguna dengan username ".$usr." , nama : ".$nama." melakukan cross authority dengan akses  sebagai ".$tersangka;
  $querycrossauth = mysqli_query($koneksi, "INSERT INTO tbl_cross_auth VALUES (null,'$usr','$waktu', '$ket')") or die (mysqli_error($koneksi));
  echo '<script>window.location="../login/logout.php"</script>';

  
}
else 
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Komputer | Dashboard</title>

  <?php
  include '../listlink.php';
  ?>

  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php 
    include '../navbar.php';
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logoservice.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Service Komputer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php 
          include '../teknisi_sidebar.php';
          ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="card-body">
        <div class="col-lg-6">
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class ="nav-icon fas fa-lock"></i>&nbsp; Ganti Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" value = "<?=$_SESSION['user']; ?>" disabled>
                    <input type="text" class="form-control" name = "user" id="username" value = "<?=$_SESSION['user']; ?>" hidden>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama" value = "<?=$_SESSION['nama']; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="pass_lama">Password Lama</label>
                    <input type="password" class="form-control" id="pass_lama" placeholder ="Password Lama" name ='pwlama' required>
                  </div>
                  <div class="form-group">
                    <label for="pass_baru">Password Baru</label>
                    <input type="password" class="form-control" id="pass_baru" placeholder ="Password Baru" name ='pwbaru' required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block" name = "gantipw"><i class = "nav-icon fas fa-sync"></i>&nbsp;Ganti Password</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         </div>
        </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php 
  include '../footer.php';
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php 
}
include '../scripts.php';
?>
</body>
</html>
