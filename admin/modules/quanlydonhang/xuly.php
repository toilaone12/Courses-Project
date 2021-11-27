<?php
if(isset($_GET['tinhtrang']) && isset($_GET['code'])){
    $tinhtrang = $_REQUEST['tinhtrang'];
    $code =$_REQUEST['code'];
    $conn =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,"dbkhoahoc");
    $sql_update_tt = "UPDATE tblgiohang SET tinhtrang = '$tinhtrang' WHERE madonhang = '$code'";
    $result_update_tt = mysqli_query($conn,$sql_update_tt);
    header("Location: ../../index.php?quanlydonhang");
}
?>