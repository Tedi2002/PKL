<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
require_once '../database/config.php';
session_start();
if(isset($_POST['pindahdata'])) {  
    $idrq = mysqli_real_escape_string($koneksi, $_POST['id_delegasi']);
    $idtek = mysqli_real_escape_string($koneksi, $_POST['id_teknisi']);

    $sql_update = mysqli_query($koneksi,"UPDATE tbl_request SET status='2', id_teknisi = '$idtek' WHERE id_request = '$idrq'");
    echo '<script>alert("Berhasil"," menambahkan data ke tabel teknisi dengan ID : ['.$idrq.'] Berhasil ditambahkan.")</script>';
    echo '<script>window.location="../admin_requestservice"</script>';

}
    ?>
</body>
</html>