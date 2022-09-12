<?php
    $about = mysqli_query($conn, "SELECT * FROM company");
    while ($row = mysqli_fetch_array($about)){
        $company_name = $row['name'];
        $company_desc = $row['c_desc'];
        $company_logo = $row['logo'];
        $company_call = $row['nomor_telepon'];
        $company_img = $row['img'];
        $company_email = $row['email'];
    }
?>