<?php
require_once("Models/checkout.php");
class CheckoutController
{
    var $checkout_model;
    public function __construct()
    {
        $this->checkout_model = new Checkout();
    }
    
    function  save()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');

        $count = 0;
        if (isset($_SESSION['product'])) {
            foreach ($_SESSION['product'] as $value) {
                $count += $value['ThanhTien'];
            }
        }
        $tentinh = $this->checkout_model->check_tinh($_POST['ls_province']);
        $ten_tinh = $tentinh['name'];
        $tenquanhuyen = $this->checkout_model->check_quanhuyen($_POST['ls_district']);
        $ten_quanhuyen = $tenquanhuyen['name'];
        $tenphuongxa = $this->checkout_model->check_phuongxa($_POST['ls_ward']);
        $ten_phuongxa = $tenphuongxa['name'];


        $data = array(
            
            'OrderDate' => $ThoiGian,
            'Fulname' =>    $_POST['fulname'],
            'Phonenumber' => $_POST['phonenumber'],
            'Address' => $ten_tinh.' - '.$ten_quanhuyen.' - '.$ten_phuongxa.' - '.$_POST['address'],
            'Typeaddress' => $_POST['typeaddress'],
            'Shippingtype' => $_POST['shippingtype'],
            'Totalprice' => $count+32800,
            'CustomerID' => $_SESSION['login']['CustomerID'],
            'Status'  =>  '0',
        );

        $this->checkout_model->save($data);
    }
    function order_complete()
    {

        $count = 0;
        if (isset($_SESSION['product'])) {
            foreach ($_SESSION['product'] as $value) {
                $count += $value['ThanhTien'];
            }
        }
        require_once('Views/index.php');
    }
}
