<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styleAdmin.css">
</head>
<body>
    <?php 
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"dbkhoahoc");
        $sql_select = "Select * from tbldanhmuc";
        $result_sql = mysqli_query($conn,$sql_select);
        $nums_result = mysqli_num_rows($result_sql);
        $stt = 0;
        while($rows = mysqli_fetch_object($result_sql)){
            $stt++;
            $id[$stt] = $rows -> id;
            $tendanhmuc[$stt] = $rows -> tendanhmuc;
            $thutu[$stt] = $rows -> stt;
        }
    ?> 
    <p>Liệt kê danh sách sản phẩm</p>
    <table class="table" border="1" width = "500">
            <thead>
                <tr >
                    <th scope="col">STT</th>
                    <th scope="row">Tên danh mục</th>
                    <th scope="row">Thứ tự</th>
                    <!-- <td width = "200"></td> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <th scope="row">Tên khóa học</th> -->
                    <?php
                        for($i = 1; $i<=$nums_result; $i++){
                    ?>
                    
                    <tr>
                        <td height = "50"><?php echo $i;?></td>
                        <td height = "50"><?php echo $tendanhmuc[$i];?></td>
                        <td height = "50"><?php echo $thutu[$i];?></td>
                        <td width = "50"><a href="modules/quanlydanhmucsanpham/sua.php?idkhoahoc=<?php echo $id[$i];?>" class="change">Sửa</a></td>
                        <td width = "50"><a href="modules/quanlydanhmucsanpham/xuly.php?idkhoahoc=<?php echo $id[$i];?>" class="change">Xóa</a></td>
                    </tr>
                            
                    <?php 
                        }
                    ?>
                </tr>
            </tbody>
    </table>
</body>
</html>