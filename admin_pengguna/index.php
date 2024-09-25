<?php
session_start();
$konstruktor = 'admin_pengguna';
require_once '../database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Komputer | Administrator</title>

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

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logoservice.png" alt="Monev Skripsi" height="150px" width="150px">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-dark">
    <?php 
    include '../navbar.php';
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logoservice.png" alt="AdminLTE Logo" class="brand-image img-circle " style="opacity: .8">
      <span class="brand-text font-weight-light"><b><h5>Pangeran Komputer</h5></b></span>
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
          include '../admin_sidebar.php';
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin Data Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Admin Data Pengguna</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
        <div class ="col-lg-12">        
        <div class="card-dark ">
              <div class="card-header">
                <h3 class="card-title">
                <i class ="nav-icon fas fa-users"></i>&nbsp; Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-tambahdata"> 
              <i class="nav-icon fas fa-download"></i> <b>Tambah Data</b>
            </button>
            <br>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1;
                    $sql_admin = mysqli_query($koneksi, "SELECT * FROM tbl_login") or die (mysqli_error($koneksi));
                    if (mysqli_num_rows($sql_admin)> 0) {
                      while ($dt_pengguna = mysqli_fetch_array($sql_admin)){
                        ?>
                        <tr>
                        <td><?= $no++ ; ?></td>
                        <td><?= $dt_pengguna['id']; ?></td>
                        <td><?= $dt_pengguna['username']; ?></td>
                        <td><?= $dt_pengguna['nama']; ?></td>
                        <td>
                        <a href="proses.php?kd_pengguna=<?= $dt_pengguna['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda akan menghapus pengguna dengan id [<?= $dt_pengguna['id']; ?>] - username : [<?= $dt_pengguna['username']; ?>]')"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php }
                    }
                    ?>
                  
                  
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
include '../scripts.php';
?>
</body>
</html>
