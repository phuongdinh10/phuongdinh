
<?php
    include('config.php');
    $database = new database();
    $conn = $database->connect();

    if(isset($_GET['add'])){
        $maloaisp = $_GET['maloaisp'];
        $masp = $_GET['masp'];
        $tensp = $_GET['tensp'];
        $diengiai = $_GET['diengiai'];
        $nhasanxuat = $_GET['nhasanxuat'];
        $database->insert_sanpham($masp, $tensp, $diengiai, $nhasanxuat, $maloaisp);
        // echo "$masp, $tensp, $diengiai, $nhasanxuat, $maloaisp";
    } else if(isset($_GET['update'])){
        $maloaisp = $_GET['maloaisp'];
        $masp = $_GET['masp'];
        $tensp = $_GET['tensp'];
        $diengiai = $_GET['diengiai'];
        $nhasanxuat = $_GET['nhasanxuat'];
        $database->update_sanpham($masp, $tensp, $diengiai, $nhasanxuat, $maloaisp);
    } else if(isset($_GET['delete'])){
        $masp = $_GET['masp'];
        $database->delete_sanpham($masp);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Sản phẩm </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
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
                    <h2>Sản phẩm</h2>
                    <form action="" method="GET">
                        <label for="">Mã sản phẩm</label>
                        <input type="text" name="masp" placeholder="Mã sản phẩm">
    
                        <label for=""> Tên sản phẩm </label>
                        <input type="text" name="tensp" placeholder="Tên sản phẩm">
    
                        <label for=""> Diễn giải </label>
                        <input type="text" name="diengiai" placeholder="Diễn giải">

                        <label for=""> Nhà sản xuất </label>
                        <input type="text" name="nhasanxuat" placeholder="Nhà sản xuất">

                        <label for="">Mã loại sản phẩm</label>
                        <select name="maloaisp">
                            <?php
                                $data = array();
                                $sql = "select * from loaisanpham order by maloaisp ASC";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    while ($table = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                        $data[] = $table;
                                    }
                                    foreach($data as $key=>$value){
                                            $lop[] = $value;
                                    }
                                }
                                foreach($lop as $key=>$value){
                                    echo ('<option value="'.$value[0].'">'.$value[1].'</option>');
                                }
                            ?>
                        </select>
    
                        <input type="submit" name="add" class="btn btn-success" value="Thêm sản phẩm">
                        <input type="submit" name="update" class="btn btn-success" value="Cập nhật sản phẩm">
                        <input type="submit" name="delete" class="btn btn-success" value="Xoá sản phẩm">
                    </form>
                </div>
            </div>
            
            <div class="content">
                <?php $database->show_info('sanpham'); ?>
            </div>
        </div>
    </body>
</html>

<?php

    $database->close_connect();

?>