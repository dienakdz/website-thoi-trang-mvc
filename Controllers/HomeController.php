<?php
require_once("Models/home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }
    
    function list()
    {


        $data_sanpham1 = $this->home_model->sanpham_danhmuc(0,4,1);
        $data_sanpham2 = $this->home_model->sanpham_danhmuc(0,4,2);
        $data_sanpham3 = $this->home_model->sanpham_danhmuc(0,4,3);


        require_once('views/index.php');
    }
}