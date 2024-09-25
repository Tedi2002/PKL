<li class="nav-item">
  <a href="../teknisi_dashboard" class="nav-link <?php if ($konstruktor == 'teknisi_dashboard'){
    echo 'active'; }?>" >
    <i class="fas fa-tachometer-alt mr-2"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item <?php if($konstruktor=='teknisi_saran_service'){echo 'menu-open';} if($konstruktor=='teknisi_service'){echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php if($konstruktor=='teknisi_saran_service'){echo 'active';} if($konstruktor=='teknisi_service'){echo 'active';}?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="../teknisi_saran_service" class="nav-link <?php if($konstruktor=='teknisi_saran_service'){echo 'active';}?>">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Saran Service</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="../teknisi_service" class="nav-link <?php if($konstruktor=='teknisi_service'){echo 'active';}?>">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Service</p>
                </a>
              </li> 
              </ul>
<li class="nav-item">
  <a href="../teknisi_gantipw" class="nav-link <?php if ($konstruktor == 'teknisi_gantipw'){
    echo 'active'; }?>" >
    <i class="fas fa-user mr-2"></i>
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