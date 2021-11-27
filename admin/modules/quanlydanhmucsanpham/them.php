<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modules/quanlydanhmucsanpham/xuly.php" method="POST">
        <table class="table" border="1" width = "500">
            <thead>
                <!-- <tr>
                    <th scope="col">STT</th>
                    <th><input type="text" name="STT"></th>
                </tr> -->
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Tên danh mục</th>
                    <th><input type="text" name="tenkhoahoc"></th>
                </tr>
                <tr>
                    <th scope="row">Số thứ tự</th>
                    <th><input type="text" name="giakhoahoc"></th>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="themdanhmuc" value="Thêm khóa học"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>