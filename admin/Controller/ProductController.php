<?php
    //session_start();
    include '../Model/db.php'; 
    function __construct() {
        
    } 
    function listProduct(){
        $connection = db_connect();
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $search = $_POST['search'];
            //var_dump($search);die;
            $sql = "SELECT * FROM sanpham where deleted = 0 and tensanpham like '%$search%'";
            $results = db_select($connection,$sql);
        }else{
            $sql = "SELECT * FROM sanpham where deleted = 0";
            $results = db_select($connection,$sql);
        }
        return $results;
    }
    function addProduct(){
        $connection = db_connect();
        if(isset($_POST['tensp'])){
            $tensp = $_POST['tensp'];
            $giatien = $_POST['giatien'];
            $loaisp = $_POST['loaisp'];
            $soluong = $_POST['soluong'];
            $detail = $_POST['detail'];
            /// Xử lý upload file
          
            
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            //var_dump($_FILES['hinh']);die;
            $uploads_dir = '../Assets/img/admin/';
            $tmp_name = $_FILES["hinh"]["tmp_name"];
            $hinh = ($_FILES["hinh"]["name"]);

            if($_POST['idsp'] == ''){
                move_uploaded_file($tmp_name, $uploads_dir.$hinh);
                $sql = "INSERT INTO sanpham (tensanpham, giatien, loaisanpham,soluong,hinh,detail) VALUES ('$tensp',$giatien,$loaisp,$soluong,'$hinh','$detail')";
                $result = db_insert($connection,$sql);
            }
            else{
                move_uploaded_file($tmp_name, $uploads_dir.$hinh);
                $idsp = $_POST['idsp'];
                $sql = "UPDATE sanpham SET tensanpham = '$tensp', giatien = $giatien, loaisanpham = $loaisp, soluong = $soluong, hinh = '$hinh',detail = '$detail' WHERE idsanpham = $idsp";
                $result = db_update($connection,$sql);
            }
            if($result){
                header("location: ../View/danhsachsanpham.php");
            }else{
                echo "Thêm thất bại";die();
            }
        }
    }

    function editProduct(){
        $results = '';
        $connection = db_connect();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM sanpham where idsanpham = $id";
            if($connection){
                $connection = db_connect();
            }
            $results = db_select($connection,$sql);
            // var_dump($results);die;
            // $result = $results[0];
            //var_dump($result);die;
        }
        return $results;
    }

    function deleteProduct($id){
        $connection = db_connect();
        $sql="UPDATE sanpham SET deleted = 1 WHERE idsanpham = $id";
        $result = db_update($connection,$sql);
        if($result){
            header("location:../View/danhsachsanpham.php");die;
        }
    }

    function logOut(){
        //session_start();
        session_unset();
        session_destroy();
        //ob_start();
        header("location:../View/index.php");
    }

    function listProductType(){
        $connection = db_connect();
        $sql = "SELECT * FROM product_type where deleted = 0";
        $results = db_select($connection,$sql);
        return $results;
    }
?>