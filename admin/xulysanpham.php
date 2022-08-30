<?php
    include('../db/connect.php')
?>
<?php
if(isset($_POST['themsanpham'])){
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    
    $soluong = $_POST['soluong'];
    $giasanpham = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc =$_POST['danhmuc'];
    $mota = $_POST['mota'];
    $chitiet = $_POST['chitiet'];
    $path = '../upload/';
    $hinhanh_tmp= $_FILES['hinhanh']['tmp_name'];
    $sql_insert_product = mysqli_query($mysqli,"INSERT INTO sanpham(danhmuc_id,tensanpham,sanphamchitiet,sanpham_mota,giasanpham,giakhuyenmai,soluongsanpham,sanpham_img)
                                                values             ('$danhmuc','$tensanpham','$chitiet','$mota','$giasanpham','$giakhuyenmai','$soluong','$hinhanh')");
  
    move_uploaded_file ($hinhanh_tmp,$path.$hinhanh);
}
elseif(isset($_POST['capnhatsanpham'])){
    $id_update =$_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $soluong = $_POST['soluong'];
    $giasanpham = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc =$_POST['danhmuc'];
    $mota = $_POST['mota'];
    $chitiet = $_POST['chitiet'];
    $path = '../upload/';
    $hinhanh_tmp= $_FILES['hinhanh']['tmp_name'];
    
    if($hinhanh ==''){
      $sql_update_image ="UPDATE sanpham SET danhmuc_id= '$danhmuc',tensanpham= '$tensanpham',sanphamchitiet= '$chitiet',sanpham_mota= '$mota',
      giasanpham= '$giasanpham',giakhuyenmai= '$giakhuyenmai',soluongsanpham= '$soluong' where sanpham_id= '$id_update'";
                                       
    }
    else{
      move_uploaded_file ($hinhanh_tmp,$path.$hinhanh);
      $sql_update_image ="UPDATE sanpham SET danhmuc_id= '$danhmuc',tensanpham= '$tensanpham',sanphamchitiet= '$chitiet',sanpham_mota= '$mota',
      giasanpham= '$giasanpham',giakhuyenmai= '$giakhuyenmai',soluongsanpham= '$soluong', sanpham_img= '$hinhanh'where sanpham_id= '$id_update'";
    }
    mysqli_query($mysqli,$sql_update_image);
}
?>

<?php
  if(isset($_GET['xoa'])){ // xóa sản phẩm từ cơ sở dữ liệu
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($mysqli,"DELETE from sanpham where sanpham_id ='$id'");
    $path_delete = '../upload/';
  
}
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
           <?php
                if(isset($_GET['quanly'])=='capnhat'){
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat = mysqli_query($mysqli,"SELECT * FROM sanpham where sanpham_id ='$id_capnhat' ");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    $id_danhmuc_1 =$row_capnhat['danhmuc_id'];
                ?>
                <div class="col-md-4">
                        <h4>Cập nhật sản phẩm</h4>      
                        <form action="" method="post" enctype="multipart/form-data">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm" value="<?php echo $row_capnhat['tensanpham'] ?>"><br>
                                <input type="hidden" class="form-control" name="id_update" placeholder="Tên sản phẩm" value="<?php echo $row_capnhat['sanpham_id'] ?>"><br>
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <label for="">Giá</label>
                                <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm" value="<?php echo $row_capnhat['giasanpham'] ?>"><br>
                                <label for="">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi" value="<?php echo $row_capnhat['giakhuyenmai'] ?>"><br>
                                <label for="">Số lượng</label>
                                <input type="text" class="form-control" name="soluong" placeholder="Số lượng" value="<?php echo $row_capnhat['soluongsanpham'] ?>"><br>
                                <label for="">Mô tả</label>
                                <textarea class="form-control" rows="10" name="mota" id="" ><?php echo $row_capnhat['sanpham_mota'] ?></textarea><br>
                                <label for="">Sản phẩm chi tiết</label>
                                <textarea class="form-control" rows="10" name="chitiet" id="" ><?php echo $row_capnhat['sanphamchitiet'] ?></textarea> <br>
                                <label for="">Danh mục sản phẩm</label>
                                <?php 
                                    $sql_danhmuc = mysqli_query($mysqli,"SELECT * FROM danhmuc order by danhmuc_id desc");
                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">-----Chọn danh mục-----</option>
                                    <?php
                                        while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                            if($id_danhmuc_1 == $row_danhmuc['danhmuc_id']){
                                    ?>
                                    <option selected value="<?php echo $row_danhmuc['danhmuc_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php 
                                      }else{  
                                    ?>
                                      <option  value="<?php echo $row_danhmuc['danhmuc_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php
                                       }
                                    } 
                                    ?>
                                </select><Br>
                                <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-success">
                        </form>     
                    </div>
                <?php
                }else{
                ?>
                   <div class="col-md-4">
                        <h4>Thêm sản phẩm</h4>      
                        <form action="" method="post" enctype="multipart/form-data">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <label for="">Giá</label>
                                <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
                                <label for="">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
                                <label for="">Số lượng</label>
                                <input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="mota" id=""></textarea><br>
                                <label for="">Sản phẩm chi tiết</label>
                                <textarea class="form-control" name="chitiet" id=""></textarea> <br>
                                <label for="">Danh mục sản phẩm</label>
                                <?php 
                                    $sql_danhmuc = mysqli_query($mysqli,"SELECT * FROM danhmuc order by danhmuc_id desc");
                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">-----Chọn danh mục-----</option>
                                    <?php
                                        while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                            if($id_danhmuc_1 == $row_danhmuc['danhmuc_id']){
                                    ?>
                                    <option selected value="<?php echo $row_danhmuc['danhmuc_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php 
                                      }else{  
                                    ?>
                                      <option  value="<?php echo $row_danhmuc['danhmuc_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php
                                       }
                                    } 
                                    ?>
                                </select><Br>
                                <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-success">
                        </form>     
                    </div>
                <?php } ?>
           

           <div class="col-md-8">
               <h4>Các sản phẩm</h4>
               <?php
                    $sql_select_sp = mysqli_query($mysqli,"SELECT * FROM sanpham,danhmuc where sanpham.danhmuc_id = danhmuc.danhmuc_id order by sanpham.sanpham_id DESC");              //nếu muốn xuất hiện sản phẩm mới thì sài limit
               ?>
               <table class="table table-reponsive table-bordered">
                    <tr>
                       <th>Thứ tự</th>
                       <th>Tên sản phẩm</th>
                       <th>Hình ảnh</th>
                       <th>Số lượng</th>
                       <th>Danh mục</th>
                       <th>Giá sản phẩm</th>
                       <th>Giá khuyến mãi</th>                     
                       <th>Quản lý</th>
                    </tr>
                    <?php
                        $i = 0;
                        while($row_sp = mysqli_fetch_array($sql_select_sp)){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_sp['tensanpham'] ?></td>
                        <td><img src="../upload/<?php echo $row_sp['sanpham_img']?>" height="80" width="80"></td>
                        <td><?php echo $row_sp['soluongsanpham'] ?></td>
                        <td><?php echo $row_sp['tendanhmuc'] ?></td>
                        <td><?php echo number_format( $row_sp['giasanpham']).' VNĐ'  ?></td>
                        <td><?php echo number_format( $row_sp['giakhuyenmai']).' VNĐ'?></td>
                              
                        <td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">Cập nhật</a></td>
                    </tr>
                    <?php } ?>
               </table>
           </div>
       </div>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>