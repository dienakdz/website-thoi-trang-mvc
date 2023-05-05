<?php
require_once("Models/login.php");
class LoginController
{
    var $login_model;
    public function __construct()
    {
        $this->login_model = new Login();
    }
    function login()
    {
        require_once('Views/index.php');
    }
    function login_action()
    {
        $taikhoan = $_POST['customer_user'];
        $matkhau = md5($_POST['customer_pass']);
        if(empty($_POST['customer_pass'] ) || empty($taikhoan) )
        {
            setcookie('msg1', 'Vui lòng nhập đầy đủ thông tin ', time() + 5);
            header('Location: ?act=taikhoan#dangnhap');
        }else{
            if (strpos($taikhoan, "'") != false) {
                $taikhoan = str_replace("'", "\'", $taikhoan);
            }
            $data = array(
                'customer_user' => $taikhoan,
                'customer_pass' => $matkhau,
            );
            $this->login_model->login_action($data);
        }


    }
    function dangky()
    {
        $check1 = 0;
        $check2 = 0;
        if(empty($_POST['dk_customer_user'])||empty($_POST['dk_customer_pass'])||empty($_POST['dk_customer_pass_xacnhan']))
        {
            setcookie('msg1', 'Vui lòng nhập đầy đủ thông tin', time() + 2);
            header('Location: ?act=taikhoan#dangky');
        }else
        {
            $data_check = $this->login_model->check_account();
            foreach ($data_check as $value) {
                if ( $value['Username'] == $_POST['dk_customer_user']) {
                    $check1 = 1;
                }
            }

            if ($_POST['dk_customer_pass'] != $_POST['dk_customer_pass_xacnhan']) {
                $check2 = 1;
            }

            $data = array(
                'Fullname' =>    "",
                'Gender' => "",
                'Email' =>    "",
                'Address'  =>   "",
                'Phonenumber' => "",
                'Username' => $_POST['dk_customer_user'],
                'Password' => md5($_POST['dk_customer_pass']),
                'Position' =>  '1',
                'Status'  =>  '1',
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }

            $this->login_model->dangky_action($data, $check1, $check2);
        }
        
        
    }
    function dangxuat()
    {
        $this->login_model->logout();
    }
    function account()
    {
        $data = $this->login_model->account();

        require_once('Views/index.php');
    }
    function update()
    {
        if(empty($_POST['fullname'])||empty($_POST['phonenumber'])||empty($_POST['user_change'])|| empty($_POST['password_change']))
        {
            setcookie('thaydoitt1', 'Vui lòng nhập đầy đủ thông tin cần thiết(*)', time() + 2);
            header('Location: ?act=taikhoan&xuli=account#doitk');
        }else
        {
            if (isset($_POST['fullname'])) {
                $data = array(
                'Fullname' =>$_POST['fullname'],
                'Gender' => $_POST['gender'],
                'Email' =>   $_POST['email'],
                'Address'  =>   $_POST['address'],
                'Phonenumber' => $_POST['phonenumber'],
                'Username' => $_POST['user_change'],
                'Password' =>md5($_POST['password_change']),
                );
                foreach ($data as $key => $value) {
                    if (strpos($value, "'") != false) {
                        $value = str_replace("'", "\'", $value);
                        $data[$key] = $value;
                    }
                }
                $this->login_model->update_account($data);
            }
            header('location: ?act=taikhoan&xuli=account#doitk');
        }


    }
    function orders(){

        $data = $this->login_model->orders();
        require_once('Views/index.php');

    }
    function update_orders(){
        $id = $_GET['id'];
        $id_product = $_GET['id_product'];
        $data = $this->login_model->update_orders($id,$id_product);
        require_once('Views/index.php');

    }
}
