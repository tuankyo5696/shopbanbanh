<?php 
session_start();
//var_dump($_POST);die;
include '../DB/db.php'; 
include '../admin/Controller/Controller.php';
    
 $banganday = listProduct();
    if(!isset($_SESSION['user'])){
        echo "<script type='text/javascript'>alert('Vui lòng đăng nhập để thanh toán');</script>";
        echo ' <a href="index.php" class="btn btn-success">Trở về trang chủ</a>'; 
    }
    if(isset($_POST['cmd']) && $_POST['cmd'] == '_cart'){
        if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
        $total = (count($_POST) - 3) /3;
        $_SESSION['cart']['total_price'] = 0;
        for($i = 1; $i <= $total; $i++){
            $item = 'item_'.$i;
            $item_name = 'item_name_'.$i;
            $_SESSION['cart'][$item] = array();
            $_SESSION['cart'][$item]['name'] = $_POST[$item_name];
            $amount = 'amount_'.$i;
            $_SESSION['cart'][$item]['price'] = (int)$_POST[$amount];
            $quantity = 'quantity_'.$i;
            $_SESSION['cart'][$item]['total'] = (int)$_POST[$quantity];
            $_SESSION['cart']['total_price'] += (int)$_POST[$quantity]*(int)$_POST[$amount];
        }
    }
    if(isset($_POST['submit_checkout'])){

        $user_id = $_POST['user_id'];
        $billing_last_name = $_POST['billing_last_name'];
        $billing_address_1 = $_POST['billing_address_1'];
        $billing_phone = $_POST['billing_phone'];
        $billing_last_name2 = $_POST['billing_last_name2'];
        $billing_address_2 = $_POST['billing_address_2'];
        $billing_phone2 = $_POST['billing_phone2'];
        $order_comments = $_POST['order_comments'];
        if($billing_address_2 == '' || $billing_last_name2 == '' || $billing_phone2 == '' || $order_comments == ''){
            
        }
        //isert bill
        if(isset($_SESSION['cart']['total_price2'])){
            $gia = $_SESSION['cart']['total_price2'];
        }else{
            $gia = $_SESSION['cart']['total_price'];
        }

        $sql = "insert into bill(gia,user_id,billing_last_name,billing_address_1,billing_phone,billing_last_name2,billing_address_2,billing_phone2,order_comments)
            values ($gia,$user_id,'$billing_last_name','$billing_address_1','$billing_phone','$billing_last_name2','$billing_address_2','$billing_phone2','$order_comments');
            ";
        $connection = db_connect();
        $result = db_insert($connection,$sql);
        if($result){
            //insert bill detail
            ///lấy ra id bill vừa add vào
            $connection = db_connect();
        
            $sql = "select id from bill where user_id = $user_id order by id desc limit 1";
            $bill = db_select($connection,$sql);
            $id_bill = $bill[0]['id'];
            foreach($_SESSION['cart'] as $v => $item) {
                $name = $item['name'];
                $price = $item['price'];
                $total = $item['total'];
                $sql = "insert into bill_detail(ten_sanpham,id_bill,gia,soluong) values('$name','$id_bill','$price','$total')";
                $result = db_insert($connection,$sql);
                if($result){
                    unset($_SESSION['cart']);
                    header('Location: end.php');
                }else{
                    echo "Thanh toán lỗi";
                }
            }
        }else{
            echo "thanh toán lỗi";
        }
     
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
    <title>Trang thanh toán - Web Bánh Ngọt</title>
    
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
                        <h2>Thanh toán</h2>
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
                        <div class="thubmnail-recent">
                            <img src="../img/sukem.png" class="recent-thumb" alt="">
                            <h2><a href="single-product/sukem.php">Bánh su kem ngon</a></h2>
                            <div class="product-sidebar-price">
                                <ins>35.000 đ</ins> <del>50.000 đ</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="../img/sukem2.png" class="recent-thumb" alt="">
                            <h2><a href="single-product/sukem2.php">Bánh su kem loại 2 ngon</a></h2>
                            <div class="product-sidebar-price">
                                <ins>50.000 đ</ins> <del>75.000 đ</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="../img/Tarts3.png" class="recent-thumb" alt="">
                            <h2><a href="single-product/Tart.php">Bánh tart ngon</a></h2>
                            <div class="product-sidebar-price">
                                <ins>35.000 đ</ins> <del>50.000 đ</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="../img/product1.png" class="recent-thumb" alt="">
                            <h2><a href="single-product/Cookie.php">Bánh Cookie ngon</a></h2>
                            <div class="product-sidebar-price">
                                <ins>35.000 đ</ins> <del>50.000 đ</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Bánh gần đây</h2>
                        <ul>
                            <li><a href="Pasty.php">Bánh Pasty ngon</a></li>
                            <li><a href="sukem.php">Bánh su kem ngon</a></li>
                            <li><a href="Cookie.php">Bánh Cookie ngon</a></li>
                            <li><a href="Honey.php">Bánh Honey ngon</a></li>
                            <li><a href="Tart.php">Bánh Tart ngon</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info">Trả về khách hàng? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                            </div>

                            <form id="login-form-wrap" class="login collapse" method="post">


                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                                <p class="form-row form-row-first">
                                    <label for="username">Tài khoản hoặc Email <span class="required">*</span>
                                    </label>
                                    <input type="text" id="username" name="username" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Mật khẩu <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">Quên mật khẩu?</a>
                                </p>

                                <div class="clear"></div>
                            </form>

                            <div class="woocommerce-info">Có mã giảm giá ? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                            </div>

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <button type="button" class="button" onclick="applycoupon()" style="background-color: #5a88ca">Apply Coupon</button>
                                </p>

                                <div class="clear"></div>
                            </form>

                            <form enctype="multipart/form-data" action="checkout.php" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Chi tiết hóa đơn</h3>
                                            <input type="hidden" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['id']?>" placeholder="" id="user_id" name="user_id" class="input-text ">

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Tên<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['name']?>" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text " required>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa chỉ <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['diachi']?>" placeholder="Street address" id="billing_address_1" name="billing_address_1" class="input-text" required>
                                            </p>


                                            <div class="clear"></div>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Điện thoại <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['sdt']?>" placeholder="" id="billing_phone" name="billing_phone" class="input-text" required>
                                            </p>
                                            <div class="clear"></div>


                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                                    <label class="checkbox" for="ship-to-different-address-checkbox">Ship to a different address?</label>
                                    </h3>
                                    <input type="checkbox" value="1" name="ship_to_different_address" checked class="input-checkbox" id="ship-to-different-address-checkbox">
                                    <div class= "different">
                                        <div id ="remove">
                                            <div class="shipping_address" style="display: block;">                    
                                                <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="billing_last_name">Tên  <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="" id="billing_last_name2" name="billing_last_name2" class="input-text " >
                                                </p>
                                                <div class="clear"></div>
                                                <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                    <label class="" for="billing_address_1">Địa chỉ <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="Street address" id="billing_address_2" name="billing_address_2" class="input-text " >
                                                </p>
                                                <div class="clear"></div>
                                                <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                    <label class="" for="billing_phone">Điện thoại <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="" id="billing_phone2" name="billing_phone2" class="input-text " >
                                                </p>
                                                <div class="clear"></div>
                                                </div>
                                                <p id="order_comments_field" class="form-row notes">
                                                    <label class="" for="order_comments">Order Notes</label>
                                                    <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="order_comments" ></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" name="submit_checkout" onclick="clearCart();" >
                                    </div>
                            </form>
                        </div>                       
                        </div>
                    </div>                    
                </div>
                <div>
                    <h2>Sản phẩm của bạn</h2>
                    <table class="table ">
                        <thead>
                            <td>Sản phẩm</td>
                            <td>Giá</td>
                            <td>Số lượng</td>
                        </thead>
                        <tbody>
                        <?php foreach($_SESSION['cart'] as $v => $item) { ?>
                            <tr>
                                <td><?php echo $item['name']?></td>
                                <td><?php echo  $item['price']?></td>
                                <td><?php echo $item['total']?></td>
                            </tr>
                      
                        <?php }?>
                            <tr>
                                <td>Tổng</td>
                                <td id="last_price"  colspan=2 ><?php echo $_SESSION['cart']['total_price']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <main class="main-container">
                    <section class="section">
                        <div class="products">
                        <?php foreach($banganday as $v) {?>                     
                            <div class="product">    
                                <img class="product__image" src="../admin/Assets/img/admin/<?php echo $v['hinh']?>" alt="" >
                                <h2><a href="single-product.php?id=<?php echo $v['idsanpham']?>" class="product__name"><?php echo $v['tensanpham']?></a></h2>
                                <h3 class="product__price"><?php echo $v['giatien']?> </h3> 
                                <button class="add_to_cart_button" data-action="ADD_TO_CART"  >Thêm sản phẩm</button>
                            </div>   
                        <?php }?> 
                        </div>
                    </section>
                    <section class="section">
                        <h2 class="text-center">Giỏ hàng</h2>
                        <div class="cart"></div>
                    </section>
                            
         </main> 

 
   
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
    <!-- <script src="../main.js"></script> -->
    <script src="../main.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/checkout.js"></script>
  </body>
</html>