<?php
    session_start();
    if(isset($_SESSION['active_page'])){   
        unset($_SESSION['active_page']);
        $_SESSION['active_page'] = 2;
    }else{
        $_SESSION['active_page'] = 2;
    }
    
    if(!isset($_SESSION['user_name'])){
        header('Location: index.php');
    }
    include '../Controller/ProductTypeController.php';
    $results = listProductType();
    if(isset($_GET['xoa_id'])){
        deleteProductType($_GET['xoa_id']);
    }

    
    include './header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div>
            <form action="<?php listProductType() ?>" method ="POST">
                <div class="form-group pull-right">
                <input id="search" name = "search" type="text" placehoder="Search"> 
                <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row" style="padding-bottom: 10px;">
        <a href = "themloaisp.php" class="btn btn-info btn-fill pull-right">Thêm</a>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID loại</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php if($results) { ?>
                    <?php foreach($results as $value) { ?> 
                        <tr>
                            <td> <?php echo $value['id_product_type'] ?></td>
                            <td> <?php echo $value['type_name'] ?></td>
                            <td>
                            <a href = "themloaisp.php?idloaisp=<?php echo $value['id_product_type']?>" class="btn btn-primary btn-fill"><i class="pe-7s-edit"></i></a>
                            <a href = "danhsachloaisp.php?xoa_id=<?php echo $value['id_product_type']?>" class="btn btn-danger btn-fill"><i class="pe-7s-trash"></i></a>
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

