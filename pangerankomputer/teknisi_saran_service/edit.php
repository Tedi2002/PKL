<html>
<head>
	
</head>
<body>
<?php
  require_once '../database/config.php';
  session_start();

if(isset($_POST['editsaran'])) {
  $id = trim(mysqli_real_escape_string($koneksi, $_POST['ed_idrq']));
  // $tanggal = date('d-m-Y');
  $keluhan = trim(mysqli_real_escape_string($koneksi, $_POST['ed_keluhan']));
  // $ket = trim(mysqli_real_escape_string($koneksi, $_POST['ed_ket']));
  $saran = trim(mysqli_real_escape_string($koneksi, $_POST['ed_saran']));

  $queryedit = mysqli_query($koneksi, "UPDATE tbl_request SET id_request='$id', keluhan='$keluhan',  saran_teknisi='$saran' WHERE id_request='$id'") or die (mysqli_error($koneksi));

  if($queryedit > 0){
    $sql_update = mysqli_query($koneksi,"UPDATE tbl_request SET status='3' WHERE id_request = '$id'");
    echo '<script>alert("Berhasil"," menambahkan data ke tabel teknisi dengan ID : ['.$id.'] Berhasil ditambahkan.")</script>';
    echo '<script>window.location="../teknisi_saran_service"</script>';

}


}
?>
</body>
</html>