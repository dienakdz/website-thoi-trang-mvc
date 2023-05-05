<?php
require_once("Models/contact.php");
class ContactController
{
    var $contact_model;
    public function __construct()
    {
       $this->contact_model = new Contact();
    }
    
    function list()
    {
          
        require_once('views/index.php');
    }
    function sent()
    {
            $contact_name = $_POST['contact_name'];  
            $contact_email = $_POST['contact_email'];
            $contact_subject = $_POST['contact_subject'];
            $contact_message = $_POST['contact_message'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $date=date("H:i d-m-Y");

            $data = $this->contact_model->add_contact($contact_name,$contact_email,$contact_subject,$contact_message,$date);

            header('location: ?act=lienhe');
    }

        

}