<?php
session_start();
require_once '../database/config.php';
$konstruktor = 'admin_requestservice';
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
  $querycrossauth = mysqli_query($koneksi, "INSERT INTO tbl_cross_auth VALUES (NULL,'$usr','$waktu', '$ket')") or die (mysqli_error($koneksi));
  // echo '<script>window.location="../login/logout.php"</script>';

  
}
else 
{
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

        
        <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Request Service</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="tambah_data.php" data-id_request="<?= $dt_request['id_request']; ?>" class="btn btn-sm btn-warning">
                <i class="nav-icon fas fa-download" ></i> <b>Tambah Data</b>
               
              </a>
              <br>
              <br>
              <a href="../admin_requestservice" class="btn btn-sm btn-danger"> Belum Delegasi
                <?php
                $belumdelegasi = mysqli_query($koneksi,"SELECT * FROM tbl_request WHERE status=1") or die (mysqli_error($koneksi));
                $jmlbelimdelegasi = mysqli_num_rows($belumdelegasi);
               
                ?>
              <span class="badge badge-secondary right"><?=$jmlbelimdelegasi;?></span>
              </a>
              <a href="sudahdelegasi.php" class="btn btn-sm btn-primary"> Sudah Delegasi
              <?php
                $sudahdelegasi = mysqli_query($koneksi,"SELECT * FROM tbl_request WHERE status=2") or die (mysqli_error($koneksi));
                $jmlsudahdelegasi = mysqli_num_rows($sudahdelegasi);
               
                ?>
              <span class="badge badge-secondary right"><?=$jmlsudahdelegasi;?></span>
              </a>
              <a href="saranperbaikan.php" class="btn btn-sm btn-warning"> Saran Perbaikan
              <?php
                $belumdelegasi = mysqli_query($koneksi,"SELECT * FROM tbl_request WHERE status=3") or die (mysqli_error($koneksi));
                $jmlbelimdelegasi = mysqli_num_rows($belumdelegasi);
               
                ?>
              <span class="badge badge-secondary right"><?=$jmlbelimdelegasi;?></span>
              </a>
              <a href="sedangproses.php" class="btn btn-sm btn-info"> Sedang Diproses
              <?php
                $belumdelegasi = mysqli_query($koneksi,"SELECT * FROM tbl_request WHERE status=4") or die (mysqli_error($koneksi));
                $jmlbelimdelegasi = mysqli_num_rows($belumdelegasi);
               
                ?>
              <span class="badge badge-secondary right"><?=$jmlbelimdelegasi;?></span>
              </a>
              <a href="selesai.php" class="btn btn-sm btn-success"> Selesai
              <?php
                $belumdelegasi = mysqli_query($koneksi,"SELECT * FROM tbl_request WHERE status=5") or die (mysqli_error($koneksi));
                $jmlbelimdelegasi = mysqli_num_rows($belumdelegasi);
               
                ?>
              </a>
              <a href="dibatalkan.php" class="btn btn-sm btn-danger"> Dibatalkan
              <?php
                $belumdelegasi = mysqli_query($koneksi,"SELECT * FROM tbl_request WHERE status=0") or die (mysqli_error($koneksi));
                $jmlbelimdelegasi = mysqli_num_rows($belumdelegasi);
               
                ?>
              </a>
                      
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No</th>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>keluhan</th>
                    <th>keterangan</th>
                    <th>saran</th>
                    <th>Status</th>
                    <th>aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1;
                    $qr_request = mysqli_query($koneksi, "SELECT * FROM tbl_request WHERE status=2 ORDER BY tanggal_request DESC") or die (mysqli_error($koneksi));

                    if (mysqli_num_rows($qr_request)> 0) {
                      while ($dt_request = mysqli_fetch_array($qr_request)){
                        ?>
                        <tr>
                        <td><?= $no++ ; ?></td>
                        <td>
                          <?php 
                          $tgl = strtotime($dt_request['tanggal_request']);
                          $newdate = date('d F Y',$tgl);
                        ?>
                        <?=$newdate;?>
                        </td>
                        <td><?= $dt_request['nama_cust']; ?></td>
                        <td><?= $dt_request['alamat']; ?></td>
                        <td><center>
                        <a href="https://api.whatsapp.com/send?phone=<?=$dt_request['kontak'];?>&text=Hallo, <?=$dt_request['nama_cust'];?>" class="btn btn-sm btn-success" target="_blank">
                        <img src="../img/wa.png" height="18px" weight="18px"><?=$dt_request['kontak'];?></a>
                        </center></td>
                        <td><?= $dt_request['keluhan']; ?></td>
                        <td>
                          <button type="button" class="btn  btn-info btn-edit" data-toggle="modal" data-target="#modal-ket" data-keterangan="<?= $dt_request['keterangan']; ?>"><i class="nav-icon fas fa-eye"></i>
                          </button>
                        </td>
                        <td><?= $dt_request['saran_teknisi']; ?></td>
                        <td>
                          <center>
                      <?php
                      $idteknisi = $dt_request['id_teknisi'];
                      $pglteknisi = mysqli_query($koneksi,"SELECT nama FROM tbl_teknisi WHERE id_teknisi = '$idteknisi'")or die (mysqli_error($koneksi));
                      $arrteknisi = mysqli_fetch_assoc($pglteknisi);
                      
                      if($dt_request['status'] == '0'){
                        ?>
                        <button type="button" class="btn btn-sm btn-danger"> Dibatalkan</button>
                        <?php
                      }
                      if($dt_request['status'] == '1'){
                        ?>
                        <button type="button" class="btn btn-sm btn-danger"> Belum delegasi</button>
                        <?php
                      }
                      if($dt_request['status'] == '2'){
                        
                        ?>
                        <button type="button" class="btn btn-sm btn-info"> Sudah delegasi</button>
                        <br> 
                        <?php $namateknisi = $arrteknisi['nama']; ?>
                        <?=$namateknisi;?>
                        <?php
                      }
                      if($dt_request['status'] == '3'){
                        ?>
                        <button type="button" class="btn btn-sm btn-success"> Sudah Dikasih Saran</button><br>
                        <?php $namateknisi = $arrteknisi['nama']; ?>
                        <?=$namateknisi;?>
                        

                        <?php
                        
                      }
                      if($dt_request['status'] == '4'){
                        ?>
                        <button type="button" class="btn btn-sm btn-primary"> Sedang Diproses</button><br>
                        <?php $namateknisi = $arrteknisi['nama']; ?>
                        <?=$namateknisi;?>
                        

                        <?php
                        
                      }
                      if($dt_request['status'] == '5'){
                        ?>
                        <button type="button" class="btn btn-sm btn-primary"> Selesai</button><br>
                        <?php $namateknisi = $arrteknisi['nama']; ?>
                        <?=$namateknisi;?>
                        

                        <?php
                        
                      }

                      ?>
                      </center>
                      
                      
                      </td>
                        <td>
                        <button type="button" class="btn  btn-sm btn-info btn-edit" data-toggle="modal" data-target="#modal-edit" data-id_request="<?= $dt_request['id_request']; ?>" data-nama_cust="<?= $dt_request['nama_cust']; ?>" data-kontak="<?= $dt_request['kontak']; ?>" data-alamat="<?= $dt_request['alamat']; ?>" data-tanggal_request="<?= $dt_request['tanggal_request']; ?>" data-keluhan="<?= $dt_request['keluhan']; ?>" data-keterangan="<?= $dt_request['keterangan']; ?>" data-id_teknisi="<?= $dt_request['id_teknisi']; ?>" data-saran_teknisi="<?= $dt_request['saran_teknisi']; ?>" data-status="<?= $dt_request['status']; ?>" ><i class="nav-icon fas fa-edit"></i></button>
                        <a href="proses.php?hps_request=<?= encriptData($dt_request['id_request']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus request dengan id [<?= encriptData($dt_request['id_request']);?>]')"><i class="fas fa-trash"></i></a>
                        
                     
                        <?php 
                        if ($dt_request['status'] != '3') { ?>
                        <button type="button" name="delegasi" class="btn btn-sm btn-info btn-edit" data-toggle="modal" data-target="#modal-delegasi" data-id_request="<?= $dt_request['id_request']; ?>">
                          <i class="nav-icon fas fa-eye"></i> Delegasi
                        </button>
                        <?php }
                        else { ?>
                        <a href="proses_service.php?service=<?=$dt_request['id_request']; ?>" class="btn btn-sm btn-primary" onclick="return confirm('Proses Service Ini?')"><i class="fas fa-spinner"></i>Proses</a>
                        <a href="proses_batal.php?service=<?=$dt_request['id_request']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bataklkan Proses Service Ini?')"><i class="fas fa-"></i>Batal</a>
                        <?php } ?>


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
                        <td width="30%">Nama Pelanggan</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_nama" class="form-control"></td>
                      </tr>
                      <tr>
                        <td width="30%">Kontak</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_kontak" class="form-control"></td>
                      </tr>
                      <tr>
                        <td width="30%">Alamat</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_alamat" class="form-control"></td>
                      </tr>
                      <tr>
                        <td width="30%">Tanggal</td>
                        <td width="5%">:</td>
                        <td><input type="date" name="ed_tgl" class="form-control">                    
                      </td>
                      </tr> 
                      <tr>
                        <td width="30%">Keluhan</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_keluhan" class="form-control"></td>
                      </tr>
                      <tr>
                        <td width="30%">keterangan</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_ket" class="form-control"></td>
                      </tr>
                      <tr>
                        <td width="30%">Id Teknisi</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_idtek" class="form-control" hidden>
                        <input type="text" name="ed_idtek" class="form-control" disabled>
                      </td>
                      </tr>
                      
                      <tr>
                        <td width="30%">Saran</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_saran" class="form-control"hidden>
                        <input type="text" name="ed_saran" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td width="30%">Status</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_stt" class="form-control"></td>
                      </tr>
                     
                    </tbody>
                  </thead>
                </table>
            </div>
            <div class="modal-footer justify-content-right">
              
              <button type="submit" class="btn btn-primary" name="editrequest" > <i class="nav-icon fas fa-edit"></i>Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-delegasi">
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
  var ed_nama =$(e.relatedTarget).data('nama_cust');
  var ed_kontak =$(e.relatedTarget).data('kontak');
  var ed_alamat =$(e.relatedTarget).data('alamat');
  var ed_tgl = $(e.relatedTarget).data('tanggal_request');
  var ed_keluhan = $(e.relatedTarget).data('keluhan');
  var ed_ket =$(e.relatedTarget).data('keterangan');
  var ed_idtek =$(e.relatedTarget).data('id_teknisi');
  var ed_saran =$(e.relatedTarget).data('saran_teknisi');
  var ed_status =$(e.relatedTarget).data('status');

  $(e.currentTarget).find('input[name="ed_idrq"]').val(ed_idrq);
  $(e.currentTarget).find('input[name="ed_nama"]').val(ed_nama);
  $(e.currentTarget).find('input[name="ed_kontak"]').val(ed_kontak);
  $(e.currentTarget).find('input[name="ed_alamat"]').val(ed_alamat);
  $(e.currentTarget).find('input[name="ed_tgl"]').val(ed_tgl);
  $(e.currentTarget).find('input[name="ed_keluhan"]').val(ed_keluhan);
  $(e.currentTarget).find('input[name="ed_ket"]').val(ed_ket);
  $(e.currentTarget).find('input[name="ed_idtek"]').val(ed_idtek);
  $(e.currentTarget).find('input[name="ed_saran"]').val(ed_saran);
  $(e.currentTarget).find('input[name="ed_stt"]').val(ed_status);
});
</script>

<script type="text/javascript">
$('#modal-delegasi').on ('show.bs.modal', function(e){

  var ed_idrq = $(e.relatedTarget).data('id_request');
 
  

  $(e.currentTarget).find('input[name="id_delegasi"]').val(ed_idrq);
  
});
<?php
}
?>
</script>
</body>
</html>
