<html>
<head>

</head>
<body>
<?php

require_once '../database/config.php';

session_start();
//triger tombol tambah data pada halaman sebelumnya

if (isset($koneksi, $_POST['tambahdata'])){


$id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
$user = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
$nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
$akses = trim(mysqli_real_escape_string($koneksi, $_POST['hak_akses']));
$pass = sha1($user);



$quaryceknikuser = mysqli_query($koneksi, "SELECT id,username FROM tbl_login WHERE id='$id' AND username='$user'") or die (mysqli_error($koneksi));

if (mysqli_num_rows($quaryceknikuser)>0){
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Duplikat Data","Data Pengguna Sudah Ada Pada Database","error");
        setTimeout(function(){
            window.location.href ="../admin_pengguna";
        }, 2000);
    </script>
   
    <?php
}
else
{
$tambahdata = mysqli_query($koneksi,"INSERT INTO tbl_login VALUES ('$id','$user','$nama','$pass','$akses')") or die (mysqli_error($koneksi));
?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Bersahil","Data Pengguna berhasil ditambah","success");
        setTimeout(function(){
            window.location.href ="../admin_pengguna";
        }, 2000);
    </script>
 <?php
}
}
?>

 </body> 
</html>
