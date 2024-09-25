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
    
     if (isset($_POST['tambahrequest'])) {
        // $idrq =trim(mysqli_real_escape_string($koneksi,$_POST['idrq']));
        $tanggal =date('Y-m-d');
        $namap =trim(mysqli_real_escape_string($koneksi, $_POST['namap']));
        $kontak =trim(mysqli_real_escape_string($koneksi,$_POST['kontak']));
        $alamat =trim(mysqli_real_escape_string($koneksi,$_POST['alamat']));
        $keluhan =trim(mysqli_real_escape_string($koneksi, $_POST['keluahan']));
        $ket =trim(mysqli_real_escape_string($koneksi,$_POST['ket']));
        $stt=1;
        
        $sql = mysqli_query($koneksi,"INSERT INTO tbl_request VALUES (NULL,'$namap','$alamat','$kontak','$tanggal','$keluhan', '$ket',NULL, NULL, '$stt', NULL)") or die (mysqli_error($koneksi));
            echo '<script> alert(" Data Berhasil Di Tambahkan ")</script>';
            echo '<script> window.location="../admin_requestservice" </script>';

     }
     else
     {
        $idrq = $_GET['hps_request'];
        $decript = decriptData($idrq);

        
        if ($idrq !=null){
           $qrdelrequest= mysqli_query($koneksi," DELETE FROM tbl_request WHERE id_request ='$decript'")or die (mysqli_error($koneksi));
   
           echo '<script> window.location="../admin_requestservice" </script>';
        }
        else{
           echo '<script> alert("Data angkatan berhasil dihapus?")</script>';
           echo '<script> window.location="../admin_requestservice" </script>';
   
        }
      }
     
     
     
    ?>
</body>
</html>