<?php
    if(isset($_REQUEST['madonhang'])){
        $madh = $_REQUEST['madonhang'];
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"dbkhoahoc");
        $sql_select_chitiet = "Select * from tblchitietdonhang ctdh,tblkhoahoc kh where ctdh.id_sp = kh.id_kh and madonhang = '$madh'";
        $result_select_chitiet = mysqli_query($conn,$sql_select_chitiet);
    }
?>
<p style="text-align: center;">Chi tiết đơn hàng</p>
    <table class="table" border="1" width = "1200" align="center">
            <thead>
                <tr >
                    <th scope="col">STT</th>
                    <th scope="row">Mã khóa học</th>
                    <th scope="row">Tên sản phẩm</th>
                    <th scope="row">Số người</th>
                    <th scope="row">Đơn giá</th>
                    <th scope="row">Thành tiền</th>
                    <!-- <th scope="row">Địa chỉ</th>
                    <th scope="row">Thời gian mua khóa học</th>
                    <th scope="row">Quản lý</th> -->
                    <!-- <td width = "200"></td> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <th scope="row">Tên khóa học</th> -->  
                    <?php
                        $tongtien = 0;
                        while($row_select_chitiet = mysqli_fetch_array($result_select_chitiet)){
                            $thanhtien = $row_select_chitiet['giakhoahoc'] * $row_select_chitiet['songuoidangky'];
                            $tongtien = $tongtien + $thanhtien;
                    ?>                
                    <tr align="center">
                        <td height = "50"><?php echo $row_select_chitiet['id'];?></td>
                        <td height = "50"><?php echo $row_select_chitiet['madonhang'];?></td>
                        <td height = "50"><?php echo $row_select_chitiet['tenkhoahoc'];?></td>
                        <td height = "50"><?php echo $row_select_chitiet['songuoidangky'];?></td>
                        <td height = "50"><?php echo number_format($row_select_chitiet['giakhoahoc'],0,',','.')."VND"; ?></td>
                        <td height = "50"><?php echo number_format($thanhtien,0,',','.')."VND"; ?></td>
                    </tr>
                    
                    <?php 
                        }
                    ?>
                    <tr>
                        <td height = "50" colspan="6">Tổng tiền: <?php echo number_format($tongtien,0,',','.')."VND"; ?></td>   
                    </tr>
                </tr>
            </tbody>
    </table>
