<?php
require_once("model.php");
class Checkout extends Model
{
    function check_tinh($id_tinh){
    $query_check_tinh = "SELECT name FROM devvn_tinhthanhpho WHERE matp = '$id_tinh';";
    $check_tinh = $this->conn->query($query_check_tinh)->fetch_assoc();
    return $check_tinh;
    }
    function check_quanhuyen($id_quanhuyen){
    $query_check_quanhuyen = "SELECT name FROM devvn_quanhuyen WHERE maqh = '$id_quanhuyen';";
    $check_quanhuyen = $this->conn->query($query_check_quanhuyen)->fetch_assoc();
    return $check_quanhuyen;
    }
    function check_phuongxa($id_phuongxa){
    $query_check_phuongxa = "SELECT name FROM devvn_xaphuongthitran WHERE xaid = '$id_phuongxa';";
    $check_phuongxa = $this->conn->query($query_check_phuongxa)->fetch_assoc();
    return $check_phuongxa;
    }


    function save($data){
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO orderproduct($f) VALUES ($v);";
        
        $status = $this->conn->query($query);

        $query_mahd = "select OrderID from orderproduct ORDER BY OrderDate DESC LIMIT 1";
        $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();

        foreach ($_SESSION['product'] as $value) {
            $MaHD = $data_mahd['OrderID'];
            $MaSP =$value['ProductID'];
            $SoLuong = $value['Quantity'];
            $DonGia = $value['Price'];
            
            $query_ct = "INSERT INTO orderdetail(OrderID,ProductID,QuantityOrdered,Price) VALUES ($MaHD,$MaSP,$SoLuong,$DonGia)";

            $status_ct = $this->conn->query($query_ct);
        }
        
        if ($status == true and $status_ct = true) {
            // setcookie('msg', 'Đăng ký thành công', time() + 2);
            header('location: ?act=checkout&xuli=order_complete');
        } else {
            
            header('location: ?act=cart');
            // echo "dk k thanh cong";
        }
  }

}