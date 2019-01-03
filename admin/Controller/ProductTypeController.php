<?php
    include '../Model/db.php'; 
    function listProductType(){
        $connection = db_connect();
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $search = $_POST['search'];
            $sql = "SELECT * FROM product_type where deleted = 0 and type_name like '%$search%'";
            $results = db_select($connection,$sql);
        }else{
            $sql = "SELECT * FROM product_type where deleted = 0";
            $results = db_select($connection,$sql);
        }
        return $results;
    }
    function addProductType(){
        $connection = db_connect();
        if(isset($_POST['tenloaisp'])){
            $tenloaisp = $_POST['tenloaisp'];
            
            if($_POST['idloaisp'] == ''){
                $sql = "INSERT INTO product_type (type_name) VALUES ('$tenloaisp')";
                $result = db_insert($connection,$sql);
            }
            else{
                $idloaisp = $_POST['idloaisp'];
                $sql = "UPDATE product_type SET type_name = '$tenloaisp' WHERE id_product_type = $idloaisp";
                $result = db_update($connection,$sql);
            }
            if($result){
                header("location: ../View/danhsachloaisp.php");
            }else{
                echo "Thêm thất bại";die();
            }
        }
    }

    function editProductType(){
        $result = '';
        $connection = db_connect();
        if(isset($_GET['idloaisp'])){
            $id = $_GET['idloaisp'];
            $sql = "SELECT * FROM product_type where id_product_type = $id";
            if($connection){
                $connection = db_connect();
            }
            $results = db_select($connection,$sql);
            $result = $results[0];
            //var_dump($result);die;
        }
        return $result;
    }

    function deleteProductType($id){
        $connection = db_connect();
        $sql="UPDATE product_type SET deleted = 1 WHERE id_product_type = $id";
        $result = db_update($connection,$sql);
        if($result){
            header("location:../View/danhsachloaisp.php");
        }
    }
    function logOut(){
        //session_start();
        session_unset();
        session_destroy();
        //ob_start();
        header("location:../View/index.php");
    }

?>