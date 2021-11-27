                <?php
                    $conn = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($conn,"dbkhoahoc");
                    $sql_select = "Select * from tblkhoahoc where id_danhmuc = '$_GET[id]' ORDER BY id_kh DESC";
                    $result_khoahoc = mysqli_query($conn,$sql_select);
                    $sql_select_danhmuc = "Select * from tbldanhmuc where id = '$_GET[id]'";
                    $result_danhmuc = mysqli_query($conn,$sql_select_danhmuc);
                    $row_title = mysqli_fetch_array($result_danhmuc);
                    $sql_select_all = "Select * from tbldanhmuc,tblkhoahoc where id = id_danhmuc";
                    $result_all = mysqli_query($conn,$sql_select_all);
                  ?>
                  <h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'];?></h3>
                  <?php
                      while($rows = mysqli_fetch_array($result_khoahoc)){
                  ?>
                    <div class ="col-12 col-sm-6 col-md-4">
                        <img src="./admin/modules/quanlysanpham/img/<?php echo $rows["anh_kh"];?>" alt="" class="img-course">
                        <p class="name-course" >Name Course: <?php echo $rows["tenkhoahoc"];?></p>
                        <p class="price-course"><?php echo number_format($rows["giakhoahoc"],0,',','.'); ?>đ /3 months</p>
                        <p class="join-course">About: <?php echo $rows["songuoi"];?> persons</p>
                        <div class="btn-choose">
                            <a style="text-decoration:none;" href="Trangchu.php?quanly=sanpham&id=<?php echo $rows["id_kh"];?>" class="btn-course">Choose Course</a>
                        </div>
                    </div>
                  <?php
                    }
                  ?>