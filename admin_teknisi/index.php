<?php
session_start();
$konstruktor = 'admin_teknisi';
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
            <h1 class="m-0">Dashboard Admin Data Teknisi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Admin Data Teknisi</li>
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

        
        <div class="card-dark">
              <div class="card-header">
                <h3 class="card-title">
                <i class ="nav-icon fas fa-user-cog"></i>&nbsp; Data Teknisi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="tambah_data.php" class="btn btn-sm btn-warning">
                <i class="nav-icon fas fa-download"></i> <b>Tambah Data</b>  
              </a>
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
                    $sql_teknisi = mysqli_query($koneksi, "SELECT * FROM tbl_teknisi") or die (mysqli_error($koneksi));
                    if (mysqli_num_rows($sql_teknisi)> 0) {
                      while ($dt_teknisi = mysqli_fetch_array($sql_teknisi)){
                        ?>
                        <tr>
                        <td><?= $no++ ; ?></td>
                        <td><?= $dt_teknisi['nama']; ?></td>
                        <td><center>
                        <a href="https://api.whatsapp.com/send?phone=<?=$dt_teknisi['kontak'];?>&text=Hallo, <?=$dt_teknisi['nama'];?>" class="btn btn-sm btn-success" target="_blank">
                        <img src="../img/wa.png" height="18px" weight="18px"><?=$dt_teknisi['kontak'];?></a>
                        </center></td>
                        <td><?= $dt_teknisi['alamat']; ?></td>
                        <td>
                        <button type="button" class="btn btn-sm btn-info btn-edit" data-toggle="modal" data-target="#modal-default"
                             data-nama="<?= $dt_teknisi['nama'];?>" 
                             data-kontak="<?= $dt_teknisi['kontak']; ?>" 
                             data-alamat="<?= $dt_teknisi['alamat']; ?>" >
                             <i class="nav-icon fas fa-edit"></i>
                        </button>
                        <a href="proses.php?hps_teknisi=<?= $dt_teknisi['id_teknisi']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus teknisi dengan id [<?= $dt_teknisi['id_teknisi']; ?>] - nama : [<?= $dt_teknisi['nama']; ?>]')"><i class="fas fa-trash"></i></a>
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


<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#001f3f;">
        <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-file"></i> Edit Data Teknisi</font></h4>
      </div>
      <form id="modal-default" action="edit.php" method="POST">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="data-nim" class="col-sm-12 control-label">nama</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama" id="nama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="data-kontak" class="col-sm-12 control-label">Kontak</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="kontak" id="kontak">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="data-kontak" class="col-sm-12 control-label">Alamat</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="alamat" id="alamat">
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
   $('#modal-default').on('show.bs.modal', function(e) {

   var nama = $(e.relatedTarget).data('nama');
   var kontak = $(e.relatedTarget).data('kontak');
   var alamat = $(e.relatedTarget).data('alamat');



  $(e.currentTarget).find('input[name="nama"]').val(nama);
  $(e.currentTarget).find('input[name="kontak"]').val(kontak);
  $(e.currentTarget).find('select[name="alamat"]').val(alamat);  
   
   });
</script>
</body>
</html>
