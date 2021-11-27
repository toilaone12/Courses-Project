<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <form action="modules/quanlysanpham/xuly.php" method="POST" enctype="multipart/form-data">
        <table class="table" border="1" width = "500">
            <thead>
                <!-- <tr>
                    <th scope="col">STT</th>
                    <th><input type="text" name="STT"></th>
                </tr> -->
            </thead>
            <tbody>
                <tr>
                    <th>Ảnh khóa học</th>
                    <th><input type="file" name="anhkhoahoc" id=""></th>
                </tr>
                <tr>
                    <th scope="row">Tên khóa học</th>
                    <th><input type="text" name="tenkhoahoc"></th>
                </tr>
                <tr>
                    <th scope="row">Giá khóa học</th>
                    <th><input type="text" name="giakhoahoc"></th>
                </tr>
                <tr>
                    <th scope="row">Số người tham gia</th>
                    <th><input type="text" name="songuoi"></th>
                </tr>
                <tr>
                    <th>
                        <select name="loaidanhmuc" id="">
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
                                }
                            ?>
                            <?php for($i = 1; $i<=$nums_result; $i++){?>
                            <option value="<?php echo $id[$i];?>"><?php echo $tendanhmuc[$i];?></option>
                            <?php } ?>
                        </select>
                    </th>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="themsanpham" value="Thêm khóa học"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>