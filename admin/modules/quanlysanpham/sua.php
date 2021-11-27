<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <?php
        $idkh = $_REQUEST["idkhoahoc"];
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"dbkhoahoc");
        $sql_select = "Select * from tblkhoahoc where id_kh = $idkh";
        $result_sql = mysqli_query($conn,$sql_select);
        $rows = mysqli_fetch_object($result_sql);
        $id = $rows -> id_kh;
        $tenkhoahoc = $rows -> tenkhoahoc;
        $giakhoahoc = $rows -> giakhoahoc;
        $songuoi = $rows -> songuoi;
        $imgkh = $rows -> anh_kh;
        $loaidanhmuc = $rows -> id_danhmuc;
    ?>
    <form action="xuly.php?idkhoahoc=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
        <table class="table" border="1" width = "500">
            <thead>
                <!-- <tr>
                    <th scope="col">STT</th>
                    <th><input type="text" name="STT"></th>
                </tr> -->
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Ảnh khóa học</th>
                    <th><img src="./img/<?php echo $imgkh?>" width="100" height="50" alt=""></th>
                    <th><input type="file" name="anhkhoahoc" value="<?php echo $imgkh;?>"></th>
                </tr>
                <tr>
                    <th scope="row">Tên khóa học</th>
                    <th colspan="2"><input type="text" name="tenkhoahoc" value="<?php echo $tenkhoahoc;?>"></th>
                </tr>
                <tr>
                    <th scope="row">Giá khóa học</th>
                    <th colspan="2"><input type="text" name="giakhoahoc" value="<?php echo $giakhoahoc;?>"></th>
                </tr>
                <tr>
                    <th scope="row">Số người tham gia</th>
                    <th colspan="2"><input type="text" name="songuoi" value="<?php echo $songuoi;?>"></th>
                </tr>
                <tr>
                    <th scope="row">Loại danh mục</th>
                    <th colspan="2">
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
                    <td colspan="3" align="center"><input type="submit" name="suasanpham" value="Sửa khóa học"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>