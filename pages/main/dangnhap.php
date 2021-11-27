<?php
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"dbkhoahoc");
        if(isset($_POST['dangnhap'])){
            $tk =  $_POST['taikhoan'];
            $mk =  $_POST['matkhau'];
            $sql_select = "Select * from tblnguoidung where (email = '$tk' or sodienthoai = '$tk') and matkhau = '$mk';";
            $result_sql = mysqli_query($conn,$sql_select);
            $count_row = mysqli_num_rows($result_sql);
            $row = mysqli_fetch_array($result_sql);
            if($count_row > 0){
                $_SESSION['dangnhap'] = $row['hoten'];
                $_SESSION['id'] = $row['id'];
                // echo $row['id'];
                // echo $tk;
                // header("Location: ../../Trangchu.php?quanly=giohang");
            }else{
                echo "<p>Tài khoản hoặc mật khẩu sai, yêu cầu nhập lại!</p>";
                // header("Location: ../../Trangchu.php?quanly=dangnhap");
            }
        }
?>
<form action="" method="POST" autocomplete="off">
        <table border="1" align="center">
            <tr>
                <td colspan="2" align="center">Đăng nhập</td>
            </tr>
            <tr>
                <td>Tên tài khoản:</td>
                <td><input type="text" name="taikhoan" id="" placeholder="Email or Phone Number"></td>
            </tr>
            <tr>
                <td>Nhập mật khẩu:</td>
                <td><input type="password" name="matkhau" id="" placeholder="Password"></td>
            </tr>
            <!-- <tr>
                <td colspan="2"><span id="notification"></span></td>
            </tr> -->
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="dangnhap" value="Đăng nhập" class="btn btn-primary">
                    <a href="Trangchu.php?quanly=dangky" class="btn btn-primary">Đăng ký</a>
                </td>
            </tr>
        </table>
</form>