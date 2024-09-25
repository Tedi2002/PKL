<?php
session_start();
require_once '../database/config.php';
$konstruktor = 'admin_penjualan';
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
            <h1 class="m-0">Dashboard Admin Data Penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Admin Data Penjualan</li>
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
        <div class="col-lg-5">
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class ="nav-icon fas fa-shopping-cart"></i>&nbsp; Service selesai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tgl</th>
                    <th>Servisan</th>
                    <th>aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1;
                    $qr_nota = mysqli_query($koneksi, "SELECT * FROM tbl_request WHERE status=5 ORDER BY tanggal_request DESC") or die (mysqli_error($koneksi));

                    if (mysqli_num_rows($qr_nota)> 0) {
                      while ($dt_nota = mysqli_fetch_array($qr_nota)){
                        ?>
                        <tr>
                        <td><?=$dt_nota['tanggal_request'];?></td>
                        <td><?= $dt_nota['nama_cust']; ?>
                        <br>--------------------------------
                         <br><?= $dt_nota['saran_teknisi']; ?>
                         </td>
                        <td>
                          <form name = "nota" action="" method="POST">
                        <input name="idreq" value="<?=$dt_nota['id_request']?>" hidden>
                        <button type="submit" name = "nota"class="btn btn-sm btn-danger"><i class="nav-icon fas fa-file"></i> Nota</button>
                        </form>
                      </td>
                      </tr>        
                  </tbody>
                  <?php
                      }
                  ?>
                
                </table>
            </div>
            <!-- /.card -->

         </div>
        </div>
        <div class="col-lg-7">
         <div class="card card-primary">
              <div class="card-header">
                <?php
                $kodepj = "PNJ-";
                $hari_ini = date('Y-m-d');

                //panggil jumlah pada hari ini
                $querynota = mysqli_query($koneksi,"SELECT * FROM tbl_nota WHERE tanggal_nota='$hari_ini'") or die (mysqli_error($koneksi));
                //jumlahdata
                $jmlnotahariini = mysqli_num_rows($querynota);
                $kodenota = $kodepj.($jmlnotahariini+1);
                ?>
                <h3 class="card-title"><i class ="nav-icon fas fa-file"></i>&nbsp; Nota : <?=$kodenota;?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <?php

                if(isset($_POST['nota'])){
                  $idreq =trim(mysqli_real_escape_string($koneksi, $_POST['idreq']));
                    ?>
                     <button type="button" class="btn btn-sm btn-primary" name="tambahitem"><i class="nav-icon fas fa-plus"></i> Tambah item</button>
             <a href="detailnotapenjualan.php" class="btn btn-sm btn-danger"> <i class="nav-icon fas fa-file"></i> Detail Nota Penjualan</a>
             <a href="nota.php?id_nota=<?=$idreq;?>" class="btn btn-secondary btn-sm" target="_blank"><i class="nav-icon fas fa-print"></i> Cetak Nota</a>
             <br>
             <br>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1;
                    $qr_nota = mysqli_query($koneksi, "SELECT * FROM tbl_nota WHERE id_request='$idreq'") or die (mysqli_error($koneksi));

                    if (mysqli_num_rows($qr_nota)> 0) {
                      while ($dt_nota = mysqli_fetch_array($qr_nota)){
                        ?>
                        <tr>
                        <td><?= $no++ ; ?></td>
                        <td><?= $dt_nota['item']; ?></td>
                        <td><?= $dt_nota['qty']; ?></td>
                        <td><?= $dt_nota['harga']; ?></td>
                        <td><?= $dt_nota['subtotal']; ?></td>
                        
                        
                      
                      </tr>
                      <?php }
                    }
                    else {
                      ?>
                      <tr>
                        <td colspan="5">
                          Data Belum Ada
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  
                  
                  </tbody>
                  <tfoot>
                    <td colspan="4"> <b>TOTAL PENJUALAN :</b></td>
                    <td> <b>Rp 2.000.000,- </b></td>
                  </tfoot>
                </table>
                    <?php
                  $qrpglnota = mysqli_query($koneksi, "SELECT * FROM tbl_nota WHERE id_request='$idreq'") or die (mysqli_error($koneksi)); 
                  
                }
                ?>
                
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

<div class="modal fade" id="modal-nota">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#800000">
              <h4 class="modal-title"><font color="ffffff">Deligasi</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="pindahdata.php" method="POST" id="deligasi">
            <div class="modal-body">

                <table>
                  <thead>
                    <tbody>
                    <tr>
                        <td><div class="form-group">
                    <label for="prodi">Teknisi</label>
                    <input type="text" name="id_delegasi" class="form-control" hidden>
                   <select class="form-control" name="id_teknisi" required>

                    <option value="">-- Teknisi --</option>
                    <?php
                    //panggil data pada tabel prodi
                    $pglteknisi = mysqli_query($koneksi, "SELECT * FROM tbl_teknisi")or die(mysqli_error($koneksi));

                    //buat variabel untuk menampung return value dari query $pglprodi
                    $rvtek = mysqli_num_rows($pglteknisi);

                    //kondisi jika tabel_prodi memiliki <= 1 data
                    if($rvtek>0){

                        //melakukan perulangan untuk menampilkan data
                        while($dt_tek = mysqli_fetch_array($pglteknisi)){

                        //tampilkan data pada option di elemen select
                        ?>
                        <option value="<?=$dt_tek['id_teknisi']; ?>"><?=$dt_tek['nama'];?></option>
                    <?php   
                    }
                    }
                //kondisi jjika tabel prodi kosong
                else{

                }
                 ?>
                </select>
                  </div>
                      </td>
                     </tr>
                     
                    </tbody>
                  </thead>
                </table>
            </div>
            <div class="modal-footer justify-content-right">
              
              <button type="submit" class="btn btn-primary" name="pindahdata" > <i class="nav-icon fas fa-edit"></i>Deligasi</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<?php 
}
}
include '../scripts.php';
?>
</body>
</html>
