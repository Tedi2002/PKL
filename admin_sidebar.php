<li class="nav-item">
  <a href="../admin_dashboard" class="nav-link <?php if ($konstruktor == 'admin_dashboard'){
    echo 'active'; }?>" >
    <i class="fas fa-tachometer-alt mr-2"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item <?php
if($konstruktor=='admin_requestservice'){echo 'menu-open';}
if($konstruktor=='admin_dtadmin'){echo 'menu-open';}
if($konstruktor=='admin_teknisi'){echo 'menu-open';}
if($konstruktor=='admin_riwayatservice'){echo 'menu-open';}
if($konstruktor=='admin_pengguna'){echo 'menu-open';}?>">
<a href="#" class="nav-link <?php 
if($konstruktor=='admin_requestservice'){echo 'active';} 
if($konstruktor=='admin_dtadmin'){echo 'active';}
if($konstruktor=='admin_teknisi'){echo 'active';}
if($konstruktor=='admin_pengguna'){echo 'active';}
if($konstruktor=='admin_riwayatservice'){echo 'active';}?>">
<i class="nav-icon fas fa-database"></i>
  <p>Master Data
    <i class="right fas fa-angle-left"></i>
  </p>
</a>
<ul class="nav nav-treeview">            
<li class="nav-item">
  <a href="../admin_dtadmin" class="nav-link <?php if ($konstruktor == 'admin_dtadmin'){
    echo 'active'; }?>" >
    <i class="fas fa-user mr-2"></i>
    <p>
       Data Admin
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="../admin_teknisi" class="nav-link <?php if ($konstruktor == 'admin_teknisi'){
    echo 'active'; }?>" >
    <i class="fas fa-user-cog"></i>
    <p>
       Data Teknisi
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="../admin_requestservice" class="nav-link <?php if ($konstruktor == 'admin_requestservice'){
    echo 'active'; }?>" >
    <i class="fas fa-cog mr-2"></i>
    <p>
       Request Service
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="../admin_pengguna" class="nav-link <?php if ($konstruktor == 'admin_pengguna'){
    echo 'active'; }?>" >
    <i class="fas fa-users mr-2"></i>
    <p>
       Akun Pengguna
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="../admin_riwayatservice" class="nav-link <?php if ($konstruktor == 'admin_riwayatservice'){
    echo 'active'; }?>" >
    <i class="fas fa-history mr-2"></i>
    <p>
       Riwayat Service
    </p>
  </a>
</li>
</ul>
<li class="nav-item">
  <a href="../admin_penjualan" class="nav-link <?php if ($konstruktor == 'admin_penjualan'){
    echo 'active'; }?>" >
    <i class="fas fa-hand-holding-usd mr-2"></i>
    <p>
       Penjualan
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="../admin_gantipw" class="nav-link <?php if ($konstruktor == 'admin_gantipw'){
    echo 'active'; }?>" >
    <i class="fas fa-lock mr-2" ></i>
    <p>
      Ganti Password
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="../login/logout.php" class="nav-link">
    <i class="fas fa-sign-out-alt mr-2"></i>
    <p>
      Keluar
    </p>
  </a>
</li>