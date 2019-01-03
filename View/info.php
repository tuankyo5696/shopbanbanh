<?php 
    session_start();
    include '../DB/db.php';
    $connection = db_connect();
    $id = $_SESSION['user_id'];
    $sql = "select * from user where id = $id";
    $results = db_select($connection,$sql);
    $result = $results[0];
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $sdt = $_POST['sdt'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $name = $_POST['name'];
        $connection = db_connect();
        $sql = "update  user set user_name = '$user_name',password =' $password',sdt = '$sdt',ngaysinh = '$ngaysinh',diachi = '$diachi',name = '$name' where id = $id";
  
        $result = db_update($connection,$sql);
        if($result){
            header('Location: index.php');
        }else{
            echo "Sửa thất bại !!";
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
            <form action="info.php" method ="POST">
            <div class="form-group">
            <input type="hidden" value="<?php echo $result['id']?>" name="id" id ="id">
                <label for="formGroupExampleInput">User Name</label>
                <input type="text" class="form-control" id="user_name" name = "user_name" placeholder="User Name" value="<?php echo $result['user_name']?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" class="form-control" id="password" name = "password" placeholder="Password" value="<?php echo $result['user_name']?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="name" name = "name"  placeholder="Tên" value="<?php echo $result['name']?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" name = "sdt"  placeholder="Điện thoại" value="<?php echo $result['sdt']?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Ngày sinh</label>
                <input type="text" class="form-control" id="ngaysinh" name = "ngaysinh" placeholder="Ngày Sinh" value="<?php echo $result['ngaysinh']?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name = "diachi" placeholder="Địa chỉ" value="<?php echo $result['diachi']?>">
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