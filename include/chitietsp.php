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
    footer{clear: both;}


    .boxtrai{width: 35%;margin-left: 10%;float: left;margin-top: 4%;}
    .boxtrai img:hover{border: 1px solid #ccc; cursor: pointer;}
    .boxtrai img{width: 100%;position: relative;}
    .boxphai{width:35%;float: left;margin-top: 3%;margin-left: 5%;}

    .tensp{font-size: 20px;}
    .tensp hr{width: 50px; height: 4px;background-color: #ccc;margin-top: 10px;}
    .giasp h4{color: #c89979;}
    .giasp del{color: #ccc;font-size: 20px;}
    .noidung p{margin-top: 20px;margin-bottom: 30px; line-height: 30px;}
    .noidungsp {line-height: 30px; margin-bottom: 20px;margin-left: 20px;}
    .nut{width: 100%;float: left;}
    .nut input{width: 35%; height: 30px;color: white;font-weight: bold;background-color: #d26e4b; border-radius: 5px;} 
    .nut input:hover{background-color: #a8583c;}

    .cachthanhtoan{width: 100%;float: left;}
    .cachthanhtoan h4{float: left; margin: 10% 10% 5% 0;}


    .logoship{float: left;width:100%;}
    .logoship img{width: 22.7%;float: left;margin: 1% 2% 1% 0;}


    .boxduoi{width: 40%;float: right;margin-right: 10%;}
    .themyeuthich{width: 100%;float: left;}
    .themyeuthich p{width: 100%;text-align: left;}

    .mota{width:80%; ; float: left; margin-bottom: 50px;margin-left: 10.2%;border-radius: 35px ;border: 1px solid #c2b7ad; margin-top: 5%;}
    .ct{font-size: 22px;font-weight: bold;}
    .mota h2{text-align: center; padding-top: 5px;} .mota p{margin-left: 20px;line-height: 30px;margin-top: 10px; margin-bottom: 10px;}

    .prev {font-size: 25px;float: left;position: absolute;top: 70%;z-index: 1;}
    .next {position: absolute;top: 70%; font-size: 25px;left: 43%;float: right;}

    .ke{width: 80%;height: 5px; background-color: #ccc;float: left;}

    .tuade h3{font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
    .binhluan{clear: both;;width: 80%;margin: 10%; margin-bottom: 5%;display: flex; background-color:cornsilk;flex-direction: column;border-radius: 9px;}
    .binhluan h3{float: left;}
    .obinhluan textarea{min-width: 100%;height: 150px;}
    .fb-like {margin-left: 3%;margin-top: 5px;width: 70px;}

    .dieuchinh{border: 1px solid #ccc;height: 50px;border-radius: 0 0 9px 9px;}
    .dieuchinh i{color: #288ad6;font-size: 30px;margin-left: 2%; margin-top: 10px;}
    .dieuchinh a{color: #288ad6;margin-left: 1%; margin-bottom: 5px;line-height: 10px;}
    .dieuchinh a:hover{color: #c77227;}
    .dieuchinh button{background-color: #288ad6;width: 150px;height: 40px;border-radius: 8px;float: right;margin-right: 4px;margin-top: 2px;}

    .bg {background: #000 !important;}
</style>


<?php
    if(isset($_GET['id'])){
        $id =$_GET['id'];
    }
    else{
        $id=''; 
    }
    $sql_chitiet = mysqli_query($mysqli,"SELECT * FROM sanpham  where sanpham_id  ='$id'");
?>


<div class="content">
        <section>
            <?php
                while($row_chitiet = mysqli_fetch_array($sql_chitiet)){
            ?>
          <div class="boxtrai">
              <div class="dha" >
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img id="anh" src=" IMG/<?php echo $row_chitiet['sanpham_img']?>" height="500" class="d-block w-100" alt="...">
                    </div>        
                  </div>
                </div>
              </div>         
          </div>
            
        <div class="boxphai">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color: #949494; font-size: 20px;" href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" style="color: #949494;font-size: 20px;" aria-current="page"><?php echo $row_chitiet ['tensanpham'] ?></li>
              </ol>
            </nav>         
              <div class="tensp">
                  <h1><?php echo $row_chitiet['tensanpham']?></h1>           
              </div>  
              <hr style="width: 10%;height: 4px; border-radius: 5px;">
              <div class="giasp" >
                <del><?php echo number_format( $row_chitiet['giasanpham']).' VNĐ' ?></del>
                <h4 ><?php echo number_format( $row_chitiet['giakhuyenmai']).' VNĐ' ?></h4>   
              </div>
              <div class="noidung">
                <p  style="text-align: left !important;"><?php echo $row_chitiet['sanphamchitiet'] ?></p>
              </div>     
              <div class="nut">
                <form action="?quanly=giohang" method="post">
                  <fieldset>
                    <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['tensanpham'] ?>" />						
                    <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />						
                    <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['giasanpham'] ?>" />						
                    <input type="hidden" name="hinhanh"    value="<?php echo $row_chitiet['sanpham_img'] ?>" />						
                    <input type="hidden" name="soluong"    value="1" />						              
                    <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                  </fieldset>
					      </form>   
              </div>
          </div>
          <div class="boxduoi">
            <div class="themyeuthich" >       
              <hr>
              <p>Danh mục: Best seller</p>
            </div>
          </div>
          <div class="mota">
            <h2>MÔ TẢ</h2>
            <p><?php echo $row_chitiet['sanpham_mota']  ?></p>
          </div>
          <div class="binhluan">
            <div class="tuade">
              <h3 style="margin-left: 2%;">Thảo luận về sản phẩm <?php echo $row_chitiet['tensanpham'] ?>: </h3>
                  <div class="obinhluan">
                    <textarea></textarea>
                  </div>
                  <div class="dieuchinh">
                      <i class="fas fa-camera"></i>
                      <a href="#">Gửi ảnh </a>|<a> Quy định đăng bình luận</a>
                      <button>Gửi</button>
                  </div>
              </div>
            </div>
  </div>
          <?php } ?>
      </section>    
   