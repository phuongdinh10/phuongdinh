<?php
    $conn = mysqli_connect('localhost','root','','qlsp');
    if(! $conn){
        echo "ket noi that bai";
    }
    else{
        insert_loaisanpham($conn);
    }

    function insert_loaisanpham($conn){
        $sql = "insert into loaisanpham (maloaisp, tenloaisp, diengiai, created_at) values 
        ('SP001','Giày','Giày', current_timestamp()),
        ('SP002','Dép','Dép', current_timestamp())
        ";
        mysqli_query($conn, $sql);

    }
?>