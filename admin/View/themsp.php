<?php
    session_start();
    include '../Controller/ProductController.php';
    if(isset($_POST['tensp'])){
        addProduct();
    }
    if(isset($_GET['id'])){
        $result = editProduct();
    }
    if(isset($_GET['xoa_id'])){
        deleteProduct($_GET['xoa_id']);
    }
    if(isset($_GET['logout']) == 1){
        logOut();
    }
    $result = editProduct(); 
    $listProductTypes = listProductType();
    
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
                                <form action="themsp.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="idsp" name="idsp" value="<?php if(!empty($result))  echo $result['idsanpham'] ?>">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name= "tensp" id="tensp" placeholder="Example input" value = "<?php if(!empty($result)) echo $result['tensanpham'] ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Giá tiền</label>
                                        <input type="text" class="form-control" name= "giatien" id="giatien" placeholder="Another input" value = "<?php if(!empty($result)) echo $result['giatien'] ?>" > 
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Loại sản phẩm</label>
                                        <select class="form-control" id="loaisp" name="loaisp" >
                                            <?php foreach($listProductTypes as $pt) { ?>
                                                <option value="<?php echo $pt['id_product_type'] ?>" <?php if(!empty($result) && $pt['id_product_type'] == $result['loaisanpham']) echo "selected"?> ><?php echo $pt['type_name'] ?></option> 
                                            <?php }    ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Số lượng</label>
                                        <input type="text" class="form-control" name= "soluong" id="soluong" placeholder="Another input" value = "<?php if(!empty($result)) echo $result['soluong'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin sản phẩm</label>
                                        <textarea rows="5" class="form-control" name = "detail" id = "detail" placeholder="Thông tin sản phẩm" value=""><?php if(!empty($result)) echo $result['detail'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Hình</label>
                                        <input type="file" class="" name= "hinh" id="hinh" placeholder="Another input" value = "<?php if(!empty($result)) echo 'C:\wamp64\www\cc\admin\Assets\img\admin\03-deo-dau-xanh-hat-dua-e1505892838355.png' ?>">
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