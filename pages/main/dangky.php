<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/DesignTrangChu.css">
</head>
<body>
    <?php
        if(isset($_POST['dangky'])){
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $hoTen = $_POST['hoten'];
            $matKhau = $_POST['matkhau'];
            $tuoi = $_POST['tuoi'];
            $email = $_POST['email'];
            $sdt = $_POST['sodienthoai'];
            $diaChi = $_POST['diachi'];
            $sql_dangky = "INSERT INTO tblnguoidung (hoten,matkhau,tuoi,email,sodienthoai,diachi) VALUES ('$hoTen ','$matKhau',$tuoi,'$email','$sdt','$diaChi')";
            $sql_select_dangky = "SELECT * from tblnguoidung where hoten = '$hoTen'";
            $count_rows =  mysqli_num_rows(mysqli_query($conn, $sql_select_dangky));
            $result_dangky = mysqli_query($conn,$sql_dangky);
            if($count_rows == 0){
                if($result_dangky){
                    // header("Location: ../Trangchu.php?quanly=giohang");
                    echo "<p>Đăng ký thành công!</p>";
                    $_SESSION['dangky'] = $hoTen;
                    $_SESSION['id'] = mysqli_insert_id($conn);
                }
            }else{
                echo "<p>Đăng ký thất bại!</p>";
                // header("Location: ../Trangchu.php?quanly=dangky");
            }
        }
    ?>
    <p class="display-6" style="text-align: center;">Đăng ký người dùng</p>
    <form action="" method="post">
        <table class="table table-bordered" border="1" style="text-align: center; width:50%; float:left">
            <tr>
                <td>Họ tên</td>
                <td><input size="50" type="text" name="hoten" id=""></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input size="50" type="password" name="matkhau" id=""></td>
            </tr>
            <tr>
                <td>Tuổi</td>
                <td><input type="number" name="tuoi" id="" min="1"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input size="50" type="email" name="email" id=""></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input size="50" type="text" name="sodienthoai" id=""></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input size="50" type="text" name="diachi" id=""></td>
            </tr>
            <tr>
                <td colspan="5" align="center">
                    <a href="Trangchu.php?quanly=dangnhap" class="btn btn-primary">Đăng nhập nếu bạn đã có tài khoản</a>
                    <input type="submit" value="Đăng ký" name="dangky" class="btn-res btn btn-primary">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>