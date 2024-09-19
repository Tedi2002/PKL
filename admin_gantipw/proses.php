<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ganti Password | Admin</title>
</head>
<body>
  <?php 
  session_start();
  require_once '../database/config.php';

  //triger button gantipw
  if(isset($con, $_POST['gantipw'])){

    //membuat variable untuk menampung elemen yang di post sesuai dengan atribut "name" nya
    $user = trim(mysqli_real_escape_string($con, $_POST['user']));
    $pwlama = sha1(trim(mysqli_real_escape_string($con, $_POST['pwlama'])));
    $pwbaru = sha1(trim(mysqli_real_escape_string($con, $_POST['pwbaru'])));

    //membuat query cek dari tabel pengguna berdasarkan value elemen $user
    $querycekpw = mysqli_query($con, "SELECT * FROM tbl_pengguna WHERE username='$user'") or die (mysqli_error($con));

    // simpan array hasil query diatas pada variabel $arr
    $arr = mysqli_fetch_assoc(($querycekpw));

    // jika value array dari kolom password tidak sama dengan $pwlama
      if ($arr['password']!=$pwlama){

        // jika password lama tidak sesuai dengan inputan maka tampilkan
        echo '<script>alert("Password lama tidak sesuai broo")</script>';
        echo '<script>
          window.location="../admin_gantipw"</script>';
      }
      else {
        // jika password lama sesuai dengan inputan maka tampilkan
        $queryupdatepw = mysqli_query($con, "UPDATE tbl_pengguna SET password= '$pwbaru' WHERE username = '$user'") or die (mysqli_error($con));
        echo '<script>alert("Password Telah Diubah Silahkan Login")</script>';
        echo '<script>
          window.location="../login/logout.php"</script>';
      }
  }
  ?>
</body>
</html>