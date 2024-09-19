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
    
    if ($idreq !=null) {
    $qrprosesservice = mysqli_query($koneksi , "UPDATE tbl_request SET status='4' WHERE id_request='$idreq'") or die (mysqli_error($koneksi));
    echo '<script> alert("Data Service Akan Diproses")</script>';
    echo '<script> window.location="../admin_requestservice" </script>';
    }
     
     
     
    ?>
</body>
</html>