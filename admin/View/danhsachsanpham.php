<?php
    session_start();
    if(isset($_SESSION['active_page'])){
        unset($_SESSION['active_page']);
        $_SESSION['active_page'] = 1;
    }else{
        $_SESSION['active_page'] = 1;
    }
    if(!isset($_SESSION['user_name'])){
        header('Location: index.php');
    }
    include '../Controller/ProductController.php';
    $results = listProduct();
    include './header.php';
?>
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <form action="<?php listProduct() ?>" method ="POST">
                            <div class="form-group pull-right">
                            <input id="search" name = "search" type="text" placehoder="Search"> 
                            <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <a href = "themsp.php" class="btn btn-info btn-fill pull-right">Thêm</a>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>ID Sản Phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Loại sản phẩm</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Thông tin sản phẩm</th>
                            <th>Hình</th>
                            <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($results) { ?>
                                <?php foreach($results as $value) { ?> 
                                    <tr>
                                        <td> <?php echo $value['idsanpham'] ?></td>
                                        <td> <?php echo $value['tensanpham'] ?></td>
                                        <td> <?php echo $value['giatien'] ?></td>
                                        <td> <?php echo $value['loaisanpham'] ?></td>
                                        <td> <?php echo $value['soluong'] ?></td>
                                        <td> <?php echo $value['detail'] ?></td>
                                        <td> 
                                            <div>
                                                <img style="max-width: 65px;border-radius: 10px;" src="../Assets/img/admin/<?php echo $value['hinh'] ?>" alt="">
                                            </div>
                                        <td>
                                        <a href = "themsp.php?id=<?php echo $value['idsanpham']?>" class="btn btn-primary btn-fill" title ="sửa">Sửa</a>
                                        <a href = "themsp.php?xoa_id=<?php echo $value['idsanpham']?>" class="btn btn-danger btn-fill">Xoá</a>
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

