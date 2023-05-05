<?php
require_once("Models/Detail.php");
class DetailController
{
    var $detail_model;
    public function __construct()
    {
       $this->detail_model = new Detail();
    }
    
    function list()
    {


        $id = $_GET['id'];

        $data = $this->detail_model->detail_sp($id);

        if($data!=null){
        $data_lq = $this->detail_model->sanpham_danhmuc_lq(0,4,$data['CategoryID']);
        }

        // ajax danh gia
        if(isset($_GET['rating_star'])&&isset($_GET['rating_comment'])&&isset($_GET['rating_name'])&&isset($_GET['rating_email'])){
            
            $rating_star = $_GET['rating_star'];
            $rating_comment = $_GET['rating_comment'];
            $rating_name = $_GET['rating_name'];
            $rating_email = $_GET['rating_email'];
            if ($rating_star!='' && $rating_comment!='' && $rating_name!='' && $rating_email!='') {

                $data = $this->detail_model->star_sp($rating_comment,$rating_name,$rating_email,$rating_star,$id);
            }

        }

        // count rating
        $data_count = $this->detail_model->count_rating_sp($id);
        $data_tong = $data_count['tong'];

        // update quantityrating
        $this->detail_model->quantity_rating($data_tong,$id);

        //data rating
        $data_rating = $this->detail_model->rating_sp($id);

        //check tk đã mua hàng chưa để đánh giá
        $check_orders = $this->detail_model->check_orders($id);

        require_once('Views/index.php');
    }


}