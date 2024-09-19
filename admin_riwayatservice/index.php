<?php
session_start();
$konstruktor = 'admin_riwayatservice';
require_once '../database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Komputer | Riwayat Service</title>

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
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class ="col-lg-12">

        
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Nama Customer</th>
                    <th>Nama Teknisi</th>
                    <th>Jenis Service</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1;
                    $qr_riwayat = mysqli_query($koneksi, "SELECT * FROM tbl_riwayatservice") or die (mysqli_error($koneksi));

                    if (mysqli_num_rows($qr_riwayat)> 0) {
                      while ($dt_riwayat = mysqli_fetch_array($qr_riwayat)){
                        ?>
                        <tr>
                        <td><?= $no++ ; ?></td>
                        <td><?= $dt_riwayat['kd_token']; ?></td>
                        <td><?= $dt_riwayat['nama_cust']; ?></td>

                        <td>
                          <?php 
                          $kode_teknisi = $dt_riwayat['kd_teknisi'];

                          $ambilteknisi = mysqli_query($koneksi, "SELECT nama FROM tbl_teknisi WHERE kd_teknisi='$kode_teknisi'") or die (mysqli_error($teknisi));

                          $dt_teknisi = mysqli_fetch_assoc($ambilteknisi);
                          $teknisi = $dt_teknisi['nama'];
                          ?>
                          <?= $teknisi; ?>
                        </td>

                        <td><?= $dt_riwayat['jenis_service']; ?></td>
                        <td><?= $dt_riwayat['kd_token']; ?></td>
                        <td>
                        <a href="proses.php?kd_riwayat=<?= $dt_riwayat['kd_riwayat']; ?>" class="btn btn-danger" onclick="return confirm('Anda akan menghapus pengguna dengan kode riwayat [<?= $dt_riwayat['kd_riwayat']; ?>] - username : [<?= $dt_riwayat['nama_cust']; ?>]')"><i class="fas fa-trash"></i></a>
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
