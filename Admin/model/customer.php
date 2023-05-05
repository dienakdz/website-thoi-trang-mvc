<?php
include_once 'lib/database.php';
?>
<?php 
    class customer{
        private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function show_customer(){
        $cus_one_page=10;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $one_page=($trang-1)*$cus_one_page;
        $query="SELECT * FROM customer order by CustomerID desc LIMIT $one_page,$cus_one_page";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_all_customer(){
        $query="SELECT * FROM customer";
        $result=$this->db->select($query);
        return $result;
    }
    public function del_cus($id){
        $query="DELETE FROM customer WHERE CustomerID='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='success'> Xóa khách hàng thành công </span>";
            return $alert;
        }else{
            $alert="<span class='error'> Xóa khách hàng không thành công </span>";
            return $alert;
        }
    }
    }
?>