<?php
    session_start();
    //include '../Controller/ProductController.php';
    include '../Controller/ProductTypeController.php';
    if(isset($_POST['tenloaisp'])){
        addProductType();
    }
    if(isset($_GET['idloaisp'])){
        $result = editProductType();
    }
    if(isset($_GET['logout']) == 1){
        logOut();
    }
    $result = editProductType();
    
    include './header.php';
?>

<div class="row">
    <div class="">
        <div class="card">
            <div class="header">
                <h4 class="title"> 
                <?php  if(!empty($result)) {  
                    echo "Sửa sản phẩm"; ?>
                <?php } else {
                    echo "Thêm sản phẩm"; ?>
                    <?php } ?>
                </h4>
            </div>
            <div class="content">
                <form action="themloaisp.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="idloaisp" name="idloaisp" value="<?php if(!empty($result))  echo $result['id_product_type'] ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name= "tenloaisp" id="tenloaisp" placeholder="Example input" value = "<?php if(!empty($result)) echo $result['type_name'] ?>" >
                    </div>
                    <div class="form-group">
                        <button type ="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include './footer.php';
?>