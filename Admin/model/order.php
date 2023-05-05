<?php
include_once 'lib/database.php';
?>
<?php 
    class order{
        private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function show_order(){
        $query="SELECT * FROM orderproduct order by OrderID DESC";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_order_new(){
        $query="SELECT * FROM orderproduct order by OrderID DESC LIMIT 0,5";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_all_order(){
        $query="SELECT * FROM orderproduct";
        $result=$this->db->select($query);
        return $result;
    }
    public function confirm_order($id){
        $status="1";
        $query="UPDATE orderproduct SET Status='$status' WHERE OrderID='$id'";
        $result=$this->db->update($query);
        return $result;

    }
    public function confirm2_order($id){
        $status="2";
        $query="UPDATE orderproduct SET Status='$status' WHERE OrderID='$id'";
        $result=$this->db->update($query);
        return $result;
    }
    
    
    public function order_details_by_id($id){
        $query="SELECT orderdetail.*,orderproduct.Fulname,orderproduct.OrderDate,orderproduct.Phonenumber,orderproduct.Address,orderproduct.Typeaddress,orderproduct.Shippingtype,orderproduct.Totalprice,orderproduct.CustomerID,product.ProductName 
        FROM orderdetail INNER JOIN orderproduct ON orderdetail.OrderID=orderproduct.OrderID 
        INNER JOIN product ON orderdetail.ProductID=product.ProductID 
        WHERE orderdetail.OrderID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function order_details($id){
        $query="SELECT orderdetail.*,orderproduct.Fulname,orderproduct.OrderDate,orderproduct.Phonenumber,orderproduct.Address,orderproduct.Typeaddress,orderproduct.Shippingtype,orderproduct.Totalprice,orderproduct.CustomerID,product.ProductName 
        FROM orderdetail INNER JOIN orderproduct ON orderdetail.OrderID=orderproduct.OrderID 
        INNER JOIN product ON orderdetail.ProductID=product.ProductID 
        WHERE orderdetail.OrderID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function del_cus($id){
        $query="DELETE FROM customer WHERE CustomerID='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='success'> Xóa khách hàng thành công </span>";
            return $alert;
        }else{
            $alert="<span class='error'> Xóa khách hàng không thành công </span>";
            return $alert;
        }
    }
    public function top_pro_order(){
        $query="SELECT orderdetail.ProductID,product.Picture,product.ProductName,SUM(orderdetail.QuantityOrdered) AS quantity, 
        count( product.ProductID) AS product_count FROM orderdetail LEFT JOIN product ON orderdetail.ProductID = product.ProductID 
        GROUP BY orderdetail.ProductID ORDER BY quantity DESC LIMIT 0,5";
        $result=$this->db->select($query);
        return $result;
    }
    }
?>