<?php
    include '../DB/db.php'; 
    session_start();
    $connection = db_connect();
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $sdt = $_POST['sdt'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $name = $_POST['name'];
        $connection = db_connect();
        $sql = "INSERT into user (user_name,password,sdt,ngaysinh,diachi,name) values ('$user_name','$password','$sdt','$ngaysinh','$diachi','$name') ";
        $result = db_insert($connection,$sql);
        if($result){
            header('Location: dangnhap.php');
        }else{
            echo "Đăng ký thất bại !!";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>
<div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="../img/doremon.png"></a></h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="dangky.php" method ="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">User Name</label>
                <input type="text" class="form-control" id="user_name" name = "user_name" placeholder="User Name">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" class="form-control" id="password" name = "password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="name" name = "name"  placeholder="Tên">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" name = "sdt"  placeholder="Điện thoại">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Ngày sinh</label>
                <input type="text" class="form-control" id="ngaysinh" name = "ngaysinh" placeholder="Ngày Sinh">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name = "diachi" placeholder="Địa chỉ">
            </div>
            <div class="form-group">
            <input type="submit" class="form-control" id="submit" name="submit">
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>