<?php
    session_start();
    include '../DB/db.php'; 
    include '../admin/Controller/Controller.php';

    $connection = db_connect();
    if(isset($_POST['search']) && $_POST['search'] != ''){
        $search = $_POST['search'];
        $connection = db_connect();
        $sql = "select * from sanpham where tensanpham like '%$search%' ";
        $banganday = db_select($connection,$sql);
        if(empty($banganday)){
            header('Location: index.php');
        }
    }else{
        $banganday = listProduct();
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
    <title>Trang Sản phẩm- Web Bánh Ngọt</title>
    
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
                       <a href="dangnhap.php">Đăng nhập<span></a>
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
                         <li ><a href="index.php">Trang chủ</a></li>
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
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sản phẩm </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="products">
            <?php foreach($banganday as $v) { ?>
                <div class="product">
                    <img class="product__image" src="../admin/Assets/img/admin/<?php echo $v['hinh']?>" alt="" >
                    <h2><a href="single-product.php?id=<?php echo $v['idsanpham']?>" class="product__name"><?php echo $v['tensanpham']?></a></h2>
                    <h3 class="product__price"><?php echo $v['giatien']?> </h3> 
                    <button class="add_to_cart_button" data-action="ADD_TO_CART">Thêm sản phẩm</button>      
                </div>
            <?php }?>
        </div>
    </section>

    <section class="section">
        <h2 class="text-center">Giỏ hàng</h2>
        <div class="cart"></div>
    </section>
                
     
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../js/jquery.easing.1.3.min.js"></script>
    <script src="../main.js"></script>
    <!-- Main Script -->
    <script src="../js/main.js"></script>
  </body>
</html>