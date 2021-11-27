<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./DesignTrangChu.css">
  <link rel="stylesheet" href="./font/fontawesome-free-5.15.3-web/css/all.css">
</head>
<body>
<?php
  $conn = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($conn,"dbkhoahoc");
  $sql_select = "Select * from tbldanhmuc ORDER BY id desc";
  $result_sql = mysqli_query($conn,$sql_select);
  $nums_result = mysqli_num_rows($result_sql);
  $stt = 0;
  while($rows = mysqli_fetch_object($result_sql)){
      $stt++;
      $id[$stt] = $rows -> id;
      $tendanhmuc[$stt] = $rows -> tendanhmuc;
      $thutu[$stt] = $rows -> stt;
  }
?>  
<?php
  if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
      unset($_SESSION['dangnhap']);
  }
?>             
        <div class="content">
            <div class="name">New Courses</div>
            <div class="grid">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="Trangchu.php">Trang chủ</a>
              </li>
              <?php
                for($i = 1; $i <= $nums_result; $i++){
              ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="Trangchu.php?quanly=danhmucsanpham&id=<?php echo $id[$i];?>"><?php echo $tendanhmuc[$i];?></a>
              </li>
              <?php 
                }
              ?>
              </li>
              <?php
                if(isset($_SESSION['dangnhap'])){
              ?>
              <li class="nav-item">
                <a class="nav-link" href="Trangchu.php?dangxuat=1">Đăng xuất</a> 
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Trangchu.php?quanly=thaydoimatkhau">Đổi mật khẩu</a> 
              </li>
              <?php
                }else{
              ?>
              <li class="nav-item">
                <a class="nav-link" href="Trangchu.php?quanly=dangnhap">Đăng nhập</a>
              </li>
              <?php
                }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="Trangchu.php?quanly=giohang">Giỏ hàng</a>
              </li>
            </ul>
                 
            </div>
        </div>
</body>
</html>