<?php
    $tukhoa = $_REQUEST['keyword'];
    $timkiem = $_REQUEST['timkiem'];
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,"dbkhoahoc");
    $select_find = "Select * from tblkhoahoc where tenkhoahoc like '%$tukhoa%'";
    $result_find = mysqli_query($conn,$select_find);
?>
<h3>Từ khóa tìm kiếm: <?php echo $tukhoa;?></h3>
                  <?php
                      while($row_find = mysqli_fetch_array($result_find)){
                  ?>
                    <div class ="col-12 col-sm-6 col-md-4">
                        <img src="./admin/modules/quanlysanpham/img/<?php echo $row_find["anh_kh"];?>" alt="" class="img-course">
                        <p class="name-course" >Name Course: <?php echo $row_find["tenkhoahoc"];?></p>
                        <p class="price-course"><?php echo number_format($row_find["giakhoahoc"],0,',','.'); ?>đ /3 months</p>
                        <p class="join-course">About: <?php echo $row_find["songuoi"];?> persons</p>
                        <div class="btn-choose">
                            <a style="text-decoration:none;" href="Trangchu.php?quanly=sanpham&id=<?php echo $row_find["id_kh"];?>" class="btn-course">Choose Course</a>
                        </div>
                    </div>
                  <?php
                    }
                  ?>