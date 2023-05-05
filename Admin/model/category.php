<?php
include_once 'lib/database.php';
?>
<?php 
class category
{
    private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function insert_category($data,$files){
        $catName=mysqli_real_escape_string($this->db->link,$data['catName']);
        $catDes=mysqli_real_escape_string($this->db->link,$data['catDes']);

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        // $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image="upload/".$file_name;
        // print_r($div);
        // echo $file_ext;

        if($catName=="" || $catDes==""||$file_name==""){
            $alert= "<span class='error'> Danh mục không được để trống</span>";
            return $alert;
        }elseif(in_array($file_ext,$premited)===false){
            $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
            return $alert;
        }else{
            move_uploaded_file($file_tmp,$upload_image);
            $query="INSERT INTO categories(CategoryName,Picture,Description) VALUES('$catName','$file_name','$catDes')";
            $result=$this->db->insert($query);
            if($result){
                $alert="<span class='success'> Thêm danh mục thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Thêm danh mục không thành công </span>";
                return $alert;
            }
        }
    }
    public function show_category(){
        $cat_one_page=10;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $one_page=($trang-1)*$cat_one_page;
        $query="SELECT * FROM categories order by CategoryID desc LIMIT $one_page,$cat_one_page";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_all_category(){
        $query="SELECT * FROM categories ";
        $result=$this->db->select($query);
        return $result;
    }
    public function update_category($data,$files,$id){
        $catName=mysqli_real_escape_string($this->db->link,$data['catName']);
        $catDes=mysqli_real_escape_string($this->db->link,$data['catDes']);
        // $id=mysqli_real_escape_string($this->db->link,$data['catId']);

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        // $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image="upload/".$file_name;


        if($catName=="" || $catDes==""){
            $alert= "<span class='error'> Danh mục không được để trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu chọn ảnh
                if(in_array($file_ext,$premited)===false){
                    $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_tmp,$upload_image);
                $query="UPDATE categories SET CategoryName='$catName',Picture='$file_name',Description='$catDes' WHERE CategoryID = '$id'";
            }else{
                //neu khong chon anh
                $query="UPDATE categories SET CategoryName='$catName',Description='$catDes' WHERE CategoryID= '$id'";
            }
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='success'> Sửa danh mục thành công </span>";
            }else{
                $alert="<span class='error'> Sửa danh mục không thành công </span>";
                return $alert;
            }
        }
    }
    public function del_cat($id){
        $query="DELETE FROM categories WHERE CategoryID='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='success'> Xóa danh mục thành công </span>";
            return $alert;
        }else{
            $alert="<span class='error'> Xóa danh mục không thành công </span>";
            return $alert;
        }
    }
    public function getCatbyID($id){
        $query="SELECT * FROM categories WHERE CategoryID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
}

?>