<?php
include_once 'lib/database.php';
?>
<?php
class product
{
    private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function insert_product($data,$files){
        $productname=mysqli_real_escape_string($this->db->link,$data['productname']);
        $categoryID=mysqli_real_escape_string($this->db->link,$data['category']);
        $brandID=mysqli_real_escape_string($this->db->link,$data['brand']);
        $quantity=mysqli_real_escape_string($this->db->link,$data['quantity']);
        $proDesc=mysqli_real_escape_string($this->db->link,$data['productDesc']);
        $status=mysqli_real_escape_string($this->db->link,$data['status']);
        $price=mysqli_real_escape_string($this->db->link,$data['price']);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date=date("H:i d-m-Y");

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $file_name2=$_FILES['image2']['name'];
        $file_size2=$_FILES['image2']['size'];
        $file_tmp2=$_FILES['image2']['tmp_name'];


        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        // $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image="upload/".$file_name;
        $upload_image2="upload/".$file_name2;

        if($productname=="" || $categoryID==""||$file_name==""|| $brandID==""||$quantity==""||$status==""||$price==""||$proDesc==""){
            $alert= "<span class='error'> Sản phẩm không được để trống</span>";
            return $alert;
        }elseif(in_array($file_ext,$premited)===false){
            $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
            return $alert;
        }
        else{
            move_uploaded_file($file_tmp,$upload_image);
            move_uploaded_file($file_tmp2,$upload_image2);
            $query="INSERT INTO product(ProductName,CategoryID,BrandID,ProductDesc,Price,Quantity,ProductStatusID,Picture,Picture2,UpdateDate) 
            VALUES('$productname','$categoryID','$brandID','$proDesc','$price','$quantity','$status','$file_name',
            '$file_name2','$date')";
            $result=$this->db->insert($query);
            if($result){
                $alert="<span class='success'> Thêm sản phẩm thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Thêm sản phẩm không thành công </span>";
                return $alert;
            }
        }
    }
    public function show_product(){
        // $pro_one_page=10;
        // if(!isset($_GET['trang'])){
        //     $trang=1;
        // }else{
        //     $trang=$_GET['trang'];
        // }
        // $one_page=($trang-1)*$pro_one_page;
        $query="SELECT product.*,categories.CategoryName,brand.BrandName,productstatus.ProductStatusName 
        FROM product INNER JOIN categories ON product.CategoryID=categories.CategoryID
        INNER JOIN brand ON product.BrandID=brand.BrandID 
        INNER JOIN productstatus ON product.ProductStatusID = productstatus.ProductStatusID
        order by product.ProductID desc";
        $result=$this->db->select($query);
        return $result;
    }
    public function show_all_product(){
        $query="SELECT product.*,categories.CategoryName,brand.BrandName,productstatus.ProductStatusName 
        FROM product INNER JOIN categories ON product.CategoryID=categories.CategoryID
        INNER JOIN brand ON product.BrandID=brand.BrandID 
        INNER JOIN productstatus ON product.ProductStatusID = productstatus.ProductStatusID";
        $result=$this->db->select($query);
        return $result;
    }
    public function update_product($data,$files,$id){
        $productname=mysqli_real_escape_string($this->db->link,$data['productname']);
        $categoryID=mysqli_real_escape_string($this->db->link,$data['category']);
        $brandID=mysqli_real_escape_string($this->db->link,$data['brand']);
        $quantity=mysqli_real_escape_string($this->db->link,$data['quantity']);
        $proDesc=mysqli_real_escape_string($this->db->link,$data['productDesc']);
        $status=mysqli_real_escape_string($this->db->link,$data['status']);
        $price=mysqli_real_escape_string($this->db->link,$data['price']);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date=date("H:i d-m-Y");

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];

        $file_name2=$_FILES['image2']['name'];
        $file_size2=$_FILES['image2']['size'];
        $file_tmp2=$_FILES['image2']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        // $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image="upload/".$file_name;
        $upload_image2="upload/".$file_name2;

        if($productname=="" || $categoryID==""|| $brandID==""||$quantity==""||$status==""||$price==""||$proDesc==""){
            $alert= "<span class='error'> Sản phẩm không được để trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu chọn ảnh
                if(in_array($file_ext,$premited)===false){
                    $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_tmp,$upload_image);
                move_uploaded_file($file_tmp2,$upload_image2);
                $query="UPDATE product SET ProductName='$productname',CategoryID='$categoryID',BrandID='$brandID',ProductDesc='$proDesc',
                Price='$price',Quantity='$quantity',ProductStatusID ='$status',Picture='$file_name',
                Picture2='$file_name2',UpdateDate='$date' WHERE ProductID = '$id'";
            }else{
                //neu khong chon anh
                $query="UPDATE product SET ProductName='$productname',CategoryID='$categoryID',BrandID='$brandID',ProductDesc='$proDesc',
                Price='$price',Quantity='$quantity',ProductStatusID='$status',UpdateDate='$date' WHERE ProductID = '$id'";            
            }
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='success'> Sửa sản phẩm thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Sửa sản phẩm không thành công </span>";
                return $alert;
            }
        }
    }
    public function del_product($id){
        $query="DELETE FROM product WHERE ProductID='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='success'> Xóa sản phẩm thành công </span>";
            return $alert;
        }else{
            $alert="<span class='error'> Xóa sản phẩm không thành công </span>";
            return $alert;
        }
    }
    public function getProbyID($id){
        $query="SELECT * FROM product WHERE ProductID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function count_product_by_cat(){
        $query="SELECT c.CategoryID, c.CategoryName , count( p.CategoryID) AS product_count FROM categories c LEFT JOIN product p ON c.CategoryID = p.CategoryID GROUP BY c.CategoryID, c.CategoryName;";
        $result=$this->db->select($query);
        return $result;
    }
}

?>