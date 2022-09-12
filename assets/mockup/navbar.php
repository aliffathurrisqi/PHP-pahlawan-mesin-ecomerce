<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><?php echo $company_name; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="katalog.php">Katalog</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li> -->
      </ul>
      <form class="d-flex">
        <a target="_BLANK" class="nav-link text-warning" aria-current="page" href="https://api.whatsapp.com/send/?phone=62<?php echo $company_call; ?>&text&app_absent=0"><i class="bi bi-whatsapp"></i> 0<?php echo $company_call; ?></a>
        <a target="_BLANK" class="nav-link text-warning" aria-current="page" href="mailto:<?php echo $company_email; ?>"><i class="bi bi-envelope"></i> <?php echo $company_email; ?></a>
        <a target="_BLANK" class="btn btn-warning" aria-current="page" href="admin/">Login</a>
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
<!-- Navbar End -->