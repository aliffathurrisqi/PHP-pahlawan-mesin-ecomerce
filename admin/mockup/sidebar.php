<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center mt-5" href="index.php">
    <div class="sidebar-brand-icon rotate-n-0">
        <?php
            if($company_logo){
        ?>
            <img src="../assets/image/website/logo/<?php echo $company_logo;?>" class="w-50">
        <?php
            }
        ?>
        <br><br>
        <div class="sidebar-brand-text"><?php echo $company_name;?></div>
    </div>
    
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0 mt-5">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Website
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="profile.php">
        <i class="fas fa-fw fa-globe"></i>
        <span>Profil Website</span>
    </a>
</li>


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="bi bi-card-text"></i>
        <span>Katalog</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Katalog :</h6>
            <a class="collapse-item" href="produk.php"><i class="fas fa-box"></i></i> Produk</a>
            <a class="collapse-item" href="kategori.php"><i class="fas fa-tag"></i> Kategori</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Tampilan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="landing_page.php">
        <i class="bi bi-star-fill"></i>
        <span>Landing Page</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<li class="nav-item">
    <a class="nav-link" target="_BLANK" href="../index.php">
    <i class="bi bi-arrow-right"></i>
        <span>Lihat Website</span></a>
    <a class="nav-link" href="ubah_password.php">
    <i class="bi bi-key"></i>
        <span>Ubah Password</span></a>
    <a class="nav-link" href="logout.php">
    <i class="bi bi-power"></i>
        <span>Keluar Admin</span></a>
</li>

<!-- Sidebar Message -->

</ul>
<!-- End of Sidebar -->