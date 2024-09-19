<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     session_start();
     require_once '../database/config.php';

     $idreq = @$_GET['service']; 

     // Cek apakah id_request tersedia
     if ($idreq != null) {
         // Ambil data dari tbl_request berdasarkan id_request
         $query = "SELECT * FROM tbl_request WHERE id_request='$idreq'";
         $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

         if (mysqli_num_rows($result) > 0) {
             $data = mysqli_fetch_array($result);
             
             // Insert data ke tbl_riwayatservice
             $qrprosesservice = mysqli_query($koneksi, 
                "INSERT INTO tbl_riwayatservice (id_request, nama_cust, alamat, kontak, tanggal_request, keluhan, id_teknisi, saran_teknisi, status, jenis_service, keterangan) 
                 SELECT id_request, nama_cust, alamat, kontak, tanggal_request, keluhan, id_teknisi, saran_teknisi, status, jenis_service, keterangan FROM tbl_request WHERE id_request='$idreq'"
             ) or die(mysqli_error($koneksi));

             if ($qrprosesservice) {
                 // Hapus data dari tbl_request
                 $deleteQuery = mysqli_query($koneksi, "DELETE FROM tbl_request WHERE id_request='$idreq'") or die(mysqli_error($koneksi));
                 if ($deleteQuery) {
                     echo '<script>alert("Data Service Dibatalkan dan Dipindahkan ke Riwayat")</script>';
                 }
             }
         }
         echo '<script>window.location="../admin_requestservice"</script>';
     }
    ?>
</body>
</html>
