<?php
    include('../db/connect.php')
?>
<?php 
$sql_donhang= mysqli_query($mysqli, "SELECT * FROM donhang ");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SẢN PHẨM</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">     
        <li class="nav-item">
          <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="xulydonhang.php">Đơn hàng</a>
        </li>
      </ul>
    </div>
  </div>
</nav><br><br>
   <div class="container">
       <div class="row">
           
           <div class="col-md-8">                      
               <table class="table table-reponsive table-bordered">
                    <tr>
                       <th>Thứ tự</th>
                       <th>ID sản phẩm</th>
                       <th>Số lượng</th>
                       <th>Mã hàng</th>
                       <th>ID khách hàng</th>
                       <th>Ngày tháng</th>
                    
                    </tr>
                    <?php
                    $i=0;
                while($row_donhang = mysqli_fetch_array($sql_donhang)){
                    $i++;

           ?>  
                    <tr>        
                        <td><?php echo $i ?></td>         
                        <td><?php echo $row_donhang['sanpham_id'] ?></td>
                        <td><?php echo $row_donhang['soluong'] ?></td>
                        <td><?php echo $row_donhang['mahang'] ?></td>
                        <td><?php echo $row_donhang['khachhang_id'] ?></td>
                        <td><?php echo $row_donhang['ngaythang'] ?></td>             
                                                 
                    </tr>
                    <?php } ?>
               </table>
           </div>
       </div>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>