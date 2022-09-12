<style>
.b-example-divider {
  height: 3rem;
  background-color: rgba(0, 0, 0, .1);
  border: solid rgba(0, 0, 0, .15);
  border-width: 1px 0;
  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.bi {
  vertical-align: -.125em;
  fill: currentColor;
}
</style>
<div class="container-fluid bg-dark text-white ps-2 pe-2">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-2 text-muted">&copy; 
      <?php
      $thisyear = mysqli_query($conn, "SELECT DATE_FORMAT(NOW(), '%Y') AS tahun");
      while ($row = mysqli_fetch_array($thisyear)){
        $year = $row['tahun'];
      }
        echo $year." ".$company_name." - Template by Alfari Studio"; 
      ?>
    </p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto text-white link-white text-decoration-none">
    <h3 class="text-center"><?php echo $company_name;?></h3>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a target="_BLANK" class="nav-link px-2 text-white" href="https://api.whatsapp.com/send/?phone=62<?php echo $company_call; ?>&text&app_absent=0"><i class="bi bi-whatsapp fs-5"></i></a></li>
      <li class="nav-item"><a target="_BLANK" class="nav-link px-2 text-white" href="mailto:<?php echo $company_email; ?>"><i class="bi bi-envelope fs-5"></i></a></li>
    </ul>
  </footer>
</div>