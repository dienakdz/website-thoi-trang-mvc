<?php
$act_admin = isset($_GET['act_admin']) ? $_GET['act_admin'] : "login";
 switch ($act_admin) {
    case 'login':
         // echo 'shirt atc_admin ne :' . $act_admin;
         require_once("view/login.php");
         break;
    case 'admin':
         // echo 'add_shirt_sql ne:' . $atc_admin;
         require_once("view/admin.php");
         break;
    case 'profile':
        require_once("view/profile.php");
        break;
    case 'addadmin':
        include_once 'view/addadmin.php';
        break;
    case 'admincategory':
        require_once("view/admincategory.php");
        break;

    case 'adminbrand':
        require_once("view/adminbrand.php");
        break;
    case 'adminproduct':
        require_once("view/adminproduct.php");
        break;
    case 'customerlist':
        require_once("view/customerlist.php");
        break;
    case 'orderlist':
        require_once("view/orderlist.php");
        break;
    case 'logout':
        include_once 'lib/session.php';
        Session::checkSession();
        Session::destroy();
        header('location:..\?act=home');
        break;
    case 'editcategory':
        include_once 'view/editcategory.php';
        break;
    case 'editbrand':
        include_once 'view/editbrand.php';
        break;
    case 'editproduct':
        include_once 'view/editproduct.php';
        break;
    case 'orderdetails':
        include_once 'view/orderdetails.php';
        break;
    case 'contactlist':
        include_once 'view/contactlist.php';
        break;
    case 'replycontact':
        include_once 'view/replycontact.php';
        break;
        case 'datatable':
            include_once 'view/datatable.php';
            break;
     default:
         // code...
         break;
 }
 // echo 'shirt ne :' . $act_admin;