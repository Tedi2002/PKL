<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Proses Master Data teknisi</title>
</head>
<body>

   <?php

   require_once '../database/config.php';
   session_start();

   //trigger button tambahmhs dari halaman tambahmahasiswa.php
   if(isset($koneksi, $_POST['tambah'])){
      
      // $id_teknisi = trim(mysqli_real_escape_string($koneksi, $_POST['id_teknisi']));
      $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
      $kontak   = trim(mysqli_real_escape_string($koneksi, $_POST['kontak']));
      $alamat   = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
      
      $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_teknisi WHERE nama ='$nama'") or die(mysqli_error($koneksi));
      $rvteknisi = mysqli_num_rows($querycek);

      if ($rvteknisi>0) {
         ?>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script>
            swal("Duplikat Data", "Data teknisi Nama teknisi : <?=$nama;?> sudah ada dalam database", "error");
            setTimeout(function(){
               window.location.href = "../admin_teknisi";
            }, 1500);
         </script>
         <?php
         
      } 
      else{
         $tambahteknisi= mysqli_query($koneksi, "INSERT INTO  tbl_teknisi VALUES 
            (null, 
            '$nama',
            '$kontak',  
            '$alamat')") or die(ysqli_error($koneksi));

         
      ?>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script>
            swal("Berhasil", "Data Teknisi Nama teknisi : <?=$nama;?> berhasil ditambahkan", "success");
            setTimeout(function(){
               window.location.href = "../admin_teknisi";
            }, 1500);
         </script>
         <?php
      }
   }
   else{
        $idrq = $_GET['hps_teknisi'];

        echo $idrq;
        if ($idrq !=null){
           $qrdelrequest= mysqli_query($koneksi," DELETE FROM tbl_teknisi WHERE id_teknisi ='$idrq'")or die (mysqli_error($koneksi));
   
           echo '<script> window.location="../admin_teknisi" </script>';
        }
        else{
           echo '<script> alert("Data Teknisi dengan id teknisi '.$id_teknisi.' berhasil dihapus?")</script>';
           echo '<script> window.location="../admin_teknisi" </script>';
   
        }
        
     }

   ?>
   
</body>
</html>