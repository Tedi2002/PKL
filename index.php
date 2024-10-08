<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Komputer</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- mys style -->
    <link rel="stylesheet" href="frontend/css/style.css" />
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">teknowis<span>computer</span></a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#layanan">Pelayanan</a>
        <a href="#contact">Kontak</a>
        <a href="login/index.php" target="_blank">Login</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- Navbar end -->

    <!--Hero Section start-->
    <section class="hero" id="home">
      <main class="content">
        <h1>Solusi Permasalahan <span>IT Kamu</span></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, adipisci.</p>
        <a href="#" class="cta">Hubungi Kami</a>
      </main>
    </section>
    <!--Hero Section end-->

    <!--About Section start-->
    <section id="about" class="about">
      <h2><span>Tentang</span> Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="../frontend/img/tentang-kami.jpg" alt="Tentang Kami">
        </div>
        <div class="content">
          <h3>Kenapa harus memilih jasa layanan kamu?</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium impedit numquam amet assumenda, qui consectetur!</p>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem unde tenetur a explicabo adipisci optio quas laboriosam autem voluptatum nihil!</p>
        </div>
      </div>
    </section>
    <!--About Section end-->

    <!-- MEnu Section Start -->
    <section id="layanan" class="layanan">
      <h2><span>Layanan</span> Kami</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deleniti, ipsam ad excepturi autem libero fuga explicabo.
      </p>
      
      <div class="row">
        <div class="layanan-card">
          <img src="frontend/img/menu/1.jpg" alt="Instal" class="layanan-card-img">
          <h3 class="layanan-card-title">Instal Ulang</h3>
          <p class="layanan-card-price">IDR 50k</p>
        </div>
        <div class="layanan-card">
          <img src="frontend/img/menu/1.jpg" alt="Instal" class="layanan-card-img">
          <h3 class="layanan-card-title">Instal Ulang</h3>
          <p class="layanan-card-price">IDR 50k</p>
        </div>
        <div class="layanan-card">
          <img src="frontend/img/menu/1.jpg" alt="Instal" class="layanan-card-img">
          <h3 class="layanan-card-title">Instal Ulang</h3>
          <p class="layanan-card-price">IDR 50k</p>
        </div>
        <div class="layanan-card">
          <img src="frontend/img/menu/1.jpg" alt="Instal" class="layanan-card-img">
          <h3 class="layanan-card-title">Instal Ulang</h3>
          <p class="layanan-card-price">IDR 50k</p>
        </div>
        <div class="layanan-card">
          <img src="frontend/img/menu/1.jpg" alt="Instal" class="layanan-card-img">
          <h3 class="layanan-card-title">Instal Ulang</h3>
          <p class="layanan-card-price">IDR 50k</p>
        </div>
        <div class="layanan-card">
          <img src="frontend/img/menu/1.jpg" alt="Instal" class="layanan-card-img">
          <h3 class="layanan-card-title">Instal Ulang</h3>
          <p class="layanan-card-price">IDR 50k</p>
        </div>
      </div>
    </section>
    <!-- MEnu Section end -->

    <!-- contact section start -->
    <section id="contact" class="contact">
      <h2><span>Kontak</span> Kami</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed, accusamus.
      </p>

      <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.8137159449407!2d110.29085744331422!3d-7.096430154339555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70625104e4c759%3A0x6cc0c32f575a1444!2sPerum%20Campurejo%20Asri!5e0!3m2!1sid!2sid!4v1694575986018!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
      
        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="nama">
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" placeholder="email">
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" placeholder="no hp">
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </form>
      </div>
    </section>
    <!-- contact section end -->

    <!-- footer start -->
    <footer>
      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#layanan">Pelayanan</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by <a href="">wisnoeadhie</a>. | &copy; 2023.</p>
      </div>
    </footer>
    <!-- footer end -->

    <!-- feather icons -->
    <script>
      feather.replace();
    </script>

    <!-- my javascript-->
    <script src="frontend/js/script.js"></script>
  </body>
</html>
