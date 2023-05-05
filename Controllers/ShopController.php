<?php
require_once("Models/shop.php");
class ShopController
{
    var $shop_model;
    public function __construct()
    {
        $this->shop_model = new Shop();
    }
    function list()
    {

    if (isset($_GET['sp'])) {
        $data = $this->shop_model->sanpham_danhmuc_lq(0, 9, $_GET['sp']);
        $data_count = $this->shop_model->count_sp_dm($_GET['sp']);
        $data_tong = $data_count['tong'];
     }else{
        if (isset($_POST['price_ao'])) {
                $chuoi = $_POST['price_ao'];
                $arr = explode("-", $chuoi);
                $arr1=explode(".", $arr['0']);
                $arr2=explode(".", $arr['1']);
                $data = $this->shop_model->dongia($arr1['0'], $arr2['0'],1);
                $data_tong1 = count($data);
            }elseif (isset($_POST['price_quan'])) {
                $chuoi = $_POST['price_quan'];
                $arr = explode("-", $chuoi);
                $arr1=explode(".", $arr['0']);
                $arr2=explode(".", $arr['1']);
                $data = $this->shop_model->dongia($arr1['0'], $arr2['0'],2);
                $data_tong2 = count($data);
            }
            elseif (isset($_POST['price_mu'])) {
                $chuoi = $_POST['price_mu'];
                $arr = explode("-", $chuoi);
                $arr1=explode(".", $arr['0']);
                $arr2=explode(".", $arr['1']);
                $data = $this->shop_model->dongia($arr1['0'], $arr2['0'],3);
                $data_tong3 = count($data);
            }
            elseif (isset($_POST['price_thatlung'])) {
                $chuoi = $_POST['price_thatlung'];
                $arr = explode("-", $chuoi);
                $arr1=explode(".", $arr['0']);
                $arr2=explode(".", $arr['1']);
                $data = $this->shop_model->dongia($arr1['0'], $arr2['0'],4);
                $data_tong4 = count($data);
            }
            elseif (isset($_POST['price_giay'])) {
                $chuoi = $_POST['price_giay'];
                $arr = explode("-", $chuoi);
                $arr1=explode(".", $arr['0']);
                $arr2=explode(".", $arr['1']);
                $data = $this->shop_model->dongia($arr1['0'], $arr2['0'],5);
                $data_tong5 = count($data);
            }
            elseif (isset($_POST['price'])) {
                $chuoi = $_POST['price'];
                $arr = explode("-", $chuoi);
                $arr1=explode(".", $arr['0']);
                $arr2=explode(".", $arr['1']);
                $data = $this->shop_model->dongiashop($arr1['0'], $arr2['0']);
                $data_tong = count($data);
            }
            else{
                if (isset($_POST['keyword'])) {
                $data = $this->shop_model->keywork($_POST['keyword']);
                }
                elseif($_GET['act'] == 'list_shirt'){
                    $id = isset($_GET['trangao']) ? $_GET['trangao'] : 1;
                    // echo "dang ở trang áo";
                    $limit = 9;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->limit_ao($start, $limit);
                    $data_count = $this->shop_model->count_sp_dm(1);
                    $data_tong = $data_count['tong'];
                    $test = 0;
                }
                elseif($_GET['act'] == 'list_trousers'){
                    $id = isset($_GET['trangquan']) ? $_GET['trangquan'] : 1;
                    // echo "dang ở trang áo";
                    $limit = 9;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->limit_quan($start, $limit);
                    $data_count = $this->shop_model->count_sp_dm(2);
                    $data_tong = $data_count['tong'];
                    $test = 0;
                }
                elseif($_GET['act'] == 'list_hat'){
                    $id = isset($_GET['trangmu']) ? $_GET['trangmu'] : 1;
                    // echo "dang ở trang áo";
                    $limit = 9;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->limit_mu($start, $limit);
                    $data_count = $this->shop_model->count_sp_dm(3);
                    $data_tong = $data_count['tong'];
                    $test = 0;
                }
                elseif($_GET['act'] == 'list_belt'){
                    $id = isset($_GET['trangthatlung']) ? $_GET['trangthatlung'] : 1;
                    // echo "dang ở trang áo";
                    $limit = 9;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->limit_thatlung($start, $limit);
                    $data_count = $this->shop_model->count_sp_dm(4);
                    $data_tong = $data_count['tong'];
                    $test = 0;
                }
                elseif($_GET['act'] == 'list_shoes'){
                    $id = isset($_GET['tranggiay']) ? $_GET['tranggiay'] : 1;
                    // echo "dang ở trang áo";
                    $limit = 9;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->limit_giay($start, $limit);
                    $data_count = $this->shop_model->count_sp_dm(5);
                    $data_tong = $data_count['tong'];
                    $test = 0;
                }
                elseif($_GET['act'] == 'nike'){
                    $data = $this->shop_model->sp_theo_brand(1);
                }
                elseif($_GET['act'] == 'adidas'){
                    $data = $this->shop_model->sp_theo_brand(2);
                }
                elseif($_GET['act'] == 'louis_vuitton'){
                    $data = $this->shop_model->sp_theo_brand(5);
                }
                elseif($_GET['act'] == 'gucci'){
                    $data = $this->shop_model->sp_theo_brand(7);
                }
                elseif($_GET['act'] == 'hermes'){
                    $data = $this->shop_model->sp_theo_brand(8);
                }
                elseif($_GET['act'] == 'chanel'){
                    $data = $this->shop_model->sp_theo_brand(9);
                }
                elseif($_GET['act'] == 'versace'){
                    $data = $this->shop_model->sp_theo_brand(10);
                }
                
            }
        }

          
        $data_sanphamao_left1 = $this->shop_model->sanpham_danhmuc(0,3,1);
        $data_sanphamao_left2 = $this->shop_model->sanpham_danhmuc(0,3,2);
        $data_sanphamao_left3 = $this->shop_model->sanpham_danhmuc(0,3,3);

        require_once('Views/index.php');
    }
}
