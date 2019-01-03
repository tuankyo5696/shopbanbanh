<?php
    session_start();
    if(isset($_SESSION['active_page'])){
        unset($_SESSION['active_page']);
        $_SESSION['active_page'] = 3;
    }else{
        $_SESSION['active_page'] = 3;
    }
    if(!isset($_SESSION['user_name'])){
        header('Location: index.php');
    }
    include '../Controller/UserController.php';
    $results = listUser();
    if(isset($_GET['xoa_id'])){
        deleteUser($_GET['xoa_id']);
    }

    include './header.php';
?>
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <form action="<?php listUser() ?>" method ="POST">
                            <div class="form-group pull-right">
                            <input id="search" name = "search" type="text" placehoder="Search"> 
                            <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <a href = "themuser.php" class="btn btn-info btn-fill pull-right">Thêm</a>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Tên User</th>
                            <th>UserName</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Avata</th>
                            <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($results) { ?>
                                <?php foreach($results as $value) { ?> 
                                    <tr>
                                        <td> <?php echo $value['id'] ?></td>
                                        <td> <?php echo $value['name'] ?></td>
                                        <td> <?php echo $value['user_name'] ?></td>
                                        <td> <?php echo $value['password'] ?></td>
                                        <td> <?php echo $value['role'] ?></td>
                                        <td> 
                                            <div>
                                                <img style="max-width: 65px;border-radius: 10px;" src="../Assets/img/admin/<?php echo $value['avata'] ?>" alt="">
                                            </div>
                                        <td>
                                        <a href = "themuser.php?id=<?php echo $value['id']?>" class="btn btn-primary btn-fill">Sửa</a>
                                        <a href = "themuser.php?xoa_id=<?php echo $value['id']?>" class="btn btn-danger btn-fill">Xoá</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
<?php
    include './footer.php';
?>

