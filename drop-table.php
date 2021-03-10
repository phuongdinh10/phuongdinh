<?php

    $conn = mysqli_connect('localhost','root','','qlsp');
    if(! $conn){
        echo "Ket noi that bai";
    }else{
        drop_table($conn, 'chitiethoadon');
        drop_table($conn, 'hoadon');
        drop_table($conn, 'sanpham');
        drop_table($conn, 'loaisanpham');
    }
    

    function drop_table($conn, $tableName){
        $sql = "drop table $tableName";
        return mysqli_query($conn, $sql);
    }
?>