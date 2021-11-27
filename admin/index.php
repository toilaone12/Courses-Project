<?php
    session_start();
    // $taikhoan = $_SESSION['dangnhap'];
    if(!isset($_SESSION['dangnhapadmin'])){
        header("Location: login.php");
        // echo $_SESSION['dangnhap'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPages</title>
    <link rel="stylesheet" href="styleAdmin.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <h3 class="header-page">Admin Page</h3>
            <div class="menu">
                <ul class="list">
                    <li><a class = "list-items" href="index.php?action=quanlydanhmucsanpham">Quản lý danh mục sản phẩm</a></li>
                    <li><a class = "list-items" href="index.php?action=quanlysanpham">Quản lý sản phẩm</a></li>
                    <li><a class = "list-items" href="index.php?action=quanlydonhang">Quản lý đơn hàng</a></li>
                    <li><a class = "list-items" href="index.php?action=dangxuat">Đăng xuất: <?php 
                    if(isset($_SESSION['dangnhapadmin'])){
                        echo $_SESSION['dangnhapadmin'];
                    }
                    ?></a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <?php 
                if(isset($_GET['action'])){
                    $click = $_GET['action'];
                }else{
                    $click = "";
                }
                if($click == 'quanlydanhmucsanpham'){
                    include("./modules/quanlydanhmucsanpham/them.php");
                    include("./modules/quanlydanhmucsanpham/lietke.php");
                }else if($click == 'quanlysanpham'){
                    include("./modules/quanlysanpham/them.php");
                    include("./modules/quanlysanpham/lietke.php");
                }else if($click == 'quanlydonhang'){
                    // include("./modules/quanlydonhang/xemdonhang.php");
                    include("./modules/quanlydonhang/lietke.php");
                }else if($click == 'dangxuat'){
                    unset($tk);
                    header("Location: login.php");
                }else{
                    include("dashboard.php");
                }
               
            ?>
        </div>
        <div class="footer">

        </div>
    </div>

</body>
</html>