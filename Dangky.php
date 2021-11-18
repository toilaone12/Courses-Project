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
        $db = mysqli_select_db($conn,"dbcar");
        $sql_insert = "INSERT INTO `tbltaikhoan` (`id`, `taikhoan`, `matkhau`) VALUES (NULL, '$tk', '$mk');";
        $sql_select = "Select * from tbltaikhoan where taikhoan = '$tk'";
        $result_select = mysqli_query($conn,$sql_select);
        $nums_row_select = mysqli_num_rows($result_select);
        if($nums_row_select > 0){
            $result_insert = mysqli_query($conn,$sql_insert);
            header("Location: TestFrmDangNhap.php");
        }else{
            echo "Fail!";
        }
    ?>
</body>
</html>