<?php
    $conn =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,"dbkhoahoc");
    $sql_select_all = "Select * from tblgiohang,tblnguoidung where tblgiohang.id_kh = tblnguoidung.id order by tblgiohang.id ASC";
    $result_select_all = mysqli_query($conn, $sql_select_all);  
    // echo date("H:i:s");
    // echo date_default_timezone_get();
?>

<p style="text-align: center; font-size:22px">Liệt kê danh sách đơn hàng</p>
    <table class="table" border="1" width = "1200" align="center">
            <thead>
                <tr >
                    <th scope="col">STT</th>
                    <th scope="row">Mã khóa học</th>
                    <th scope="row">Tên khách hàng</th>
                    <th scope="row">Tuổi</th>
                    <th scope="row">Email</th>
                    <th scope="row">Số điện thoại</th>
                    <th scope="row">Địa chỉ</th>
                    <th scope="row">Thời gian mua khóa học</th>
                    <th scope="row">Quản lý</th>
                    <!-- <td width = "200"></td> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <th scope="row">Tên khóa học</th> -->  
                    <?php
                        while($row_select_all = mysqli_fetch_array($result_select_all)){
                    ?>                
                    <tr align="center">
                        <td height = "50"><?php echo $row_select_all['id'];?></td>
                        <td height = "50"><?php echo $row_select_all['madonhang'];?></td>
                        <td height = "50"><?php echo $row_select_all['hoten'];?></td>
                        <td height = "50"><?php echo $row_select_all['tuoi'];?></td>
                        <td height = "50"><?php echo $row_select_all['email'];?></td>
                        <td height = "50"><?php echo $row_select_all['sodienthoai'];?></td>
                        <td height = "50"><?php echo $row_select_all['diachi'];?></td>
                        <td height = "50"><?php echo $row_select_all['thoigianmua'];?></td>
                        <td height = "50">
                            <?php
                                if($row_select_all['tinhtrang'] == 1){
                                    echo '<a href="modules/quanlydonhang/xuly.php?tinhtrang=0&code='.$row_select_all['madonhang'].'">Đơn hàng mới</a>';
                                }else{
                                    echo 'Đã xử lý xong!';
                                }
                        ?></td>
                        <td width = "200" ><a style="font-size: 16px;" href="modules/quanlydonhang/xemdonhang.php?madonhang=<?php echo $row_select_all['madonhang'];?>" class="change">Xem chi tiết đơn hàng</a></td>
                        <!-- <td width = "50"><a href="modules/quanlydanhmucsanpham/xuly.php?idkhoahoc=<?php echo $id[$i];?>" class="change">Xóa</a></td> -->
                    </tr>
                    <?php 
                        }
                    ?>
                </tr>
            </tbody>
    </table>