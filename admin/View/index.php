<?php

    session_start();
    include '../Model/db.php'; 
    //Kiểm tra session đăng nhập của user, để chuyển hướng qua trang khác
    if(isset($_SESSION['user_name'])){
        header('Location: danhsachsanpham.php');
    }
    //Nhận username và password khi submit form  
    if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username']!= '' && $_POST['password'] != ''){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $connection = db_connect();
        // so sánh username và password với database
        $sql = "SELECT * FROM user_admin where user_name = '$username' and password = '$password'";
        $result = db_select($connection,$sql);
        if($result){
            // đăng nhập thành công thì chuyển hướng qua trang danhsachsanpham và lưu session
            $_SESSION['user_name'] = $result[0]['user_name'];
            header('Location: danhsachsanpham.php');
        }

    }
    
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="../Assets/css/style.css">
<div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="float">
                        <!-- Gửi form bằng phương thức post, gửi tới index.php -->
                        <form class="form" action="index.php" method ="POST">
                            <div class="form-group">
                                <label for="username" class="text-white">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>