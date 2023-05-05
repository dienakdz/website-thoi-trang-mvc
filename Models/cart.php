<?php
require_once("model.php");
class Cart extends Model
{
    function cart_detail_sp($id)
    {
        $query =  "SELECT * from product where ProductID = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    function cart_detail_sp_update_quantity($update_quantity,$id)
    {
        $query =  "UPDATE product SET Quantity = $update_quantity WHERE ProductID = $id ";
        $result = $this->conn->query($query);
    }
    
}