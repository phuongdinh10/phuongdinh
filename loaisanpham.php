
<?php
    include('config.php');
    $database = new database();
    $database->connect();
    $result = $database->getAll('loaisanpham');

    if(isset($_GET['add'])){
        $maloaisp = $_GET['maloaisp'];
        $tenloaisp = $_GET['tenloaisp'];
        $diengiai = $_GET['diengiai'];
        $result = "select * from loaisanpham";
        $database->insert_loaisanpham($maloaisp, $tenloaisp, $diengiai);
    } else if(isset($_GET['update'])){
        $maloaisp = $_GET['maloaisp'];
        $tenloaisp = $_GET['tenloaisp'];
        $diengiai = $_GET['diengiai'];
        $database->update_loaisanpham($maloaisp, $tenloaisp, $diengiai);
    } else if(isset($_GET['delete'])){
        $maloaisp = $_GET['maloaisp'];
        $database->delete_sanpham($maloaisp);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Loại sản phẩm </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/index.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="sidebar">
                <a href="loaisanpham.php">Loại Sản phẩm</a>
                <a href="sanpham.php">Sản phẩm</a>
                <a href="hoadon.php">Hoá đơn</a>
                <a href="chitiethoadon.php">Chi tiết hoá đơn</a>
            </div>
            <div class="header">
                <div class="form-input">
                    <h2>Loại sản phẩm</h2>
                    <form action="" method="GET">
                        <label for="">Mã loại sản phẩm</label>
                        <input type="text" name="maloaisp" placeholder="Mã loại sản phẩm">
    
                        <label for=""> Tên loại sản phẩm </label>
                        <input type="text" name="tenloaisp" placeholder="Tên loại sản phẩm">
    
                        <label for=""> Diễn giải </label>
                        <input type="text" name="diengiai" placeholder="Diễn giải">
    
                        <input type="submit" name="add" class="btn btn-success" value="Thêm loại sản phẩm">
                        <input type="submit" name="update" class="btn btn-success" value="Cập nhật loại sản phẩm">
                        <input type="submit" name="delete" class="btn btn-success" value="Xoá loại sản phẩm">
                    </form>
                </div>
            </div>
            <div class="content">
                <?php $database->show_info('loaisanpham'); ?>
            </div>
        </div>
    </body>
</html>

<?php

    $database->close_connect();

?>