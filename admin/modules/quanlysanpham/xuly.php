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
        $tenkh = $_REQUEST["tenkhoahoc"];
        $giakh = $_REQUEST["giakhoahoc"];
        $song = $_REQUEST["songuoi"];
        $loai = $_REQUEST["loaidanhmuc"];
        // xử lý hình ảnh trong db
        $hinhanh = isset($_FILES['anhkhoahoc']['name']) ? $_FILES['anhkhoahoc']['name'] : "";
        $hinhanhtmp = isset($_FILES['anhkhoahoc']['tmp_name']) ? $_FILES['anhkhoahoc']['tmp_name'] : "";
        $hinhanherror = isset($_FILES['anhkhoahoc']['error']) ? $_FILES['anhkhoahoc']['error'] : "";
        $hinhanhsave = isset($_FILES['anhkhoahoc']['save']) ? $_FILES['anhkhoahoc']['save'] : "";
        $upload_img = ("img/");
        $dmyhis = date("Y").date("m").date("d").date("H").date("i").date("s"); // Lấy giờ của hệ thống
        $file_name = $dmyhis.$hinhanh;
        echo $file_name;
        copy($hinhanhtmp,$upload_img.$file_name);

        if(isset($_REQUEST["themsanpham"])){
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $insert_sql = "INSERT INTO `tblkhoahoc` (id_kh,tenkhoahoc,giakhoahoc,songuoi,anh_kh,id_danhmuc) values (NULL,'$tenkh',$giakh,$song,'$file_name',$loai)";
            $select_sql = "SELECT * from tblkhoahoc where tenkhoahoc = '$tenkh'";
            $result_select = mysqli_query($conn,$select_sql);
            move_uploaded_file($hinhanhtmp,"img/".$hinhanh);
            if(mysqli_num_rows($result_select) == 0){
                $result_insert = mysqli_query($conn,$insert_sql);
                if($result_insert){
                    header("Location: ../../index.php?action=quanlysanpham");
                }else{
                    echo "Fail!";
                }
            }else{
                echo "Fail, Request Write!";
            }
        }else if(isset($_REQUEST["suasanpham"])){
            $idkh = $_REQUEST["idkhoahoc"];
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            move_uploaded_file($hinhanhtmp,"img/".$hinhanh);
            $update_sql = "UPDATE tblkhoahoc set tenkhoahoc = '$tenkh',giakhoahoc = $giakh, songuoi = $song, anh_kh = '$file_name', id_danhmuc = $loai where id_kh = $idkh";
            $select_sql = "SELECT * from tblkhoahoc where id_kh = '$idkh'";
            $result_update = mysqli_query($conn,$update_sql);
                if($result_update){
                    header("Location: ../../index.php?action=quanlysanpham");
                    unlink("img/".$hinhanh);
                }else{
                    echo "Fail!";
                }
        }else{
            $id = $_GET['idkhoahoc'];
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $delete_sql = "DELETE from tblkhoahoc where id_kh = $id";
            $result_delete = mysqli_query($conn,$delete_sql);
            header("Location: ../../index.php?action=quanlysanpham");
        }
    ?>
</body>
</html>