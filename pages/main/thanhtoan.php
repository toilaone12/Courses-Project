<h3>Thanh toán đơn hàng</h3>
<?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,"dbkhoahoc");
    $idkh = $_SESSION['id'];
    $codedh = rand(0,1000);
    $time = date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = date("Y-m-d H:i:s");
    $insert_cart = "INSERT INTO tblgiohang(id_kh,madonhang,thoigianmua,tinhtrang) VALUES ($idkh,'$codedh','$date','1')";
    echo $insert_cart;
    $result_cart = mysqli_query($conn,$insert_cart);
    // echo $result_insert_cart;
    if($result_cart){
        // them chi tiet gio hang
        foreach($_SESSION['cart'] as $key => $value){
            $id_sp = $value['id'];
            $songuoi = $value['songuoi'];
            $insert_order = "INSERT INTO tblchitietdonhang(madonhang,id_sp,songuoidangky) VALUES ('$codedh',$id_sp,$songuoi)";
            // echo $insert_order;
            $result_insert_order = mysqli_query($conn,$insert_order);
        }
    }else{
    }
    unset($_SESSION['cart']);
    echo '<p>Cảm ơn vì đã đăng ký khóa học của chúng tôi, chúng tôi sẽ liên hệ sớm nhất!</p>';
    // header("Location: ../../Trangchu.php"); 
?>
