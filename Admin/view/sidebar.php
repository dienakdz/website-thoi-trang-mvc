<?php 
include_once 'lib/session.php';
Session::checkSession();
?>
<?php include 'model/contact.php'; 
$cont=new contact();
?>
<?php include 'model/brand.php';
$brand = new brand();
?>
<?php include 'model/category.php';
$cat= new category();
?>
<?php include 'model/product.php';
$pro= new product();
?>
<?php include 'model/order.php';
$order= new order(); 
?>
<?php include 'model/customer.php';
$cus= new customer(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Quản lý TVD Shop
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="upload/logo_tvd.png" >
    <!-- event  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.js"></script>

  

    <!-- APP CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/grid.css">
</head>
<body>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="upload/logo_tvd.png" alt="Comapny logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <img src="upload/<?php echo Session::get('AdminImg') ?>" alt="User picture" class="profile-image">
                <div class="sidebar-user-name">
                    <?php echo Session::get('AdminName'); ?>
                </div>
            </div>
            
            <a href="?act_admin=logout">
                <button class="btn btn-outline">
                    <i class='bx bx-log-out bx-flip-horizontal'></i>
                </button>
            </a>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a class="<?php echo (basename($_GET['act_admin'])=="admin")?"active":""?>" href="?act_admin=admin">
                    <i class='bx bx-home'></i>
                    <span>Quản lý</span>
                </a>
            </li>        
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown ">
                    <i class='bx bx-user-circle'></i>
                    <span>Tài khoản</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                <li>
                <a class="<?php echo (basename($_GET['act_admin'])=="profile")?"active":""?>" href="?act_admin=profile">
                            Chỉnh sửa hồ sơ
                        </a>
                    </li>
                    <li>
                    <a class="<?php echo (basename($_GET['act_admin'])=="addadmin")?"active":""?>" href="?act_admin=addadmin">
                            Thêm tài khoản
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="<?php echo (basename($_GET['act_admin'])=="customerlist")?"active":"";?>" href="?act_admin=customerlist">
                    <i class='bx bx-group'></i>
                    <span>Khách hàng</span>
                </a>
            </li>
            <li>
            <a class="<?php echo (basename($_GET['act_admin'])=="orderlist")?"active":"";?>" href="?act_admin=orderlist">
                    <i class='bx bx-cart-alt'></i>
                    <span>Đơn đặt hàng</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>Sản phẩm</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                    <a class="<?php echo (basename($_GET['act_admin'])=="admincategory")?"active":""?>" href="?act_admin=admincategory">
                            danh mục
                        </a>
                    </li>
                    <li>
                    <a class="<?php echo (basename($_GET['act_admin'])=="adminbrand")?"active":""?>" href="?act_admin=adminbrand">
                            thương hiệu
                        </a>
                    </li>
                    <li>
                    <a class="<?php echo (basename($_GET['act_admin'])=="adminproduct")?"active":""?>" href="?act_admin=adminproduct">
                            sản phẩm
                        </a>
                    </li>
                </ul>
            </li>
            <li>
            <a class="<?php echo (basename($_GET['act_admin'])=="contactlist")?"active":""?>" href="?act_admin=contactlist">
                    <i class='bx bx-chat'></i>
                    <span>Tin nhắn<sup><?php 
                    $count_not=$cont->count_not_seen();
                    while($count_not_seen=$count_not->fetch_assoc()){
                        echo $count_not_seen['notseen'];
                    }
                    ?></sup></span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bx-calendar'></i>
                    <span>Lịch</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-cog'></i>
                    <span>Cài đặt</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#" class="darkmode-toggle" id="darkmode-toggle">
                            Chế độ
                            <span class="darkmode-switch"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
        <!-- MAIN CONTENT -->
        <div class="main">
        <div class="main-header">
        <div class="main-header-left">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                <?php 
                if($_GET['act_admin']=='admin') 
                    echo "Quản lý";
                elseif($_GET['act_admin']=='profile') 
                    echo "Quản lý thông tin";
                elseif($_GET['act_admin']=='addadmin') 
                echo "Thêm quản trị viên";
                elseif($_GET['act_admin']=='customerlist') 
                    echo "Quản lý khách hàng";
                elseif($_GET['act_admin']=='orderlist') 
                echo "Quản lý đơn hàng";
                elseif($_GET['act_admin']=='orderdetails') 
                echo "Chi tiết đơn hàng";
                elseif($_GET['act_admin']=='admincategory' || $_GET['act_admin']=='editcategory') 
                echo "Quản lý danh mục";
                elseif($_GET['act_admin']=='adminbrand' || $_GET['act_admin']=='editbrand' ) 
                echo "Quản lý thương hiệu";
                elseif($_GET['act_admin']=='adminproduct' || $_GET['act_admin']=='editproduct' ) 
                echo "Quản lý sản phẩm";
                elseif($_GET['act_admin']=='contactlist' || $_GET['act_admin']=='replycontact' ) 
                echo "Liên Hệ Của Khách Hàng";
                ?>
            </div>
            <div class="search-wrapper">
    <div class="input-holder">
        <input type="text" class="search-input" placeholder="Type to search" />
        <button class="search-icon" onclick="searchToggle(this, event);"><i class='bx bx-search-alt-2'></i></button>
    </div>
    <i class="bx bx-x close" onclick="searchToggle(this, event);"></i>
</div> 
        </div>
        <div class="main-header-right">
            <div class="User-area">
            <div class="User-avtar">
            <img src="upload/logo_tvd.png"/>
            </div>
                <ul class="User-Dropdown U-open">
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
        </div>