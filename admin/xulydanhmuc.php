<?php
    include('../db/connect.php')
?>
<?php

    if(isset($_POST['themdanhmuc'])){
        $tendanhmuc = $_POST['danhmuc'];
        $sql_insert = mysqli_query($mysqli,"INSERT INTO danhmuc(tendanhmuc) values('$tendanhmuc')");

    }
    elseif(isset($_POST['capnhatdanhmuc'])){
        $id_post = $_POST['id_danhmuc'];
        $tendanhmuc = $_POST['danhmuc'];
        $sql_update = mysqli_query($mysqli,"UPDATE danhmuc set tendanhmuc = '$tendanhmuc' where danhmuc_id='$id_post'");
        header('Location:xulydanhmuc.php');

    }
    if(isset($_GET['xoa'])){ // xóa danh mục từ cơ sở dữ liệu
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($mysqli,"DELETE from danhmuc where danhmuc_id='$id'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DANH MỤC</title>
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
           <?php
                if(isset($_GET['quanly'])){
                    $capnhat = $_GET['quanly'];
                    $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($mysqli,"SELECT * FROM danhmuc where danhmuc_id ='$id_capnhat' ");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                }
                else{
                    $capnhat = '';
                }
                if($capnhat=='capnhat'){
                ?>
                   <div class="col-md-4">
                        <h4>Cập nhật danh mục</h4>
                        <label for="">Tên danh mục</label>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['tendanhmuc']?>"><br>
                            <input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['danhmuc_id']?>">
                            <input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-success">
                        </form>     
                    </div>
                <?php 
                }else{
                ?>
                   <div class="col-md-4">
                        <h4>Thêm danh mục</h4>
                        <label for="">Tên danh mục</label>
                        <form action="" method="post">
                                <input type="text" class="form-control" name="danhmuc" placeholder="Tên danh mục"><br>
                                <input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-success">
                        </form>     
                    </div>
                <?php } ?>
           

           <div class="col-md-8">
               <h4>Liệt kê danh mục</h4>
               <?php
                    $sql_select = mysqli_query($mysqli,"SELECT * FROM danhmuc order by  danhmuc_id DESC");
               ?>
               <table class="table table-reponsive table-bordered">
                    <tr>
                       <th>Thứ tự</th>
                       <th>Tên danh mục</th>
                       <th>Quản lý</th>
                    </tr>
                    <?php
                        $i = 0;
                        while($row_category = mysqli_fetch_array($sql_select)){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row_category['tendanhmuc'] ?></td>
                        <td><a href="?xoa=<?php echo $row_category['danhmuc_id'] ?>">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row_category['danhmuc_id'] ?>">Cập nhật</a></td>
                    </tr>
                    <?php } ?>
               </table>
           </div>
       </div>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>