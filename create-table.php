<?php
    $conn = mysqli_connect('localhost','root','','qlsp');

    if(!$conn){
        die("kết nối thất bại" . mysqli_connect_error());
    }else{

        $loaisanpham = "create table if not exists LoaiSanPham (
            maloaisp varchar(10) not null,
            tenloaisp varchar(40) not null,
            diengiai varchar(45) not null default 'ko có',
            created_at datetime,
            updated_at timestamp,
            primary key(maloaisp)
            ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        $sanpham = "create table if not exists SanPham (
            masp varchar(10) not null,
            tensp varchar(40) not null,
            diengiai varchar(45) not null default 'ko có',
            nhasanxuat varchar(45),
            maloaisp varchar(10) not null,
            created_at datetime,
            updated_at timestamp,
            primary key(masp),
            foreign key(maloaisp) references LoaiSanPham(maloaisp)
            ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        $hoadon = "create table if not exists HoaDon (
            stthd varchar(10) not null,
            ngaylaphd datetime not null,
            created_at datetime,
            updated_at timestamp,
            primary key(stthd)
            ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        $chitiethoadon = "create table if not exists ChiTietHoaDon(
            id int(11) not null primary key auto_increment,
            masp varchar(10) not null,
            stthd varchar(10) not null,
            soluong int,
            dongiaban int, 
            created_at datetime,
            updated_at timestamp, 
            foreign key(masp) references SanPham(masp),
            foreign key(stthd) references HoaDon(stthd)
            ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        if(mysqli_query($conn,$loaisanpham) && mysqli_query($conn,$sanpham) && mysqli_query($conn, $hoadon)
        && mysqli_query($conn, $chitiethoadon)){
            echo 'Tạo csdl thành công';
        }
        else{
            echo "Tạo csdl thất bại" . mysqli_error($conn);
        }
    }
    
?>