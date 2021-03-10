<?php
    $conn = mysqli_connect('localhost','root','');
    if(! $conn) {
        die("Kết nối thất bại:". mysqli_connect_error());
    }
    else{
        $sql = "create database QLSP";
        if(mysqli_query($conn,$sql)){
            echo 'Tạo csdl thành công';
        }
        else{
            echo "Tạo csdl thất bại" . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
?>