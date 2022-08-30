<style>
      .main{width: 100%;float: left;}
    .navbar{width: 100% ;float: left ;}
    .navbar .logo{float: left; width:15%;}
    .navbar .logo .navbar-brand{width: 50%;}
    .navbar .logo .navbar-brand img{width: 100%; border: none;background: none;}
    .nav .container-fluid{width: 100% !important;}
    h6 , p{text-align: center;}
    a{text-decoration: none;}
    a:hover{color: #C89979 !important;}
    i{font-size: 22px;color: #C89979;}
    .container-fluid{font-size: 22px;float: left;}
    .d-flex button{color: #BE9329;border: 1px solid #BE9329;}
    .d-flex button:hover{background-color: #E2BA48 !important;border: 1px solid #BE9329;}
    footer{clear: both;}


    .left{width: 20%; float: left;margin-left: 3.2%;margin-bottom: 5%;}
    .list-group .miniimg{width: 30%;float: left;}
    .miniimg img{width: 100%;}
    .list-group .info{width: 50%;float: left; margin-left: 10%;}
    .info p {float: left;font-size: 22px;}

    .right{width: 70%;float: right;margin-right: 1%;}

    .right .row{float: right;width: 100%;margin-top: 1.7%;}
    .row button{background-color: #C89979;border: none;}
    .row button:hover{background-color: #e4813f !important; }
    .right img{ width:100% ;}

    .card h5{text-align: center;}
    .card p{color: #C89979;}

    .loc {width: 60%;float: right;margin-top: 2.3%;;margin-right: 4.6%;}
    .loc .h5{float: left;margin-top: 1%;margin-left: 25%;}
    .loc .dropdown{float: right;margin-right: 0%;}

    .col a{color: black;}
    .bg {background: #000 !important;}
</style>
         
          <?php
           if(isset($_GET['id'])){
            $id= $_GET['id'];
          }
          else{
            $id ='';
          }
            $sql_cate= mysqli_query($mysqli, "SELECT * FROM danhmuc ,sanpham where danhmuc.danhmuc_id=sanpham.danhmuc_id and sanpham.danhmuc_id = '$id' 
            order by sanpham.sanpham_id ASC");   //lấy danh mục từ csdl || truy vấn                 
                             
            $sql_category= mysqli_query($mysqli, "SELECT * FROM danhmuc ,sanpham where danhmuc.danhmuc_id=sanpham.danhmuc_id and sanpham.danhmuc_id = '$id'
            order by sanpham.sanpham_id ASC");   //lấy danh mục từ csdl || truy vấn

            $row_title = mysqli_fetch_array($sql_category); //tìm và trả về một dòng kết quả của một truy vấn dưới dạng mãng
            $title = $row_title['tendanhmuc'];  
      
          ?> 
          
<div class="content" style="float: left;">
<h3><?php echo $title ?></h3>
         <div class="left">  
             <div class="list-group">
               <a href="#" class="list-group-item list-group-item-action active" aria-current="true" style="background-color: #fff; color: #BE9329;border: 1px solid #D5D5D5; font-weight: bolder; margin-top:5%;">
                 DANH MỤC SẢN PHẨM
               </a>
               <?php 
                 $sql_danhmuccon_chitiet = mysqli_query($mysqli, 'SELECT * FROM danhmuc ORDER BY danhmuc_id ASC');
                 while ($row_dmc_chitiet = mysqli_fetch_array($sql_danhmuccon_chitiet)){              
              ?>
               <a href="?quanly=danhmuc&id=<?php echo $row_dmc_chitiet['danhmuc_id'] ?>" class="list-group-item list-group-item-action"><?php echo $row_dmc_chitiet['tendanhmuc'] ?></a>  
                <?php
                } 
                ?>
             </div>

         </div>
         <div class="right" style="float: left;">                  
            <div class="container">
               <div class="row">
                 <?php
                    while($row_sanpham = mysqli_fetch_array($sql_cate)){
                 ?>
                 <div class="col">
                    <div class="card" style="width: 18rem;">   
                      <img src="img/<?php echo $row_sanpham['sanpham_img'] ?>" class="card-img-top" alt="...">     
                        <div class="card-body">
                          <h5 class="card-text" ><a href="?quanly=chitietsp&id=<?php echo  $row_sanpham['sanpham_id']?>"><?php echo $row_sanpham['tensanpham'] ?></a></h5>     <!-- lấy tên sản phẩm từ csdl -->
                          <del ><?php echo number_format( $row_sanpham['giasanpham']).' VNĐ' ?></del>
                          <h4 style="text-align: center;color:#BE9329"><?php echo number_format( $row_sanpham['giakhuyenmai']).' VNĐ' ?></h4>            
                        </div>
                        <a href="?quanly=chitietsp&id=<?php echo  $row_sanpham['sanpham_id']  ?>">Xem sản phẩm</a>         <!-- lấy id sản phẩm từ csdl --> 
                        <form action="?quanly=giohang" method="post">
                          <fieldset>
                            <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['tensanpham'] ?>" />						
                            <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />						
                            <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['giasanpham'] ?>" />						
                            <input type="hidden" name="hinhanh"    value="<?php echo $row_sanpham['sanpham_img'] ?>" />						
                            <input type="hidden" name="soluong"    value="1" />						              
                            <input style="width: 100%; color:#fff; background-color:tomato ;" type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                          </fieldset>
					              </form>              
                    </div>
                  </div>                        
               <?php } ?>
               </div>
            </div>
          </div>
</div>
<style>
  h3{margin-left: 30%;font-size: 50px;}
  .content{margin-top: 2.5%;margin-bottom: 2.5%;}
  del{margin-left: 25%;color: #ccc;}
  .button:hover{background-color: #e4813f  !important;}
  .right{margin-top: 2.5%;margin-left: 5%;}
  .left{margin-top: 2.5%;}
</style>