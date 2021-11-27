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
        $tendm = $_REQUEST["tenkhoahoc"];
        $thutu = $_REQUEST["giakhoahoc"];
        if(isset($_REQUEST["themdanhmuc"])){
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $insert_sql = "INSERT INTO `tbldanhmuc` (id,tendanhmuc,stt) values (NULL,'$tendm',$thutu)";
            $select_sql = "SELECT * from tbldanhmuc where tendanhmuc = '$tendm'";
            $result_select = mysqli_query($conn,$select_sql);
            if(mysqli_num_rows($result_select) == 0){
                $result_insert = mysqli_query($conn,$insert_sql);
                if($result_insert){
                    header("Location: ../../index.php?action=quanlydanhmucsanpham");
                }else{
                    echo "Fail!";
                }
            }else{
                echo "Fail!";
            }
        }else if(isset($_REQUEST["suadanhmuc"])){
            $idkh = $_REQUEST["idkhoahoc"];
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $update_sql = "UPDATE tbldanhmuc set tendanhmuc = '$tendm',stt = $thutu where id = $idkh";
            $result_update = mysqli_query($conn,$update_sql);
                if($result_update){
                    header("Location: ../../index.php?action=quanlydanhmucsanpham");
                }else{
                    echo "Fail!";
                }
        }else{
            $id = $_GET['idkhoahoc'];
            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"dbkhoahoc");
            $delete_sql = "DELETE from tbldanhmuc where id = $id";
            $result_delete = mysqli_query($conn,$delete_sql);
            header("Location: ../../index.php?action=quanlydanhmucsanpham");
        }
    ?>
</body>
</html>