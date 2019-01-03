<?php
    session_start();
    include '../DB/db.php'; 
    include '../admin/Controller/Controller.php';

    $banganday = listProduct();
    $listbanner = getListBanner();
    
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
    <title>Bánh Ngọt Doraemon</title>

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
                        <a id="login" href="dangnhap.php?logout=1"> <?php echo $_SESSION['user']['user_name'] ?> - Đăng xuất <span><i class="glyphicon glyphicon-log-out"></i></a>
                        </div>
                    <?php }else{ ?>
                    <div class="shopping-item">
                        <a href="dangnhap.php">Đăng nhập <span><i class="glyphicon glyphicon-log-in"></i></a>
                    </div>
                    <?php }?>
                    

                    <div class="shopping-item">
                        <a href="cart.php">Giỏ hàng - <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><label id='count'></label></span></a>
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
                        <li class="active"><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Trang Sản Phẩm</a></li>
                        <li><a href="cart.php">Giỏ hàng </a></li>
                        <li><a href="checkout.php">Thanh Toán</a></li>
                        <?php if(isset($_SESSION['user'])) { ?> 
                        <li><a href="info.php">Thông tin</a></li>
                        <?php }?>
                        
                        <li><a href="contact.php">Liên hệ</a></li>
                        <li>
                            <form action="shop.php" method="post" style="padding-top: 10px;">
                            <input type="text" placeholder="Search" name = "search">
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                    <?php foreach($listbanner as $v) {?>
					<li>
						<img src="../admin/Assets/img/admin/<?php echo $v['hinh'] ?>" alt="Slide">
						<div class="caption-group">
							    <a class="caption button-radius" href="single-product.php?id=<?php echo $v['idsanpham']?>"><span class="icon"></span>Mua ngay</a>
						</div>
                    </li>
                    <?php }?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>Ngon mới trả tiền</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Miễn phí Ship</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Bảo mật thông tin</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Sản phẩm mới</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Bánh được mua gần đây</h2>
                        <div class="product-carousel">
                            <?php foreach($banganday as $v) { ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img style="height: 270px;" src="../admin/Assets/img/admin/<?php echo $v['hinh']?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                            <a href="single-product.php?id=<?php echo $v['idsanpham']?>" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->


    <!-- Logo các sản phẩm bánh -->
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bánh đang giảm giá</h2>
                        <a href="shop.php" class="wid-view-more">View all</a>
                        <div class="single-wid-product">
                          <a href="single-product.php?id=1"><img src="../img/product1.png" alt="" class="product-thumb"></a>
                          <h2><a href="single-product.php?id=1">Bánh cookie</h2>
                          <div class="product-wid-rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          </div>
                          <div class="product-wid-price">
                              <ins>35.000 đ</ins> <del>50.000 đ</del>
                          </div>

                        </div>
                        <div class="single-wid-product">

                        </div>
                        <div class="single-wid-product">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bánh xem gần đây</h2>
                        <a href="shop.php" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.php?id=6"><img src="../img/sukem.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id=6">Bánh su kem ngon</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>35.000 đ</ins> <del>50.000 đ</del>
                            </div>        
                        </div>
                        <div class="single-wid-product">

                        </div>
                        <div class="single-wid-product">

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Các loại bánh mới</h2>
                        <a href="shop.php" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.php?id=7"><img src="../img/product4.png" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id=7">Bánh ngọt nhỏ ngon</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>100.000 đ</ins> <del>150.000 đ</del>
                            </div>        
                        </div>
                        <div class="single-wid-product">

                        </div>
                        <div class="single-wid-product">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Bánh ngọt <span>Doraemon</span></h2>
                        <p>Sự hài lòng của khánh hàng chính là thành công lớn nhất của chúng tôi.</p>
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
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Các loại bánh</h2>
                        <ul>
                            <li><a href=""></a>Bánh Cookie</li>
                            <li><a href=""></a>Bánh su</li>
                            <li><a href=""></a>Bánh kem</li>
                            <li><a href=""></a>Bánh Tart</li>
                            <li><a href=""></a>Bánh mì</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2018 uCommerce. All Rights Reserved. </p>
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
    </div> <!-- End footer bottom area -->

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
    <!-- Slider -->
    <script type="text/javascript" src="../js/bxslider.min.js"></script>
	<script type="text/javascript" src="../js/script.slider.js"></script>
  </body>
</html>