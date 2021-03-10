<?php

    class database{
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $dbname = 'qlsp';

        public function connect(){
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
            if(!$this->conn){
                exit();
            }else{
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        public function show_info($tableName){
            
            $sql = "select * from $tableName";
            $result = mysqli_query($this->conn, $sql);
            if($result){
                $data = array();
                while($datas = mysqli_fetch_array($result, MYSQLI_NUM)){
                    $data[] = $datas;
                }
                echo "<table border=1 style='border-collapse: collapse; width:100%;'>";
                foreach($data as $key => $value){
                    echo "<tr>";
                    foreach($value as $key1 => $value1){
                        echo "<td> $value1 </td>";
                    }
                    echo "<td style='text-align: center;'>Xoá</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        function getAll($tableName){
            $sql = "select * from $tableName";
            $result = mysqli_query($this->conn, $sql);
            if($result){
                $data = array();
                while($datas = mysqli_fetch_array($result, MYSQLI_NUM)){
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function insert_loaisanpham($maloaisp, $tenloaisp, $diengiai){
            $sql = "insert into loaisanpham (maloaisp, tenloaisp, diengiai, created_at) values
            ('$maloaisp', '$tenloaisp', '$diengiai', current_timestamp())";
            return mysqli_query($this->conn, $sql);
        }
    
        public function insert_sanpham($masp, $tensp, $diengiai, $nhasanxuat, $maloaisp){
            $sql = "insert into sanpham (masp, tensp, diengiai, nhasanxuat, maloaisp, created_at) values 
            ('$masp', '$tensp', '$diengiai', '$nhasanxuat', '$maloaisp', current_timestamp())";
            return mysqli_query($this->conn, $sql);
        }
    
        function insert_hoadon($stthd){
            $sql = "insert into hoadon (stthd, ngaylaphd, created_at) values 
            ('$stthd', current_timestamp(), current_timestamp())";
            return mysqli_query($this->conn, $sql);
        }
    
        public function insert_cthd($masp, $stthd, $soluong, $dongiaban){
            $sql = "insert into chitiethoadon (masp, stthd, soluong, dongiaban, created_at) values 
            ('$masp', '$stthd', '$soluong', '$dongiaban', current_timestamp())";
            return mysqli_query($this->conn, $sql);
        }

        public function update_loaisanpham($maloaisp, $tenloaisp, $diengiai){
            $sql = "update loaisanpham set tenloaisp = '$tenloaisp', 
            diengiai ='$diengiai' where maloaisp = '$maloaisp'";
            return mysqli_query($this->conn, $sql);
        }

        public function update_sanpham($masp, $tensp, $diengiai, $nhasanxuat, $maloaisp){
            $sql = "update sanpham set tensp = '$tensp', 
            diengiai ='$diengiai', nhasanxuat = '$nhasanxuat', maloaisp='$maloaisp' 
            where masp = '$masp'";
            return mysqli_query($this->conn, $sql);
        }

        public function update_cthd($id, $masp, $stthd, $soluong, $dongiaban){
            $sql = "update chitiethoadon set masp = '$masp', 
            stthd ='$stthd', soluong=$soluong, dongiaban=$dongiaban where id = '$id'";
            return mysqli_query($this->conn, $sql);
        }

        public function delete_loaisanpham($maloaisp){
            $sql = "delete from loaisanpham where maloaisp='$maloaisp'";
            return mysqli_query($this->conn, $sql);
        }

        public function delete_sanpham($masp){
            $sql = "delete from sanpham where masp='$masp'";
            return mysqli_query($this->conn, $sql);
        }

        public function delete_hoadon($stthd){
            $sql = "delete from hoadon where maloaisp='$stthd'";
            return mysqli_query($this->conn, $sql);
        }

        public function delete_chitiethoadon($id){
            $sql = "delete from chitiethoadon where id='$id'";
            return mysqli_query($this->conn, $sql);
        }

        public function close_connect(){
            return mysqli_close($this->conn);
        }

        
    }

?>