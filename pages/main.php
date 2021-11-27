<div class="main">
    <?php 
        include("./pages/sidebar/sidebar.php");
    ?>
    <div class="row" style="margin-left: 0px; margin-right: 0px;">
        <?php
            if(isset($_GET["quanly"])){
                $chon = $_GET["quanly"];
            }else{
                $chon = "";
            }
            if($chon == 'danhmucsanpham'){
                include("./pages/main/danhmuc.php");
            }else if($chon == 'giohang'){
                include("./pages/main/giohang.php");
            }else if($chon == 'sanpham'){
                include("./pages/main/sanpham.php");
            }else if($chon == 'dangky'){
                include("./pages/main/dangky.php");
            }else if($chon == 'dangnhap'){
                include("./pages/main/dangnhap.php");
            }else if($chon == 'thanhtoan'){
                include("./pages/main/thanhtoan.php");
            }else if($chon == 'timkiem'){
                include("./pages/main/timkiem.php");
            }else if($chon == 'thongbao'){
                include("./pages/main/thongbao.php");
            }else if($chon == 'thaydoimatkhau'){
                include("./pages/main/thaydoimatkhau.php");
            }else{
                include("./pages/main/index.php");
            }
        ?>
        <?php
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $sql_trang = "Select * from tblkhoahoc";
            $result_trang = mysqli_query($conn,$sql_trang);
            $count_page = mysqli_num_rows($result_trang);
            $sotrang = ceil($count_page/3);
            // echo $sotrang
        ?>
        <nav aria-label="Page navigation example" class="next-pages">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    for($i = 1; $i <= $sotrang; $i++){
                ?>
                <li class="page-item"><a class="page-link" href="Trangchu.php?trang=<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php
                    }
                ?>
                <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                <li class="page-item">
                    <a class="page-link" href="" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>