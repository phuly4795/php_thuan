<?php
if(isset($_POST['themgiohang'])){
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $giasanpham = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    $hinhanh = $_POST['hinhanh'];

    
      $sql_select_giohang = mysqli_query($mysqli,"SELECT * FROM giohang where sanpham_id='$sanpham_id'");
      $count = mysqli_num_rows($sql_select_giohang); //trả về số lượng hàng.
          if($count>0){
              $row_sanpham = mysqli_fetch_array($sql_select_giohang);
              $soluong = $row_sanpham['soluong'] + 1;
              $sql_giohang = "UPDATE giohang set soluong = '$soluong' where sanpham_id = '$sanpham_id'";
          }
          else{
            $soluong = $soluong;
            $sql_giohang = "INSERT INTO giohang (tensanpham,sanpham_id,giasanpham,hinhanh,soluong) 
            values ('$tensanpham' ,'$sanpham_id','$giasanpham','$hinhanh','$soluong') ";
          }
         $insert_row = mysqli_query($mysqli, $sql_giohang);
        if($insert_row==0){     
            header('location:index.php?quanly=chitietsp&id='.$sanpham_id);
        }
}
elseif(isset($_POST['capnhatgiohang']))
{
	for($i=0; $i < count($_POST['product_id']);$i++){
		$sanpham_id = $_POST['product_id'][$i];
		$soluong = $_POST['soluong'][$i];
		/*	xóa sản phẩm nếu xuống nhỏ hơn hoặc bằng 0
		if($soluong <=0){
			$sql_delete = mysqli_query($mysqli,"DELETE FROM giohang  where sanpham_id ='$sanpham_id'");
		}
		else{
			$sql_update = mysqli_query($mysqli,"UPDATE giohang set soluong ='$soluong' where sanpham_id ='$sanpham_id'");
		}
		*/
		$sql_update = mysqli_query($mysqli,"UPDATE giohang set soluong ='$soluong' where sanpham_id ='$sanpham_id'");
	}
}
elseif(isset($_GET['xoa'])) 
{
	$id = $_GET['xoa'];
	$sql_delete = mysqli_query($mysqli,"DELETE FROM giohang  where giohang_id ='$id'");

}
elseif (isset($_POST))
{ //xử lí thông tin khách hàng
	$name = $_POST ['name'];
	$phone = $_POST ['phone'];
	$email = $_POST ['email'];
	$address = $_POST ['address'];
	$note = $_POST ['note'];
	$giaohang = $_POST ['giaohang'];

	$sql_khachhang = mysqli_query($mysqli,"INSERT INTO khachhang (name,phone,email,address,note,giaohang) values ('$name' ,'$phone','$email','$address','$note','$giaohang')");
	if($sql_khachhang){//thêm vào sql dơn hàng
		$sql_select_khachhang = mysqli_query($mysqli,"SELECT * FROM khachhang ORDER BY khachhang_id DESC LIMIT 1") ;// lấy id kh giảm dần và giới hạn 1 kh
		$mahang = rand(0,9999);
		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
		$khachhang_id = $row_khachhang['khachhang_id'];
		for($i=0; $i < count($_POST['thanhtoan_product_id']);$i++){
			
			$sanpham_id = $_POST['thanhtoan_product_id'][$i];
			$soluong = $_POST['thanhtoan_soluong'][$i];
			$sql_donhang = mysqli_query($mysqli,"INSERT INTO donhang (sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id' ,'$khachhang_id','$soluong','$mahang')");
			$sql_delete_thanhtoan = mysqli_query($mysqli,"DELETE FROM giohang  where sanpham_id ='$sanpham_id'");
			
		}
	}
}


?>
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng của bạn
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">          
                <?php           
                    $sql_lay_giohang = mysqli_query($mysqli,"SELECT * FROM giohang order by giohang_id DESC");
                ?>
				<div class="table-responsive">
					<form action="" method="post">
						<table class="table table-bordered">
							<thead>
								<tr>

									<th>Thứ tự</th>
									<th>Sản phẩm</th>
									<th>Số lượng</th>
									<th>Tên sản phẩm</th>

									<th>Giá</th>
									<th>Tổng</th>
									<th>Xóa</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									$total = 0;
									while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){
									$subtotal =  $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'] ;
									$total += $subtotal; 
									$i++;
								?>
								<tr class="rem1">
									<td class="invert"><?php echo $i ?></td>
									<td class="invert-image">
										<a href="single.html">
											<img src="IMG/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " height="120"  class="img-responsive" >
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="quantity-select">
												<div class="entry value-minus">&nbsp;</div>
												<div class="entry value">
													<input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>" >
													<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>" >
												</div>
												<div class="entry value-plus active">&nbsp;</div>
											</div>
										</div>
									</td>
									<td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
									<td class="invert"><?php echo number_format( $row_fetch_giohang['giasanpham']).' VNĐ' ?></td>
									<td class="invert"><?php echo number_format( $subtotal).' VNĐ' ?></td>
									<td class="invert">
										<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>" >Xóa</a>
									</td>
								</tr>	
								<?php } ?>
								<tr >
									<td class="tt" colspan = "7">Tổng tiền: <?php echo number_format($total).' VNĐ' ?></td>
								</tr>        
								<tr >
									<td  colspan = "7"><input class="cn" type="submit" value="Cập nhật giỏ hàng" name="capnhatgiohang"></td>
								</tr>        
							</tbody>
						</table>
					</form>
				</div>
			</div> 
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="" >
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Điền số điện thoại" name="phone" required="" style="margin-top: 2%;">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Điền địa chỉ giao hàng" name="address" required="" style="margin-top: 2%;">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="email" class="form-control" placeholder="Điền email" name="email" required=""style="margin-top: 2%;">
									</div>
									<div class="controls form-group">							
										<textarea style="resize: none;margin-top:2%" name="note" class="form-control" placeholder="Ghi chú"></textarea>
									</div>
									<div class="controls form-group">
										<select class="option-w3ls"  style="width: 100%;margin-top:2%;margin-bottom:2%" name="giaohang">
											<option>Chọn hình thức giao hàng</option>
											<option value="1">Thanh toán qua thẻ ngân hàng</option>											
											<option value="0">Thanh toán khi nhận hàng</option>
										</select>
									</div>
								</div>
								<?php 
								$sql_lay_giohang = mysqli_query($mysqli,"SELECT * FROM giohang order by giohang_id DESC");
								while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){
								?>
									<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>" >
									<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>" >
								<?php } ?>
								<input type="submit" name="thanhtoan" value="Thanh toán" class="gui"  style="color: #fff;" >
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->
   <style>

	   .cn  {margin-left: 35%; background-color: #24A047;color: #fff;width: 30%;}
	   .tt {text-align: center;}	
	   .gui {width: 30%; background-color: #24A047;margin-left: 35%; }
	   
   </style>