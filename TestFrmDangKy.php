<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $conn = mysqli_connect("localhost","root","") or die ("Connect Fail!");
        $db = mysqli_select_db($conn,"dbcar")  or die ("Connect Fail Database!");
        $sql = "Select * from tbltaikhoan";
        $result = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($result);
        // $stt = 0;
        while($row = mysqli_fetch_object($result)){
            // $stt++;
            $id = $row -> id;
            $taikhoan = $row -> taikhoan;
            $matkhau = $row -> matkhau;
        }
    ?>
    <form action="Dangky.php" method="post">
        <table border = "1">
            <tr><td colspan = "2">Đăng ký</td></tr>
            <tr>
                <input type="hidden" name="id">
            </tr>
            <tr>
                <td width="141">Tên tài khoản</td>
                <td width="221"><input type="text" id="taikhoan" name="taikhoan" /></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" id="matkhau" name="matkhau" /></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu</td>
                <td><input type="password" id="nhaplaimatkhau" name="nhaplaimatkhau" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Đăng nhập"><input type="submit" value="Đăng ký"></td>
            </tr>
        </table>
    </form>
</body>
</html>