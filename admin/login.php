    <?php
        session_start();
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"dbkhoahoc");
        if(isset($_POST['dangnhapadmin'])){
            $tk =  $_POST['taikhoan'];
            $mk =  $_POST['matkhau'];
            $sql_select = "Select * from tbladmin where username = '$tk' and password = '$mk'";
            $result_sql = mysqli_query($conn,$sql_select);
            $count_row = mysqli_num_rows($result_sql);
            if($count_row > 0){
                $_SESSION['dangnhapadmin'] = $tk;
                echo $tk;
                header("Location: index.php");
            }else{
                echo "<p>Tài khoản hoặc mật khẩu sai, yêu cầu nhập lại!</p>";
                header("Location: login.php");
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
</head>
    <body>
    <form action="" method="POST" autocomplete="off">
        <table border="1" align="center">
            <tr>
                <td colspan="2" align="center">Đăng nhập vào Admin</td>
            </tr>
            <tr>
                <td>Tên tài khoản:</td>
                <td><input type="text" name="taikhoan" id=""></td>
            </tr>
            <tr>
                <td>Nhập mật khẩu:</td>
                <td><input type="password" name="matkhau" id=""></td>
            </tr>
            <!-- <tr>
                <td colspan="2"><span id="notification"></span></td>
            </tr> -->
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="dangnhapadmin" value="Đăng nhập">
                    <!-- <input type="submit" name="dangky" value="Đăng ký"> -->
                </td>
            </tr>
        </table>
    </form>
</body>
</html>