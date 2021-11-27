<?php
    session_start();
    $conn = mysqli_connect("localhost","root","");
    $db  = mysqli_select_db($conn,"dbkhoahoc");
    //thêm sản phẩm vào giỏ hàng
    if(isset($_POST['themsanpham'])){
        $id = $_GET['id_kh'];
        $songuoi = 1;
        $sql_number = "Select tenkhoahoc, giakhoahoc, songuoi, anh_kh, id_danhmuc from tblkhoahoc where id_kh = '$id'";
        $result = mysqli_query($conn,$sql_number);
        $row = mysqli_fetch_array($result);
        if($row){
            $new_product = array(array('id' => $id,'tenkhoahoc' => $row["tenkhoahoc"], 'songuoi' => $songuoi, 'giakhoahoc' => $row["giakhoahoc"], 'hinhanh' => $row['anh_kh']));
            //kiểm tra giỏ hàng tồn tại hay chưa
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id'] == $id){
                        // echo $cart_item['id'];
                        $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $songuoi+1, 'giakhoahoc' => $cart_item["giakhoahoc"]);
                        $found = true;
                    }else{
                        $product[] = array('id' =>  $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $songuoi, 'giakhoahoc' => $cart_item["giakhoahoc"]);
                    }
                }
                if($found == false){
                    $_SESSION['cart'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cart'] = $product;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header("Location: ../../Trangchu.php?quanly=giohang");   
        // print_r($_SESSION['cart']);
    }
    //xóa tất cả sản phẩm
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header("Location: ../../Trangchu.php?quanly=giohang");  
    }
    //Xóa từng sản phẩm
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !== $id){
                // echo $cart_item['id'];
                $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $cart_item['songuoi'], 'giakhoahoc' => $cart_item["giakhoahoc"]);
            }
            $_SESSION['cart'] = $product;
            header("Location: ../../Trangchu.php?quanly=giohang"); 
        }
    }
    //Cộng và trừ sản phẩm
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !== $id){
                $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $cart_item['songuoi'], 'giakhoahoc' => $cart_item["giakhoahoc"]);
                $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['songuoi']+1;
                if($cart_item['songuoi'] <= 30){
                    $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $tangsoluong, 'giakhoahoc' => $cart_item["giakhoahoc"]);
                }else{
                    $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $cart_item['songuoi'], 'giakhoahoc' => $cart_item["giakhoahoc"]);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header("Location: ../../Trangchu.php?quanly=giohang"); 
    }else if($_GET['tru']){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !== $id){
                $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $cart_item['songuoi'], 'giakhoahoc' => $cart_item["giakhoahoc"]);
                $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['songuoi']-1;
                if($cart_item['songuoi'] > 1 ){
                    $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $tangsoluong, 'giakhoahoc' => $cart_item["giakhoahoc"]);
                }else{
                    $product[] = array('id' => $cart_item['id'],'tenkhoahoc' => $cart_item["tenkhoahoc"], 'songuoi' => $cart_item['songuoi'], 'giakhoahoc' => $cart_item["giakhoahoc"]);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header("Location: ../../Trangchu.php?quanly=giohang"); 
    }
?>