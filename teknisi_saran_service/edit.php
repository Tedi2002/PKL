<html>
<head>
	
</head>
<body>
<?php
  require_once '../database/config.php';
  session_start();

if(isset($_POST['editsaran'])) {
  $id       = trim(mysqli_real_escape_string($koneksi, $_POST['ed_idrq']));
  $keluhan  = trim(mysqli_real_escape_string($koneksi, $_POST['ed_keluhan']));
  $saran    = trim(mysqli_real_escape_string($koneksi, $_POST['ed_saran']));
  $jenis    = trim(mysqli_real_escape_string($koneksi, $_POST['ed_jenis']));


  $queryedit = mysqli_query($koneksi, "UPDATE tbl_request SET id_request='$id', keluhan='$keluhan',  saran_teknisi='$saran', jenis_service='$jenis' WHERE id_request='$id' ") or die (mysqli_error($koneksi));

  if($queryedit > 0){
    $sql_update = mysqli_query($koneksi,"UPDATE tbl_request SET status='3' WHERE id_request = '$id'");
    echo '<script>alert("Berhasil"," menambahkan data ke tabel teknisi dengan ID : ['.$id.'] Berhasil ditambahkan.")</script>';
    echo '<script>window.location="../teknisi_saran_service"</script>';

}


}
?>
</body>
</html>