<html>
<head>
	
</head>
<body>
<?php
  require_once '../database/config.php';
  session_start();

if(isset($_POST['editrequest'])) {


  $id = trim(mysqli_real_escape_string($koneksi, $_POST['ed_idrq']));
  $nama   = trim(mysqli_real_escape_string($koneksi, $_POST['ed_nama']));
  $kontak = trim(mysqli_real_escape_string($koneksi, $_POST['ed_kontak'])); 
  $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['ed_alamat']));
  $tgl = trim(mysqli_real_escape_string($koneksi, $_POST['ed_tgl']));
  $keluhan = trim(mysqli_real_escape_string($koneksi, $_POST['ed_keluhan']));
  $ket = trim(mysqli_real_escape_string($koneksi, $_POST['ed_ket']));
  $idtek = trim(mysqli_real_escape_string($koneksi, $_POST['ed_idtek']));
  $saran = trim(mysqli_real_escape_string($koneksi, $_POST['ed_saran']));
  $stt = trim(mysqli_real_escape_string($koneksi, $_POST['ed_stt']));

  $queryedit = mysqli_query($koneksi, "UPDATE tbl_request SET id_request='$id', nama_cust='$nama', kontak='$kontak', alamat='$alamat', tanggal_request='$tgl', keluhan='$keluhan', keterangan='$ket', id_teknisi='$idtek', saran_teknisi='$saran', status='$stt' WHERE id_request='$id'") or die (mysqli_error($koneksi));


?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    swal("berhasil", "data  berhasil edit", "success");
    setTimeout(function() {
    window.location.href ="../admin_requestservice";
  }, 1000);
  </script>
<?php
}
?>
</body>
</html>