<h3 style="text-align: center;">Đổi mật khẩu</h3>
<?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,"dbkhoahoc");
    if(isset($_POST['thaydoimatkhau'])){
        $tk = $_REQUEST['taikhoan'];
        $mkc = $_REQUEST['matkhaucu'];
        $mkm = $_REQUEST['matkhaumoi'];
        $sql_check_mkc = "Select * from tblnguoidung where (email = '$tk' or sodienthoai = '$tk') and matkhau = '$mkc'";
        $result_check_mkc = mysqli_query($conn,$sql_check_mkc);
        if(mysqli_num_rows($result_check_mkc) > 0){
            $sql_update_mkm = "UPDATE tblnguoidung SET matkhau = '$mkm' where email = '$tk' or sodienthoai = '$tk'";
            $result_update_mkm = mysqli_query($conn,$sql_update_mkm);
            echo "<p>Thay đổi mật khẩu thành công</p>";
        }else{
            echo "<p>Thay đổi mật khẩu thất bại</p>";
        }
    }
?>
<form action="" method="POST" autocomplete="off">
        <table border="1" align="center">
            <tr>
                <td>Tên tài khoản:</td>
                <td><input type="text" name="taikhoan" id="" placeholder="Email or Phone Number"></td>
            </tr>
            <tr>
                <td>Nhập mật khẩu cũ:</td>
                <td><input type="password" name="matkhaucu" id="" placeholder="Password"></td>
            </tr>
            <tr>
                <td>Nhập mật khẩu mới:</td>
                <td><input type="password" name="matkhaumoi" id="" placeholder="Password"></td>
            </tr>
            <!-- <tr>
                <td colspan="2"><span id="notification"></span></td>
            </tr> -->
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="thaydoimatkhau" value="Đồng ý" class="btn btn-primary">
                    <a href="Trangchu.php" class="btn btn-primary">Hủy bỏ</a>
                </td>
            </tr>
        </table>
</form>