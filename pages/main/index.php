<?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,"dbkhoahoc");
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = '';
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*3)-3;
    }
    $sql_select = "Select * from tblkhoahoc,tbldanhmuc where tblkhoahoc.id_danhmuc = tbldanhmuc.id  ORDER BY id_kh DESC LIMIT $begin,3";
    $result_khoahoc = mysqli_query($conn,$sql_select);
?>

<h3>New course have: </h3>
<?php
    while($row = mysqli_fetch_array($result_khoahoc)){
?>
        <div class ="col-12 col-sm-6 col-md-4 gray__bg">
            <img src="./admin/modules/quanlysanpham/img/<?php echo $row["anh_kh"];?>" alt="" class="img-course">
            <p class="name-course" >Name Course: <?php echo $row["tenkhoahoc"];?></p>
            <p class="price-course"><?php echo number_format($row["giakhoahoc"],0,',','.'); ?>đ /3 months</p>
            <p class="join-course">About: <?php echo $row["songuoi"];?> persons</p>
            <div class="btn-choose">
                <a style="text-decoration:none;" href="Trangchu.php?quanly=sanpham&id=<?php echo $row["id_kh"];?>" class="btn-course">Choose Course</a>
            </div>
        </div>
<?php
    }
?>
