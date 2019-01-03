<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../Assets/img/download.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Page Admin Bán bánh</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../Assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../Assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../Assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="../Assets/img/sidebar-2.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="https://online.hcmue.edu.vn/" class="simple-text">
                    HCMUE 
                </a>
            </div>

            <ul class="nav">
                
                <li <?php if($_SESSION['active_page'] == 1) echo 'class="active"'; ?>>
                    <a href="danhsachsanpham.php">
                        <i class="pe-7s-note2"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>
                <li <?php if($_SESSION['active_page'] == 2) echo 'class="active"'; ?>>
                    <a href="danhsachloaisp.php">
                        <i class="pe-7s-science"></i>
                        <p>Danh sách loại sản phẩm</p>
                    </a>
                </li>
                <li <?php if($_SESSION['active_page'] == 3) echo 'class="active"'; ?>>
                    <a href="danhsachuser.php">
                        <i class="pe-7s-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li <?php if($_SESSION['active_page'] == 4) echo 'class="active"'; ?>>
                    <a href="danhsachhoadon.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Hoá đơn</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                    <?php switch($_SESSION['active_page']): 
                        case 1: ?>
                            <?php echo "Danh sách sản phẩm"; ?>
                        <?php break; ?>
                        <?php case 2: ?>
                            <?php echo "Danh sách loại sản phẩm"; ?>
                        <?php break; ?>
                        <?php case 3: ?>
                            <?php echo "Danh sách user"; ?>
                        <?php break; ?>
                        <?php case 4: ?>
                            <?php echo "Danh sách hoá đơn"; ?>
                        <?php break; ?>
                        <?php endswitch; 
                        ?>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Hello <?php if(isset($_SESSION['user_name'])) echo  $_SESSION['user_name'] ?>
                            </a>
                        </li>
                        <li>
                            <a href="themsp.php?logout=1">
                                <p>Log out <i class="pe-7s-power"></i></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
