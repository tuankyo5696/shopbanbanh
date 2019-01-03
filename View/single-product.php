<?php
    session_start();
    include '../DB/db.php'; 
    include '../admin/Controller/Controller.php';
    if(isset($_POST['comment'])){
        $id_sp = $_POST['sp_comment'];
        $content = $_POST['content'];
        addComment($_SESSION['user_id'],$id_sp,$content);
        header('Location: single-product.php?id='.$id_sp);
        die;
    }
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $product = getProduct($_GET['id']);
        $id_sanpham = $product['idsanpham'];
        if($product == 0){
            echo "Sản phẩm ko tồn tại :D ?";die;
        }
        $splienquan = getProductByType($product['loaisanpham'],$product['idsanpham']);
        
        $banganday = listProduct2();
        $listproduct = listProduct3();
        $comment = listComment($id_sanpham);
    }else{
        header('Location: index.php');
    }
    


?>

<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang một sản phẩm - Web Bánh Ngọt</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                
                <div class="col-sm-6">
                    <?php 
                   
                   if(isset($_SESSION['user'])) {?>
                   
                       <div class="shopping-item" for="login">
                       <a id="login" href="dangnhap.php?logout=1"> <?php echo $_SESSION['user']['user_name'] ?> - Đăng xuất<span></a>
                       </div>
                   <?php }else{ ?>
                   <div class="shopping-item">
                       <a href="dangnhap.php">Đăng nhập<span></a>
                   </div>
                   <?php }?>
                    <div class="shopping-item">
                        <a href="cart.php">Giỏ hàng - <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                         <li ><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Trang Sản Phẩm</a></li>
                        <li><a href="single-product.php">Một Sản Phẩm</a></li>
                        <li><a href="cart.php">Giỏ hàng </a></li>
                        <li><a href="checkout.php">Thanh Toán</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Mặt hàng đơn</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm</h2>
                        <?php foreach($listproduct as $v) {?>
                            <div class="thubmnail-recent">
                                <img src="../admin/Assets/img/admin/<?php echo $v['hinh']?>" class="recent-thumb" alt="">
                                <h2><a href="single-product.php?id=<?php echo $v['idsanpham']?>"><?php echo $v['tensanpham']?></a></h2>
                                <div class="product-sidebar-price">
                                    <ins><?php echo $v['giatien']?></ins>
                                </div>                             
                            </div>
                        <?php }?>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Bánh gần đây</h2>
                        <ul>
                            <?php foreach($banganday as $v) { ?>
                                <li><a href="single-product.php?id=<?php echo $v['idsanpham']?>"><?php echo $v['tensanpham']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php">Trang chủ</a>
                            <a href="shop.php">Sản Phẩm</a>
                            <a href=""></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img style= "height: 270px;" src="../admin/Assets/img/admin/<?php if(isset($product)) echo $product['hinh']?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php if(isset($product)) echo $product['tensanpham']?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php if(isset($product)) echo $product['giatien']. ' VNĐ'?></ins> <del>$100.00</del>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Thêm vào giỏ hàng</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Miêu tả sẩn phẩm</h2>  
                                                <p><?php if(isset($product)) echo $product['detail']?></p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Phản hồi</h2>
                                                <?php if(isset($_SESSION['user'])) { ?>
                                                <div class="submit-review">
                                                    <form action="single-product.php" method="POST">
                                                        <input type="hidden" name="sp_comment" id="sp_comment" value="<?php echo $id_sanpham?>">
                                                        <p><label for="review">Phản hồi của bạn</label> <textarea  id="content" name= "content" cols="30" rows="10"></textarea></p>
                                                        <p><input type="submit" name="comment" value="Submit"></p>
                                                    </form>
                                                </div>
                                                <?php } else { ?>
                                                    <a href="dangnhap.php">Vui lòng đăng nhập trước khi để lại bình luận :D ?</a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="related-products-wrapper">
                            <table class="table ">
                                <thead>
                                    <td>User</td>
                                    <td>Comment</td>
                                </thead>
                                <?php if(!empty($comment)) {?>
                                <?php foreach ($comment as $v) {?>
                                    <tr>
                                        <td> <?php echo $v['user_name']?></td>
                                        <td> <?php echo $v['content']?></td>
                                    </tr>
                                <?php }?>
                                <?php } else {?>
                                    <tr>
                                    <td colspan=2 style="text-align: center;"> Chưa có người nhận xét</td>
                                    </tr>
                                    <?php }?>
                            </table>
                        </div>
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Sản phẩm liên quan</h2>
                            <div class="related-products-carousel">
                            <?php if(!empty($splienquan))  {?>
                            <?php foreach($splienquan as $v) { ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img style="height: 270px;" src="../admin/Assets/img/admin/<?php echo $v['hinh']?>" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                            <a href="single-product.php?id=<?php echo $v['idsanpham']?>" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <h2><a href="single-product.php?id=<?php echo $v['idsanpham'] ?>"><?php echo $v['tensanpham']?></a></h2>
                                    <div class="product-carousel-price">
                                        <ins><?php echo $v['giatien']?> đ</ins>
                                    </div> 
                                </div>    
                            <?php }?>    
                            <?php }?>                           
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="">Mobile Phone</a></li>
                            <li><a href="">Home accesseries</a></li>
                            <li><a href="">LED TV</a></li>
                            <li><a href="">Computer</a></li>
                            <li><a href="">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                       <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="../js/main.js"></script>
    <script src="../main.js"></script>
  </body>
</html>