<?php
require_once("model.php");
class Shop extends Model
{

    function keywork($a)
    {
        $a = "'%".$a."%'";
        $query = "SELECT * FROM product INNER JOIN productstatus ON product.ProductStatusID = productstatus.ProductStatusID WHERE ProductName LIKE $a  or ProductStatusName LIKE $a LIMIT 0,9";

        require("result.php");
        
        return $data;
    }
    function dongia($a,$b,$c)
    {
        if($a ==0 ){
            $a = "10000";
        }else{
            $a = $a."000";
        }
        $b = $b."000";
        $query = "SELECT * FROM product WHERE CategoryID=$c AND  Price > $a AND Price < $b  LIMIT 0, 9";

        require("result.php");
    
        return $data;
    }

    function dongiashop($a,$b)
    {
        if($a ==0 ){
            $a = "10000";
        }else{
            $a = $a."000";
        }
        $b = $b."000";
        $query = "SELECT * FROM product WHERE  Price > $a AND Price < $b  LIMIT 0, 9";

        require("result.php");
    
        return $data;
    }
    function count_sp()
    {
        $query = "SELECT COUNT(ProductID) as tong FROM product";

        return $this->conn->query($query)->fetch_assoc();
    }
    function count_sp_dm($dm)
    {
        $query = "SELECT COUNT(ProductID) as tong FROM product WHERE CategoryID = $dm";

        return $this->conn->query($query)->fetch_assoc();
    }

}