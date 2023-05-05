<?php
require_once("Models/home.php");
class AboutController
{
    var $about_model;
    public function __construct()
    {
       $this->about_model = new Home();
    }
    
    function list()
    {
        require_once('views/index.php');
    }
}