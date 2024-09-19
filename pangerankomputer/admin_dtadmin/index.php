<?php
session_start();
$konstruktor = 'admin_dtadmin';
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
              <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-tambahdata"> 
              <i class="nav-icon fas fa-plus"></i> <b>Tambah Data</b>
            </button>
            <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1;
                    $sql_admin = mysqli_query($koneksi, "SELECT * FROM tbl_admin") or die (mysqli_error($koneksi));
                    if (mysqli_num_rows($sql_admin)> 0) {
                      while ($dt_admin = mysqli_fetch_array($sql_admin)){
                        ?>
                        <tr>
                        <td><?= $no++ ; ?></td>
                        <td><?= $dt_admin['nama']; ?></td>
                        <td><?= $dt_admin['telepon']; ?></td>
                        <td><?= $dt_admin['alamat']; ?></td>
                        <td>
                        <a href="proses.php?hps_admin=<?= $dt_admin['kd_admin']; ?>" class="btn btn-danger" onclick="return confirm('Anda akan menghapus admin dengan id [<?= $dt_admin['kd_admin']; ?>] - nama : [<?= $dt_admin['nama']; ?>]')"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="modal-tambahdata">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#FFC107;">
              <h4 class="modal-title" color="#000000"><b>Tambah Data Pengguna</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="from-horizontal" action="tambah_data.php" method="post" id="tambahdata">
            <div class="modal-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Input Kontak">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Kontak">
                  </div>
                 
                              
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" name="tambahdata" class="btn btn-warning" color="#000000"><h6><b><i class="nav-icon fas fa-download"> &nbsp</i>Tambah Data</b></h6>
              
            </button>
            </div>
            </form>
          </div>
        </div>
      </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php 
include '../scripts.php';
?>
</body>
</html>
