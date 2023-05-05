<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('Controllers/HomeController.php');
        $controller_obj = new HomeController();
        $controller_obj->list();
        break;
    case 'email':
        require_once("views/email/email.php");
        break;
    case 'email_contact':
        require_once("views/email/email_contact.php");
        break;
    case 'list_shirt':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'list_trousers':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'list_hat':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'list_belt':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'list_shoes':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'shop':
    
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
        //trang san pham theo thuong hiệu
    case 'nike':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'adidas':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'louis_vuitton':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'gucci':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'hermes':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'chanel':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'versace':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
        //chi tiet san pham
    case 'detail':
        require_once('Controllers/DetailController.php');
        $controller_obj = new DetailController();
        $controller_obj->list();
        break;
    case 'cart':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Controllers/CartController.php');
        $controller_obj = new CartController();
        switch ($act) {
            case 'list':
                $controller_obj->list_cart();
                break;
            case 'update':
                $controller_obj->update_cart();
                break;
            case 'add':
                if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
                    $controller_obj->add_cart();
                    break;
                }else{
                    echo "<script language='javascript'>alert('Vui lòng đăng nhập để thêm mua sản phẩm!');";
                    echo "location.href=' ?act=taikhoan';</script>";
                     // header('Location: ?act=taikhoan');
                    
                    break;
                }
                
            case 'delete':
                $controller_obj->delete_cart();
                break;
            case 'deleteall':
                $controller_obj->deleteall_cart();
                break;
            default:
                $controller_obj->list_cart();
                break;
        }
        break; 
    case 'checkout':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Controllers/CheckoutController.php');
        $controller_obj = new CheckoutController();
        switch ($act) {
            case 'save':
                $controller_obj->save();
                break;
            case 'order_complete':
                $controller_obj->order_complete();
                break;
        }
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "taikhoan";
        require_once('Controllers/LoginController.php');
        $controller_obj = new LoginController();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            switch ($act) {
                case 'dangxuat':
                    $controller_obj->dangxuat();
                    break;
                case 'account':
                    $controller_obj->account();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                case 'orders':
                    $controller_obj->orders();
                    break;
                case 'update_orders':
                    $controller_obj->update_orders();
                    break;
                default:
                    header('location: ?act=error');
                    break;
            }
            break;
        } else {
            if ((isset($_SESSION['isLogin_Nhanvien']) && $_SESSION['isLogin_Nhanvien'] == true)) {
                switch ($act) {
                    case 'dangxuat':
                        $controller_obj->dangxuat();
                        break;
                    case 'account':
                        $controller_obj->account();
                        break;
                    case 'update':
                        $controller_obj->update();
                        break;
                    default:
                        header('location: ?act=error');
                        break;
                }
                break;
            } else {
                switch ($act) {
                    case 'login':
                        $controller_obj->login();
                        break;
                    case 'dangnhap':
                        $controller_obj->login_action();
                        break;
                    case 'dangky':
                        $controller_obj->dangky();
                        break;
                    default:
                        $controller_obj->login();
                        break;
                }
                break;
            }
        }

    case "gioithieu":
        require_once('Controllers/AboutController.php');
        $controller_obj = new AboutController();
        $controller_obj->list();
        break;
    case "tintuc":
        require_once('Controllers/NewsController.php');
        $controller_obj = new NewsController();
        $controller_obj->list();
        break;
    case "lienhe":
    $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Controllers/ContactController.php');
        $controller_obj = new ContactController();
        switch ($act) {
            case 'list':
               $controller_obj->list();
                break;
            case 'sent':
                $controller_obj->sent();
                break;
        }
        break;

    case "chinhsachmuahang":
        require_once('Controllers/AboutController.php');
        $controller_obj = new AboutController();
        $controller_obj->list();
        break;
    case "doitra":
        require_once('Controllers/AboutController.php');
        $controller_obj = new AboutController();
        $controller_obj->list();
        break;

}
