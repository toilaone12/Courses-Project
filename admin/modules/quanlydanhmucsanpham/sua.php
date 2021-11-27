<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
</head>
<body>
    <?php
        $idkh = $_REQUEST["idkhoahoc"];
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"dbkhoahoc");
        $sql_select = "Select * from tbldanhmuc where id = $idkh";
        $result_sql = mysqli_query($conn,$sql_select);
        $rows = mysqli_fetch_object($result_sql);
        $id = $rows -> id;
        $tendanhmuc = $rows -> tendanhmuc;
        $thutu = $rows -> stt;
    ?>
    <form action="xuly.php?idkhoahoc=<?php echo $idkh;?>" method="POST">
        <table class="table" border="1" width = "500">
            <thead>
                <!-- <tr>
                    <th scope="col">STT</th>
                    <th><input type="text" name="STT"></th>
                </tr> -->
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Tên danh mục</th>
                    <th><input type="text" name="tenkhoahoc" value="<?php echo $tendanhmuc;?>"></th>
                </tr>
                <tr>
                    <th scope="row">Thứ tự</th>
                    <th><input type="text" name="giakhoahoc" value="<?php echo $thutu;?>"></th>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="suadanhmuc" value="Sửa khóa học"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>