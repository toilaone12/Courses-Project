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
        $tk = $_REQUEST["taikhoan"];
        $mk = $_REQUEST["matkhau"];
        $conn = mysqli_connect("localhost","root","") or die ("Connect Fail!");
        $db = mysqli_select_db($conn,"dbcar")  or die ("Connect Fail Database!");
        // $sql = "INSERT INTO `tbltaikhoan`(`id`, `taikhoan`, `matkhau`) VALUES (NULL,'$tk','$mk')";
        $sql_select = "Select * from tbltaikhoan where taikhoan = '$tk' and matkhau ='$mk'";
        $result = mysqli_query($conn,$sql_select);
        $nums_row = mysqli_num_rows($result);
        if($nums_row){
            header("Location: f8-shop");
        }else{
            header("Location: TestFrmDangNhap.php");
        }
    ?>
</body>
</html>