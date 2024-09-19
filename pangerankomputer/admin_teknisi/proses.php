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
        
        $idrq = $_GET['hps_teknisi'];

        if ($idrq !=null){
           $qrdeltek= mysqli_query($koneksi," DELETE FROM tbl_teknisi WHERE id_teknisi ='$idrq'")or die (mysqli_error($koneksi));
   

           echo '<script> window.location="../admin_teknisi" </script>';
        }
        else{
           echo '<script> alert("Data angkatan dengan kode angkatan '.$idrq.' berhasil dihapus?")</script>';
           echo '<script> window.location="../admin_teknisi" </script>';
   
        }
        
     
     
    ?>
</body>
</html>