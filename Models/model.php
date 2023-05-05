<?php
require_once("connection.php");
class model
{
    var $conn;
    function __construct()
    {
        $conn_obj = new connection();
        $this->conn = $conn_obj->conn;
    }
    function limit($a, $b)
    {
        $query =  "SELECT * from product WHERE CategoryID = 1  ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function limit_ao($a, $b)
    {
        $query =  "SELECT * from product WHERE CategoryID = 1  ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function limit_quan($a, $b)
    {
        $query =  "SELECT * from product WHERE CategoryID = 2  ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function limit_mu($a, $b)
    {
        $query =  "SELECT * from product WHERE CategoryID = 3  ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function limit_thatlung($a, $b)
    {
        $query =  "SELECT * from product WHERE CategoryID = 4  ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function limit_giay($a, $b)
    {
        $query =  "SELECT * from product WHERE CategoryID = 5  ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");

        return $data;
    }

    function sp_theo_brand($brand)
    {
        $query =  "SELECT * FROM `product` WHERE brandID=$brand";

        require("result.php");

        return $data;
    }
    


    function danhmuc()
    {
        $query =  "SELECT * from categories ";

        require("result.php");
        
        return $data;
    }

    function chitietdanhmuc($id)

    {
        $query =  "SELECT product.*,categories.CategoryName FROM product INNER JOIN categories ON product.CategoryID=categories.CategoryID where ProductID = $id";

        require("result.php");
        
        return $data;
    }

    function loaisanpham($id)
    {
        $query =  "SELECT product.*,categories.CategoryName FROM product INNER JOIN categories ON product.CategoryID=categories.CategoryID where ProductID = $id";

        require("result.php");
        
        return $data;
    }

    function sanpham_danhmuc($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE ProductStatusID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function sanpham_danhmuc_lq($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE CategoryID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }


    function sanpham_danhmuc_ao($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE CategoryID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function sanpham_danhmuc_quan($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE CategoryID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function sanpham_danhmuc_mu($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE CategoryID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function sanpham_danhmuc_thatlung($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE CategoryID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function sanpham_danhmuc_giay($a, $b, $danhmuc)
    {
        $query =   "SELECT * from product WHERE CategoryID = $danhmuc ORDER BY UpdateDate DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
}