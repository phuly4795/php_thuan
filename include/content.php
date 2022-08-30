
<style>
  .card-body del { color:#ccc;margin-left: 27%;}
  .card-body a { color:rgb(168, 88, 60);}
  
  .card-text a:hover{color: none;}
  .card-body h4{color: #C89979;text-align: center;font-size: 27px;}
  .button {width: 100%; background-color: #C89979; color: #fff;} 
  h5{text-align: center;}
</style>

<div class="container" >
          <?php
            $sql_cate_home= mysqli_query($mysqli, "SELECT * FROM danhmuc order by danhmuc_id ASC");   //lấy danh mục từ csdl || truy vấn
            while($row_cate_home = mysqli_fetch_array($sql_cate_home)){                               //tìm và trả về một dòng kết quả của một truy vấn dưới dạng mãng
              $id_danhmuc = $row_cate_home['danhmuc_id'];
          ?>                                         
          <div class="row" style="margin-top: 5%;margin-bottom: 5%;">
          <h2 style="font-size:45px; margin-top:5%"><?php echo $row_cate_home['tendanhmuc'] ?></h2>      <!-- lấy tên danh mục từ csdl -->  
            <?php
              $sql_product = mysqli_query ($mysqli,"SELECT * FROM sanpham order by sanpham_id ASC");  //lấy sản phẩm từ csdl
              while($row_sanpham = mysqli_fetch_array($sql_product)){
                if($row_sanpham['danhmuc_id']==$id_danhmuc){
            ?>
            <div class="col">
              <div class="card" style="width: 18rem;">   
                <img src="img/<?php echo $row_sanpham['sanpham_img'] ?>" class="card-img-top" alt="...">     
              <div class="card-body">
                <h5  class="card-text" ><a href="?quanly=chitietsp&id=<?php echo  $row_sanpham['sanpham_id']?>"><?php echo $row_sanpham['tensanpham'] ?></a></h5>     <!-- lấy tên sản phẩm từ csdl -->
                <del><?php echo number_format( $row_sanpham['giasanpham']).' VNĐ' ?></del>
                <h4 ><?php echo number_format( $row_sanpham['giakhuyenmai']).' VNĐ' ?></h4>            
              </div>
                <a href="?quanly=chitietsp&id=<?php echo  $row_sanpham['sanpham_id'] ?>">Xem sản phẩm</a>         <!-- lấy id sản phẩm từ csdl --> 
                <form action="?quanly=giohang" method="post">
                  <fieldset>
                    <input type="hidden" name="tensanpham"  value="<?php echo $row_sanpham['tensanpham']  ?>" />						
                    <input type="hidden" name="sanpham_id"  value="<?php echo $row_sanpham['sanpham_id']  ?>" />						
                    <input type="hidden" name="giasanpham"  value="<?php echo $row_sanpham['giasanpham']  ?>" />						
                    <input type="hidden" name="hinhanh"     value="<?php echo $row_sanpham['sanpham_img'] ?>" />						
                    <input type="hidden" name="soluong"     value="1"                                         />						              
                    <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button"              />
                  </fieldset>
					      </form>  
              </div>
            </div>
            <?php } } ?>
          </div>
        <?php } ?>  
  </div>