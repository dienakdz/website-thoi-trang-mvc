<?php
require_once("model.php");
class Login extends Model
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function login_action($data)
    {
        $query = "SELECT * from customer  WHERE Username = '" . $data['customer_user'] . "' AND Password = '" . $data['customer_pass'] . "' AND Status = 1";

        $login = $this->conn->query($query)->fetch_assoc();
        if ($login !== NULL) {
            
            if($login['MaQuyen'] == 2){
            $_SESSION['isLogin_Nhanvien'] = true;
            $_SESSION['login'] = $login;
            }else{
                $_SESSION['isLogin'] = true;
                $_SESSION['login'] = $login;
            }
            
            header('Location: ?mod=home');
        } else {
             
            setcookie('msg1', 'Thông tin đăng nhập không chính xác ', time() + 5);
            header('Location: ?act=taikhoan#dangnhap');
            // echo $data['customer_pass'];
            
                    
        }
        
    }
    function logout()
    {
        if(isset($_SESSION['isLogin_Nhanvien'])){
            unset($_SESSION['isLogin_Nhanvien']);
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['isLogin'])){
            unset($_SESSION['isLogin']);
            unset($_SESSION['login']);
            unset($_SESSION['product']);
        }
        header('location: ?act=home');
    }
    function check_account()
    {
        $query =  "SELECT * from customer";

        require("result.php");

        return $data;
    }
    function dangky_action($data, $check1, $check2)
    {
        if ($check1 == 0) {
            if ($check2 == 0) {
                $f = "";
                $v = "";
                foreach ($data as $key => $value) {
                    $f .= $key . ",";
                    $v .= "'" . $value . "',";
                }
                $f = trim($f, ",");
                $v = trim($v, ",");
                $query = "INSERT INTO customer($f) VALUES ($v);";

                $status = $this->conn->query($query);
                if ($status == true) {
                    setcookie('msg1', 'Đăng ký thành công', time() + 2);
                } else {
                    setcookie('msg1', 'Đăng ký không thành công', time() + 2);
                }
            } else {
                setcookie('msg1', 'Mật khẩu không trùng nhau', time() + 2);
            }
        } else {
            setcookie('msg1', 'Tên tài khoản đã tồn tại', time() + 2);
        }
        header('Location: ?act=taikhoan#dangky');
    }
    function account()
    {
        $id = $_SESSION['login']['CustomerID'];
        
        return $this->conn->query("SELECT * from customer where CustomerID = $id")->fetch_assoc();
    }
    function update_account($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE customer SET  $v   WHERE  CustomerID = " . $_SESSION['login']['CustomerID'];

        $result = $this->conn->query($query);
        
        if ($result == true) {
            setcookie('thaydoitt', 'Cập nhật tài khoản thành công', time() + 2);
            header('Location: ?act=taikhoan&xuli=account#doitk');
        } else {
            setcookie('thaydoitt', 'Mật khẩu xác nhận không đúng', time() + 2);
            header('Location: ?act=taikhoan&xuli=account#doitk');
        }
    }
    // đơn mua
    function orders(){
        $id = $_SESSION['login']['CustomerID'];
        $query =  "SELECT * from orderproduct INNER JOIN orderdetail ON orderproduct.OrderID = orderdetail.OrderID 
                                              INNER JOIN product ON orderdetail.ProductID = product.ProductID 
                                              where CustomerID = '$id'";
        require("result.php");

        return $data;
    }
    function update_orders($id,$id_product){
        $query = "UPDATE orderproduct SET  Status = 3   WHERE  OrderID='$id'";

        $result = $this->conn->query($query);
        echo "<script language='javascript'>alert('Cảm ơn bạn đã mua hàng! Đánh giá sản phẩm ngay nào!');";
        echo "location.href=' ?act=detail&id=$id_product';</script>";
    }


    function error()
    {
        header('location: ?act=errors');
    }
}
