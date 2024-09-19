

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Ganti Password Admin</title>

<?php 
session_start();
$konstruktor = 'admin_gantipw';
require_once '../database/config.php';
if ($_SESSION['hak_akses']!=1){
  $usr = $_SESSION['user'];
  $waktu = date('Y-m-d H:i:s');
  $auth = $_SESSION['hak_akses'];
  $nama = $_SESSION['nama'];
  if ($auth==0)
  {
    $tersangka = "Super User";

  }
  if($auth==2){
    $tersangka = "Teknisi";
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


include '../listlink.php';

?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logo.png" alt="MonevSkripsi" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php 
    include '../mhs_navbar.php';
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logo.png" alt="Monev Skripsi" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Monev Skripsi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php 
        include '../admin_sidebar.php';
        ?>
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ganti Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">admin_dashboard</a></li>
              <li class="breadcrumb-item active">Ganti Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
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
                    <input type="text" class="form-control" id="username" value = "<?=$_SESSION['username']; ?>" disabled>
                    <input type="text" class="form-control" name = "user" id="username" value = "<?=$_SESSION['username']; ?>" hidden>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama" value = "<?=$_SESSION['nama_user']; ?>" disabled>
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
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include '../footer.php';
?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
} 
include '../mhs_script.php';

?>
</body>
</html>
