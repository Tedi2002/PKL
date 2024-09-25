<?php
session_start();
require_once '../database/config.php';
$konstruktor = 'teknisi_dashboard';
if ($_SESSION['hak_akses']!=2){
  $usr = $_SESSION['username'];
  $waktu = date('Y-m-d H:i:s');
  $auth = $_SESSION['hak_akses'];
  $nama = $_SESSION['nama'];
  if ($auth==0)
  {
    $tersangka = "Super User";
  }
  if($auth==1){
    $tersangka = "Admin";
  }
  if ($auth > 2 ) { 
    $tersangka = "Unknown";
  }
  $ket = "Pengguna dengan username ".$usr." , nama : ".$nama." melakukan cross authority dengan akses  sebagai ".$tersangka;
  $querycrossauth = mysqli_query($koneksi, "INSERT INTO tbl_cross_auth VALUES ('$usr','$waktu','$ket')") or die (mysqli_error($koneksi));
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
          <div class="col-lg-12">
        <div class="card-info">
              <div class="card-header">
                <h3 class="card-title">Teknisi Dashboard</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
<div class="modal fade" id="modal-ket">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#FFC107;">
              <h4 class="modal-title" color="#000000"><b>Kelangkapan Service</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <input type="textbox" name="keterangan" disabled style="width: 100%; " >
            </div>        
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#800000">
              <h4 class="modal-title"><font color="ffffff">Edit Data</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="editdata">
            <div class="modal-body">
                <table>
                  <thead>
                    <tbody>
                    <tr>
                        <td width="30%">Id Request</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_idrq" class="form-control" hidden >
                        <input type="text" name="ed_idrq" class="form-control" disabled>
                      </td>
                      </tr>
                      <tr>
                        <td width="30%">Tanggal</td>
                        <td width="5%">:</td>
                        <td><input type="date" name="ed_tgl" class="form-control" hidden>
                        <input type="date" name="ed_tgl" class="form-control" disabled>
                      </td>
                      </tr>
                      <tr>
                        <td width="30%">Keluhan</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_keluhan" class="form-control" hidden>
                        <input type="text" name="ed_keluhan" class="form-control" disabled>
                      </td>
                      </tr>
                      <tr>
                        <td width="30%">keterangan</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_ket" class="form-control" hidden>
                        <input type="text" name="ed_ket" class="form-control" disabled>
                      </td>
                      </tr>
                      <tr>
                        <td width="30%">Saran</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_saran" class="form-control" >
                      </td>
                      </tr>
                    </tbody>
                  </thead>
                </table>
            </div>
            <div class="modal-footer justify-content-right">
              
              <button type="submit" class="btn btn-primary" name="editsaran" > <i class="nav-icon fas fa-edit"></i>Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php 
}
include '../scripts.php';
?>

<script type="text/javascript">
$('#modal-ket').on ('show.bs.modal', function(e){

var keterangan = $(e.relatedTarget).data('keterangan');

$(e.currentTarget).find('input[name="keterangan"]').val(keterangan);

});

</script>

<script type="text/javascript">
$('#modal-edit').on ('show.bs.modal', function(e){

  var ed_idrq = $(e.relatedTarget).data('id_request');
  var ed_tgl = $(e.relatedTarget).data('tanggal_masuk');
  var ed_keluhan = $(e.relatedTarget).data('keluhan');
  var ed_ket =$(e.relatedTarget).data('keterangan');
  var ed_saran =$(e.relatedTarget).data('saran_teknisi');

  $(e.currentTarget).find('input[name="ed_idrq"]').val(ed_idrq);
  $(e.currentTarget).find('input[name="ed_tgl"]').val(ed_tgl);
  $(e.currentTarget).find('input[name="ed_keluhan"]').val(ed_keluhan);
  $(e.currentTarget).find('input[name="ed_ket"]').val(ed_ket);
  $(e.currentTarget).find('input[name="ed_saran"]').val(ed_saran);
});
</script>
</body>
</html>
