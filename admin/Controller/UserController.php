<?php
    include '../Model/db.php'; 
    function addUser(){
        $connection = db_connect();
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // $avata = $_POST['avata'];

            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            $uploads_dir = '../Assets/img/admin/';
            $tmp_name = $_FILES["avata"]["tmp_name"];
            $avata = basename($_FILES["avata"]["name"]);
            
            if($_POST['id'] == ''){
                move_uploaded_file($tmp_name, $uploads_dir.$avata);
                $sql = "INSERT INTO user_admin (user_name,password,role,name,avata) VALUES ('$user_name','$password',$role,'$name','$avata')";
                // echo $sql;die;
                $result = db_insert($connection,$sql);
            }
            else{
                $id = $_POST['id'];
                move_uploaded_file($tmp_name, $uploads_dir.$avata);
                $sql = "UPDATE user_admin SET user_name = '$user_name',password = '$password', role = '$role', name ='$name', avata = '$avata' WHERE id = $id";
                $result = db_update($connection,$sql);
            }
            if($result){
                header("Location: /../View/danhsachuser.php");
            }else{
                echo "Thêm thất bại";die();
            }
        }
    }
    function listUser(){
        $connection = db_connect();
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $search = $_POST['search'];
            $sql = "SELECT * FROM user_admin where deleted = 0 and type_name like '%$search%'";
            $results = db_select($connection,$sql);
        }else{
            $sql = "SELECT * FROM user_admin where deleted = 0";
            $results = db_select($connection,$sql);
        }
        return $results;
    }
    function deleteUser($id){
        $connection = db_connect();
        $sql="UPDATE user_admin SET deleted = 1 WHERE id = $id";
        $result = db_update($connection,$sql);
        if($result){
            header("location:../View/danhsachuser.php");
        }
    }
    function editUser(){
        $result = '';
        $connection = db_connect();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM user_admin where id = $id";
            if($connection){
                $connection = db_connect();
            }
            $results = db_select($connection,$sql);
            $result = $results[0];
            //var_dump($result);die;
        }
        return $result;
    }
    function listRole(){
        $connection = db_connect();
        $sql = "SELECT * FROM role where deleted = 0";
        $results = db_select($connection,$sql);
        return $results;
    }
    function logOut(){
        //session_start();
        session_unset();
        session_destroy();
        //ob_start();
        header("location:../View/index.php");
    }
?>