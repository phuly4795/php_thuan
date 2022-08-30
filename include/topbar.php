

<div class="navbar" style="float: left !important;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <div class="logo">
              <a class="navbar-brand" href="./index.php"><img src="./IMG/logo.png" class="img-thumbnail" alt="..."></a>
            </div>        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php
                    $sql_danhmuc = mysqli_query($mysqli, 'SELECT * FROM danhmuc ORDER BY danhmuc_id ASC');   
                ?>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./index.php">Trang chủ</a>
                </li>
                <?php
                    $sql_danhmuc_chitiet = mysqli_query($mysqli, 'SELECT * FROM danhmuc ORDER BY danhmuc_id ASC');
                    while ($row_dm_chitiet = mysqli_fetch_array($sql_danhmuc_chitiet)){
                ?>             
              <li class="nav-item">
                  <a class="nav-link" href="?quanly=danhmuc&id=<?php echo $row_dm_chitiet['danhmuc_id'] ?>">
                  <?php echo $row_dm_chitiet['tendanhmuc'] ?>
                </a>
                </li>
                <?php } ?>            
                
              </ul>        
              <form class="d-flex" action="index.php?quanly=timkiem" method="post">
                <input class="form-control me-2" type="search" name="timkiem" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                <button class="btn btn-outline-success" name="search_button" type="submit"><i class="fas fa-search" ></i></button>
                <i>&ensp;</i>

              </form>
              <form class="d-flex" method="post" action="index.php?quanly=giohang">
              <button class="btn btn-outline-success" type="submit"> <a href="?quanly=giohang&id=<?php echo  $row_sanpham['sanpham_id'] ?>"><i class="fas fa-shopping-cart" ></i></a> </button>

              </form>
              
            </div>
          </div>
        </nav>
      </div>
      <style>
        
      </style>