<?php 
require_once '../database/config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../login/css/bootstrap-login-form.min.css" />
</head>

<body>
  <!-- Start your project here-->

  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }
    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="../img/logoservice.png" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Service Komputer</h4>
                  </div>

                  <form role="form" class="form-layout" action="" method="post">
                    <p>Silahkan Masuk Ke Akun Anda</p>

                    <div class="form-outline mb-4">
                      <input type="username" id="form2Example11" name="username" class="form-control" placeholder="Phone number or email address"/>
                      <label class="form-label" for="form2Example11">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example22" name="password" class="form-control" />
                      <label class="form-label" for="form2Example22">Password</label>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="login" type="submit">Masuk</button>
                      <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                    </div>

                    <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <button type="button" class="btn btn-outline-danger">Create new</button>
                    </div> -->

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
                      $_SESSION['user'] = $datauser['username'];
                      $_SESSION['nama'] = $datauser['nama'];
                      $_SESSION['hak_akses'] = $datauser['hak_akses'];
                      echo '<script>window.location = "../superadmin_dashboard" </script>';
                    }
                    elseif ($st_user==1){
                      $_SESSION['user'] = $datauser['username'];
                      $_SESSION['nama'] = $datauser['nama'];
                      $_SESSION['hak_akses'] = $datauser['hak_akses'];
          
                      echo '<script> window.location= "../admin_dashboard"</script>';
                    }
                    elseif ($st_user==2){
                      $_SESSION['user'] = $datauser['username'];
                      $_SESSION['nama'] = $datauser['nama'];
                      $_SESSION['hak_akses'] = $datauser['hak_akses'];
          
                      echo '<script> window.location= "../teknisi_dashboard"</script>';
          
                    }

                  }
                  else {
                    session_destroy();
                    echo '<script>window.location = "../gagal" </script>';
                  }
                  
                  ?>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">Service Komputer</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="../login/js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>