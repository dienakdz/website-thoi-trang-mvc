<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home/home.php");
        break;
    case "list_shirt":
        require_once("shop/list_shirt.php");
        break;
    case "list_trousers":
        require_once("shop/list_trousers.php");
        break;
    case "list_hat":
        require_once("shop/list_hat.php");
        break;
    case "list_belt":
        require_once("shop/list_belt.php");
        break;
    case "list_shoes":
        require_once("shop/list_shoes.php");
        break;
    case "shop":
        require_once("shop/shop.php");
        break;
    case "nike":
        require_once("shop/shop.php");
        break;
    case "adidas":
        require_once("shop/shop.php");
        break;
    case "louis_vuitton":
        require_once("shop/shop.php");
        break;
    case "gucci":
        require_once("shop/shop.php");
        break;
    case "hermes":
        require_once("shop/shop.php");
        break;
    case "chanel":
        require_once("shop/shop.php");
        break;
    case "versace":
        require_once("shop/shop.php");
        break;
     case "detail":
        require_once("product-detail/product-detail.php");
        break;
    case "checkout":
        
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        switch ($act) {
            case 'list':
                require_once("cart/cart.php");
                break;
            case 'order_complete':
                require_once("cart/order_complete.php");
                break;
            // default:
            //     require_once("order/checkout.php");
            //     break;
        }
        break;
    
    case "cart":
        require_once("cart/cart.php");
        break;
    

    case "taikhoan":
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "login";
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            switch ($act) {
                case 'login':
                    require_once("login/login.php");
                    break;
                case 'account':
                    require_once("login/my-account.php");
                    break;
                case 'orders':
                    require_once("login/orders.php");
                    break;
                default:
                    require_once("login/login.php");
                    break;
            }
        } else {
            if ((isset($_SESSION['isLogin_Nhanvien']) && $_SESSION['isLogin_Nhanvien'] == true)) {
                switch ($act) {
                    case 'login':
                        require_once("login/login.php");
                        break;
                    case 'account':
                        require_once("login/my-account.php");
                        break;
                    case 'orders':
                        require_once("login/orders.php");
                        break;
                    default:
                        require_once("login/login.php");
                        break;
                }
            } else {
                switch ($act) {
                    case 'login':
                        require_once("login/login.php");
                        break;
                    default:
                        require_once("login/login.php");
                        break;
                }
            }
            break;
        }
        break;

    case "lienhe":
        require_once("contact/contact.php");
        break;
    case "tintuc":
        require_once("news/news.php");
        break;
    case "gioithieu":
        require_once("about/about.php");
        break;
    case "chinhsachmuahang":
        require_once("about/chinhsachmuahang.php");
        break;
    case "doitra":
        require_once("about/doitra.php");
        break;
    
    
    default:
    // echo $act;
    //     require_once("error-404.php");
        break;
}
