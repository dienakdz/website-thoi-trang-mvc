<?php
include_once 'lib/database.php';
?>
<?php 
class brand
{
    private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function insert_brand($data,$files){
        $brandName=mysqli_real_escape_string($this->db->link,$data['brandName']);
        $brandDes=mysqli_real_escape_string($this->db->link,$data['brandDes']);

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $upload_image="upload/".$file_name;

        if($brandName=="" || $brandDes==""||$file_name==""){
            $alert= "<span class='error'> Danh mục không được để trống</span>";
            return $alert;
        }elseif(in_array($file_ext,$premited)===false){
            $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
            return $alert;
        }
        else{
            move_uploaded_file($file_tmp,$upload_image);
            $query="INSERT INTO brand(BrandName,Logo,BrandDesc) VALUES('$brandName','$file_name','$brandDes')";
            $result=$this->db->insert($query);
            if($result){
                $alert="<span class='success'> Thêm thương hiệu thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Thêm thương hiệu không thành công </span>";
                return $alert;
            }
        }
    }
    public function show_brand(){
        $brand_one_page=10;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $one_page=($trang-1)*$brand_one_page;
        $query="SELECT * FROM brand order by BrandID desc LIMIT $one_page,$brand_one_page";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_all_brand(){
        $query="SELECT * FROM brand";
        $result=$this->db->select($query);
        return $result;
    }
    public function update_brand($data,$files,$id){
        $brandName=mysqli_real_escape_string($this->db->link,$data['brandName']);
        $brandDes=mysqli_real_escape_string($this->db->link,$data['brandDes']);
        // $id=mysqli_real_escape_string($this->db->link,$data['catId']);

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        // $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image="upload/".$file_name;

        if($brandName=="" || $brandName==""){
            $alert= "<span class='error'> Thương hiệu không được để trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu chọn ảnh
                if(in_array($file_ext,$premited)===false){
                    $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_tmp,$upload_image);
                $query="UPDATE brand SET BrandName='$brandName',Logo='$file_name',BrandDesc='$brandDes' WHERE BrandID = '$id'";
            }else{
                //neu khong chon anh
                $query="UPDATE brand SET BrandName='$brandName',BrandDesc='$brandDes' WHERE BrandID = '$id'";
            }
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='success'> Sửa thương hiệu thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Sửa thương hiệu không thành công </span>";
                return $alert;
            }
        }
    }
    public function del_brand($id){
        $query="DELETE FROM brand WHERE BrandID='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='success'> Xóa thương hiệu thành công </span>";
            return $alert;
        }else{
            $alert="<span class='error'> Xóa thương hiệu không thành công </span>";
            return $alert;
        }
    }
    public function getBrandbyID($id){
        $query="SELECT * FROM brand WHERE BrandID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
}

?>