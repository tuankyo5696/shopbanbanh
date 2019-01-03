<?php 

?>
<?php
    session_start();
    //include '../Controller/ProductController.php';
    include '../Controller/UserController.php';
    if(isset($_POST['name'])){
        addUser();
    }
    if(isset($_GET['idloaisp'])){
        $result = editUser();
    }
    if(isset($_GET['logout']) == 1){
        logOut();
    }
    if(isset($_GET['xoa_id'])){
        deleteUser($_GET['xoa_id']);
    }
    $result = editUser();
    $listRoles = listRole();
    
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
                <form action="themuser.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php if(!empty($result))  echo $result['id'] ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tên User</label>
                        <input type="text" class="form-control" name= "name" id="name" placeholder="Example input" value = "<?php if(!empty($result)) echo $result['name'] ?>" >
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Username</label>
                        <input type="text" class="form-control" name= "user_name" id="user_name" placeholder="Another input" value = "<?php if(!empty($result)) echo $result['user_name'] ?>" > 
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="text" class="form-control" name= "password" id="password" placeholder="Another input" value = "<?php if(!empty($result)) echo $result['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Role</label>
                        <select class="form-control" id="role" name="role" >
                            <?php foreach($listRoles as $lr) { ?>
                                <option value="<?php echo $lr['id'] ?>" <?php if(!empty($result) && $lr['id'] == $result['role']) echo "selected"?> ><?php echo $lr['name'] ?></option> 
                            <?php }    ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Hình</label>
                        <input type="file" class="" name= "avata" id="avata" placeholder="Another input" value = "<?php if(!empty($result)) echo 'C:\wamp64\www\cc\admin\Assets\img\admin\03-deo-dau-xanh-hat-dua-e1505892838355.png' ?>">
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