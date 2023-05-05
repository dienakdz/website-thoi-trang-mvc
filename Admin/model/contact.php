<?php
include_once 'lib/database.php';
?>
<?php 
class contact
{
    private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function show_contact(){
        $query="SELECT * FROM contact order by ContactID desc";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_all_contact(){
        $query="SELECT * FROM contact";
        $result=$this->db->select($query);
        return $result;
    }
    public function rep_contact($id){
        $status="1";
        $query="UPDATE contact SET Status='$status' WHERE ContactID='$id'";
        $result=$this->db->update($query);
        return $result;

    }
    public function count_not_seen(){
        $query="SELECT COUNT(Status) as notseen FROM `contact` WHERE Status='0'";
        $result=$this->db->select($query);
        return $result;

    }

    // public function del_cat($id){
    //     $query="DELETE FROM categories WHERE CategoryID='$id'";
    //     $result=$this->db->delete($query);
    //     if($result){
    //         $alert="<span class='success'> Xóa danh mục thành công </span>";
    //         return $alert;
    //     }else{
    //         $alert="<span class='error'> Xóa danh mục không thành công </span>";
    //         return $alert;
    //     }
    // }
    public function getContbyID($id){
        $query="SELECT * FROM contact WHERE ContactID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
}

?>