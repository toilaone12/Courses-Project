
<h3>Giỏ hàng của 
<?php
    if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];
        // echo $_SESSION['id'];
    }
?>
</h3>
<?php
    if(isset($_SESSION['cart'])){
        // print_r($_SESSION['cart']);
    }
?>
<table class="table table-bordered">
  <thead>
    <tr align="center">
      <th scope="col">STT</th>
      <th scope="col">Tên khóa học</th>
      <th scope="col">Giá khóa học</th>
      <th scope="col">Số người tham gia</th>
      <th scope="col">Tổng tiền sản phẩm</th>
      <th scope="col">Quản lý sản phẩm</th>
    </tr>
  </thead>
  <tbody>   
    <?php
        if(isset($_SESSION['cart'])){
            $i = 0; 
            $allsp =0;
            foreach($_SESSION['cart'] as $cart_item){
                $i++;
                $tongtien = $cart_item["songuoi"] * $cart_item["giakhoahoc"];
                $allsp += $tongtien;
    ?>
    <tr align="center">
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $cart_item["tenkhoahoc"];?></td>
      <td><?php echo number_format($cart_item["giakhoahoc"],0,',','.');?></td>
      <td style="display: flex; align-items: center; justify-content:center;">
        <a style="text-decoration: none; color: #000; font-size: 20px; padding-right: 5px;" href="pages/main/themsanpham.php?cong=<?php echo $cart_item['id'];?>"><i class="far fa-plus-square"></i></a>  
        <?php echo $cart_item["songuoi"];?>
        <a style="text-decoration: none; color: #000; font-size: 20px; padding-left: 5px" href="pages/main/themsanpham.php?tru=<?php echo $cart_item['id'];?>"><i class="far fa-minus-square"></i></a>
      </td>
      <td><?php echo number_format($tongtien,0,',','.');?></td>
      <td><a style="text-decoration: none;" href="pages/main/themsanpham.php?xoa=<?php echo $cart_item['id'];?>">Xóa</a></td>
      <div class="res" style="clear: both;"></div>
    </tr>
    <?php
            }
            ?>
        <td colspan="5">Tổng tiền sản phẩm bạn mua: <?php echo number_format($allsp,0,',','.');?>đ</td>
        <td><a style="text-decoration: none;" href="pages/main/themsanpham.php?xoatatca=1">Xóa tất cả sản phẩm hiện có</a></td>
        <?php
          if(isset($_SESSION['dangnhap'])){
        ?>
        <a style="text-decoration: none; text-align:center; width: 5%;" class="btn btn-primary" href="Trangchu.php?quanly=thanhtoan">Đặt Hàng</a>
        <?php
          }else{
        ?>
        <td><a style="text-decoration: none;" href="Trangchu.php?quanly=dangnhap">Đăng nhập để đặt hàng sản phẩm</a></td>
        <?php
          }
        ?>
    <?php
        }else{
          ?>
        <td colspan="5">Hiện tại giỏ hàng đang trống</td>
    <?php
        }
    ?>
  </tbody>
</table>