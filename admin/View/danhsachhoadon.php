<?php
    session_start();
    if(isset($_SESSION['active_page'])){   
        unset($_SESSION['active_page']);
        $_SESSION['active_page'] = 4;
    }else{
        $_SESSION['active_page'] = 4;
    }
    
    if(!isset($_SESSION['user_name'])){
        header('Location: index.php');
    }
    include '../Controller/HoaDonController.php';
    $results = listHoaDon();
    if(isset($_GET['xoa_id'])){
        deleteProductType($_GET['xoa_id']);
    }

    
    include './header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div>
            <form action="<?php  ?>" method ="POST">
                <div class="form-group pull-right">
                <input id="search" name = "search" type="text" placehoder="Search"> 
                <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Hoá Đơn</th>
                    <th>Tên người đặt</th>
                    <th>Giá</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php if($results) { ?>
                    <?php foreach($results as $value) { ?> 
                        <tr>
                            <td> <?php echo $value['id'] ?></td>
                            <td> <?php echo $value['billing_last_name'] ?></td>
                            <td> <?php echo $value['gia'] ?></td>
                            <td>
                            <a href = "#" class="btn btn-primary btn-fill">Cập nhật hoá đơn<i class="pe-7s-edit"></i></a>
                            <a href = "#" class="btn btn-danger btn-fill">Xoá hoá đơn<i class="pe-7s-trash"></i></a>
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

