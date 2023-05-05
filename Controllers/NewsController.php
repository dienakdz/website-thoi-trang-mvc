<?php
require_once("Models/home.php");
class NewsController
{
    var $news_model;
    public function __construct()
    {
       $this->news_model = new Home();
    }
    
    function list()
    {
        require_once('views/index.php');
    }
}