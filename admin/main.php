<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('location: index.php');
    }
    if(isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    }
    else{
        $dangxuat ='';
    }
    if($dangxuat=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('location:index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SYSTEM ADMIN</title>
</head>
<body> 
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="float: left; width:100%">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">    
        <li class="nav-item">
          <a class="nav-link" href="xulydanhmuc.php"><h3>Danh mục</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="xulysanpham.php"><h3>Sản phẩm</h3></a>
        </li>     
        <li class="nav-item">
          <a class="nav-link" href="xulydonhang.php"><h3>Đơn hàng</h3></a>
        </li>     
      </ul> 
    </div>
    <p style="margin-top:1%">Xin chào, <?php echo $_SESSION['dangnhap']?> <a href="?login=dangxuat">Đăng xuất</a></p>
  </div>
</nav><br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>