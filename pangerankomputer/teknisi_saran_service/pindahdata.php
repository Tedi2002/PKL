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
if(isset($_POST['editsaran'])) {   
    $id = mysqli_real_escape_string($koneksi, $_POST['id_request']);

    $sql_pindah = mysqli_query($koneksi,"UPDATE tbl_saranservice SET id_request='$id' WHERE id_request = '$id'")
    or die (mysqli_error($koneksi));

    if($sql_pindah > 0){
        $sql_hapus = mysqli_query($koneksi,"UPDATE tbl_request SET status='3' WHERE id_request = '$id'");
        echo '<script>alert("Berhasil"," menambahkan data ke tabel teknisi dengan ID : ['.$id.'] Berhasil ditambahkan.")</script>';
        echo '<script>window.location="../teknisi_saran_service"</script>';
   
    }
}

    ?>
</body>
</html>