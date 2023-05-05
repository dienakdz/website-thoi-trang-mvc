<?php
require_once("model.php");
class Detail extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT product.*,categories.CategoryName FROM product INNER JOIN categories ON product.CategoryID=categories.CategoryID where ProductID =  $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    //insert rating 
    function star_sp($ratingComment,$ratingName, $ratingEmail,$star,$id){
        $query =  "INSERT INTO `rating`(`RatingComment`, `RatingName`, `RatingEmail`, `Rating_Star`, `ProductID`)
                                 VALUES ('$ratingComment','$ratingName','$ratingEmail',$star,$id)";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();

    }
    // count rating
    function count_rating_sp($id)
    {
        $query = "SELECT COUNT(RatingID) as tong FROM rating WHERE ProductID = $id";

        return $this->conn->query($query)->fetch_assoc();
    }
    // select rating
    function rating_sp($id)
    {
        $query =  "SELECT * FROM `rating` WHERE ProductID =  $id ";
        $result = $this->conn->query($query);

        $data_rating = array();

        while ($row_rating = $result->fetch_assoc()) {
            $data_rating[] = $row_rating;
        }
        return $data_rating;
    }
    // update quantity_rating
    function quantity_rating($data_tong,$id){
        $query =  "UPDATE product SET QuantityRating='$data_tong' WHERE ProductID='$id'";
        $result = $this->conn->query($query);
        // return $result->fetch_assoc();

    }

    function check_orders($id_product){
        if (isset( $_SESSION['login']['CustomerID'])) {
            $id_customer = $_SESSION['login']['CustomerID'];
        }else{
             $id_customer = 0;
        }
        $query =  "SELECT * from orderproduct 
                        INNER JOIN orderdetail ON orderproduct.OrderID = orderdetail.OrderID 
                        INNER JOIN product ON orderdetail.ProductID = product.ProductID 
                        where CustomerID = '$id_customer' and Status = 3 and product.ProductID = '$id_product'";
        $result = $this->conn->query($query);

        $check_orders = array();

        while ($row_check_orders = $result->fetch_assoc()) {
            $check_orders[] = $row_check_orders;
        }
        return $check_orders;

    }
   
}