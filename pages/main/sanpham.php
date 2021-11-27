<?php
    $id = $_REQUEST["id"];
    $conn = mysqli_connect("localhost","root","");
    $sql_db = mysqli_select_db($conn,"dbkhoahoc");
    $select_detail_kh = "Select * from tbldanhmuc,tblkhoahoc where tbldanhmuc.id = tblkhoahoc.id_danhmuc and tblkhoahoc.id_kh = $id LIMIT 1";
    $result_select_all = mysqli_query($conn,$select_detail_kh);
?>
<style>
    .img-detail{
        width: 100%;
    }
    .flex{
        display: flex; 
        list-style: none;
    }
    .text-primary{
        padding-left: 3px;
    }
    .btn-course{
        margin-top: 8px;
    }

</style>
<h3 class="product-name">Detail Products</h3>
<!-- Classic tabs -->
<div class="classic-tabs border rounded px-4 pt-1">
<?php
    while($row_detail = mysqli_fetch_array($result_select_all)){
?>
  <div class="tab-content row-detail" id="advancedTabContent">
      <div class="col-6-12">
        <img src="admin/modules/quanlysanpham/img/<?php echo $row_detail["anh_kh"];?>" alt="" class="img-detail">
      </div>
      <form action="pages/main/themsanpham.php?id_kh=<?php echo $row_detail["id_kh"];?>" method="POST" style="width: calc(6 / 12 * 100% - 1px);">
        <div class="tab-pane fade show active col-6-12 space" id="description" role="tabpanel" aria-labelledby="description-tab">     
          <h5 class="name-pro">Product Description</h5>
          <p class="small text-muted text-uppercase mb-2">Name: <?php echo $row_detail["tenkhoahoc"];?></p>
          <ul class="rating flex">
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="far fa-star fa-sm text-primary"></i>
            </li>
          </ul>
          <h6><?php echo number_format($row_detail["giakhoahoc"],0,',','.')?> đ / 3 months</h6>
          <p class="pt-1">About: <?php echo $row_detail["songuoi"]?> people</p>
          <span class="ct-course">Category: <?php echo $row_detail["tendanhmuc"]?></span><br>
          <input type="submit" name="themsanpham" value="Insert Product" class="btn-course themsanpham">
        </div>
      </form>
  </div>
<?php
    }
?>
</div>
<!-- Classic tabs -->
