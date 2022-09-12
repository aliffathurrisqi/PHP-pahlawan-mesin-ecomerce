<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title><?php echo $company_name;?></title>
<?php
        if($company_logo){        
    ?>
    <link rel="icon" href="assets/image/website/logo/<?php echo $company_logo;?>">
    <?php     
        }
    ?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css");

body{
	font-family: 'Poppins', sans-serif;
	line-height: 1.7;
	overflow-x: hidden;
	background-color: #F8F8F8;
	background-image: url("assets/image/website/background/bg_white.jpg");
	background-size:contain;
	background-repeat: repeat;
}

.linked{
	color:black;
	text-decoration: none;
}

.linked:hover{
	color:#33383F;
}

.produk_kat_link{
	color:#FFC107;
	text-decoration: none;
}

.produk_kat_link:hover{
	color:#33383F;
	text-decoration: none;
}

.produk_name_link{
	color:black;
	text-decoration: none;
}

.produk_name_link:hover{
	color:#33383F;
}

@media only screen and (max-width: 600px) {
  body {
    font-size: 8pt;
  }

  h6{
	font-size: 10pt;
  }

  h3{
	font-size: 14pt;
  }

  .btn{
	font-size: 10pt;
  }
}

@media only screen and (max-width: 1200px) {
  body {
    font-size: 10pt;
  }

  h6{
	font-size: 12pt;
  }

  h3{
	font-size: 16pt;
  }

  .btn{
	font-size: 12pt;
  }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>