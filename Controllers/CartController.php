<?php
require_once("Models/cart.php");
class CartController
{
    var $cart_model;
    public function __construct()
    {
        $this->cart_model = new Cart();
    }
    function list_cart()
    {

        $count = 0;
        if (isset($_SESSION['product'])) {
            foreach ($_SESSION['product'] as $value) {
                $count += $value['ThanhTien'];
            }
        }

        require_once('Views/index.php');
    }
    function add_cart()
    {
        $id = $_GET['id'];
        $data = $this->cart_model->cart_detail_sp($id);
        $count = 0;
        if (isset($_SESSION['product'][$id])) {
            $arr = $_SESSION['product'][$id];
            $arr['Quantity'] = $arr['Quantity'] + 1;
            $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
            $_SESSION['product'][$id] = $arr;

            $update_quantity = $data['Quantity'] - $_POST['quantity_input'];
            $data = $this->cart_model->cart_detail_sp_update_quantity($update_quantity,$id);
        } else {
            $arr['ProductID'] = $data['ProductID'];
            $arr['ProductName'] = $data['ProductName'];
            $arr['Price'] = $data['Price'];
            $arr['Quantity'] = $_POST['quantity_input'];
            $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
            $arr['Picture'] = $data['Picture'];
            $_SESSION['product'][$id] = $arr;

            $update_quantity = $data['Quantity'] - $_POST['quantity_input'];
            $data = $this->cart_model->cart_detail_sp_update_quantity($update_quantity,$id);

        }

        foreach ($_SESSION['product'] as $value) {
            $count += $value['ThanhTien'];
        }


        header('Location: ?act=cart#dxd');
    }
    function update_cart()
    {
        $id = $_GET['id'];
        $data = $this->cart_model->cart_detail_sp($id);

        $arr = $_SESSION['product'][$_GET['id']];
        $arr['Quantity'] = $arr['Quantity'] + 1;
        $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
        $_SESSION['product'][$_GET['id']] = $arr;

        $update_quantity = $data['Quantity'] - 1;
        $data = $this->cart_model->cart_detail_sp_update_quantity($update_quantity,$id);
        

        header('Location: ?act=cart#dxd');
    }
    function delete_cart()
    {
        $id = $_GET['id'];
        $data = $this->cart_model->cart_detail_sp($id);

        $arr = $_SESSION['product'][$_GET['id']];
        if ($arr['Quantity'] == 1) {
            unset($_SESSION['product'][$_GET['id']]);

        $update_quantity = $data['Quantity'] + 1;
        $data = $this->cart_model->cart_detail_sp_update_quantity($update_quantity,$id);
        } else {
            $arr = $_SESSION['product'][$_GET['id']];
            $arr['Quantity'] = $arr['Quantity'] - 1;
            $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
            $_SESSION['product'][$_GET['id']] = $arr;

            $update_quantity = $data['Quantity'] + 1;
            $data = $this->cart_model->cart_detail_sp_update_quantity($update_quantity,$id);
        }
        header('Location: ?act=cart#dxd');
    }
    function deleteall_cart()
    {
        $id = $_GET['id'];
        $data = $this->cart_model->cart_detail_sp($id);

        $arr = $_SESSION['product'][$_GET['id']];
       
        $update_quantity = $data['Quantity'] +  $arr['Quantity'];
        $data = $this->cart_model->cart_detail_sp_update_quantity($update_quantity,$id);

        unset($_SESSION['product'][$_GET['id']]);

        
        header('Location: ?act=cart#dxd');
    }
}
