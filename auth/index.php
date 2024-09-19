<?php 
require_once '../database/config.php'
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>SISFO PT TMI</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="styles/app.min.css"/>
  <link rel="shortcut icon" href="assets/img/logo.png">

</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin v2 usersession">
    <div class="session-wrapper">
      <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image:url(assets/img/1.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
           <div class="item" style="background-image:url(assets/img/2.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(assets/img/3.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
        </div>
      </div>
      <div class="card bg-white  blue no-border" style="background-color:#000435;">
        <div class="card-block">
          <form role="form" class="form-layout" action="" method="post">
            <div class="text-center m-b">    

              <img src="assets/img/logo.png" style='width:300px; height:100px;'/> 
              <h4 class="text-uppercase"><b><font color="#ffffff">NAMA SISTEM</font></b></h4>
              <h4 class="text-uppercase"><font color="#ffffff">PT TANJUNG MULIA INFORMATIKA</font></h4>
            </div>
            <div class="form-inputs p-b">
              <label class="text-uppercase"><font color="#ffffff">Username</font></label>
              <input type="username" class="form-control input-lg" name="username" id="username" placeholder="input username" required>
              <label class="text-uppercase"><font color="#ffffff">Password</font></label>
              <input type="password" class="form-control input-lg" name="password" id="password"  placeholder="input password" required>
              <!-- <a href="lupapassword.php"><font color="#ffffff">Lupa Password?</font></a>
             --></div>
              
               <button class="btn btn-warning btn-block btn-lg" type="submit" name= "login" style="background-color:#D6B70A;"><font color="#ffffff"><img src="assets/img/personkey-white.png">&nbsp<b>Login</b></font></button>

          <br>
          <center><font color="#ffffff"><small><em> Copyright &copy; PT. Tanjung Mulia Informatika </a></em></</small></font>
          <br/>  
           <font color="#ffffff"><?php echo date("Y"); ?></</small></font>
            </center>
          </form>
          <?php 
          if (isset($_POST['login'])) {

            $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
            $password = sha1(trim(mysqli_real_escape_string($koneksi, $_POST['password'])));
            $cekdatabase = mysqli_query($koneksi, "SELECT * FROM tbl_login WHERE username= '$username' AND password='$password'") or die (mysqli_error($koneksi));
            $returnvalue = mysqli_num_rows($cekdatabase);
            if ($returnvalue > 0){
              session_start();
              $datauser = mysqli_fetch_assoc($cekdatabase);
              $_SESSION['user'] = $datauser['user'];
              $_SESSION['nama'] = $datauser['nama'];


              echo '<script>window.location = "../admin_dashboard" </script>';
            }
            else {
              echo '<script>window.location = "../gagal" </script>';
            }


            

          }
          
          ?>

        </div>
      </div>
    </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="scripts/app.min.js"></script>
</body>

</html>
