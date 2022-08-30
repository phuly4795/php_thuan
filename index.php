<?php
include_once('db/connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/c9376b777e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/index.css">
    <title>T&P - Trai đẹp bán Full-Face</title>
  </head>
  <style>
   
  </style>
  <body>
   <div class="main">
      <?php
        //include ('include/nav.php');
        include ('include/topbar.php');
        include ('include/slider.php');
        if(isset($_GET['quanly'])){
          $tam = $_GET['quanly'];
        }
        else{
          $tam = '';
        }
        if( $tam == 'danhmuc')
        {
          include ('include/danhmuc.php');
        }
        elseif($tam  == 'chitietsp')
        {
          include ('include/chitietsp.php');
        }
        elseif($tam == 'giohang'){
          include ('include/giohang.php');
        }
        elseif ($tam =='timkiem') {
          include ('include/timkiem.php');
        }
        elseif ($tam == 'lienhe'){
          include ('include/lienhe.php');
        }
        else
        {
          include ('include/content.php');
        }   
        include ('include/footer.php');
      ?>  
      </div>                                   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
</script>
  <style>
    .main{width: 100%;float: left;}
    .navbar{width: 100% ;float: left ;}
    .navbar .logo{float: left; width:15%;}
    .navbar .logo .navbar-brand{width: 50%;}
    .navbar .logo .navbar-brand img{width: 100%; border: none;background: none;}
    .nav .container-fluid{width: 100% !important;}
    h6 , p{text-align: center;}
    a{text-decoration: none; }
    a:hover{color: #C89979 !important;}
    i{font-size: 22px;color: #C89979;}
    .container-fluid{font-size: 22px;float: left;}
    .d-flex button{color: #BE9329;border: 1px solid #BE9329;}
    .d-flex button:hover{background-color: #E2BA48 !important;border: 1px solid #BE9329;}
    .card:hover{transform:none;}
    footer{clear: both;}
    nav{float: left;width: 100%;}
  </style>