<?php
require_once("model.php");
class Contact extends Model
{
    //insert rating 
    function add_contact($contact_name,$contact_email,$contact_subject,$contact_message,$date){
        $query =  "INSERT INTO `contact`(`FullName`, `Email`, `Title`, `Content`, `ContactDate`, `Status`) VALUES ('$contact_name','$contact_email','$contact_subject','$contact_message','$date',0);";
        
        $result = $this->conn->query($query);
        // return $result->fetch_assoc();


    }

}