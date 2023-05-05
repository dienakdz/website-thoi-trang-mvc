<?php 
include_once 'lib/database.php';
?>
<?php 
class Adminprofile
{
    private $db;
    function __construct()
    {
        $this->db=new Database();
    }
    public function update_admin($data,$file,$id){
        $fullname=mysqli_real_escape_string($this->db->link,$data['fullname']);
        $gender=mysqli_real_escape_string($this->db->link,$data['gender']);
        $brithday=mysqli_real_escape_string($this->db->link,$data['brithday']);
        $address=mysqli_real_escape_string($this->db->link,$data['address']);
        $phone=mysqli_real_escape_string($this->db->link,$data['phonenumber']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $username=mysqli_real_escape_string($this->db->link,$data['useradmin']);
        $pass=mysqli_real_escape_string($this->db->link,$data['password']);

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];


        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $upload_image="upload/".$file_name;
        if($fullname=="" || $gender=="" || $brithday=="" || $address=="" || $phone==""|| $email=="" || $username=="" || $pass==""){
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
                $query="UPDATE admin SET AdminName='$fullname',AdminGender='$gender',AdminBrithday='$brithday',AdminAddress='$address',AdminPhone='$phone',
                AdminEmail='$email',AdminUser='$username',AdminPass='$pass',AdminImg='$file_name' WHERE AdminID='$id'";
            }else{
                //neu khong chon anh
                $query="UPDATE admin SET AdminName='$fullname',AdminGender='$gender',AdminBrithday='$brithday',AdminAddress='$address',AdminPhone='$phone',
                AdminEmail='$email',AdminUser='$username',AdminPass='$pass' WHERE AdminID='$id'";
                }
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='success'> Thay đổi thông tin thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Thay đổi thông tin không thành công </span>";
                return $alert;
            }
        }
    }
    public function insert_admin($data,$file){
        $fullname=mysqli_real_escape_string($this->db->link,$data['fullname']);
        $gender=mysqli_real_escape_string($this->db->link,$data['gender']);
        $brithday=mysqli_real_escape_string($this->db->link,$data['brithday']);
        $address=mysqli_real_escape_string($this->db->link,$data['address']);
        $phone=mysqli_real_escape_string($this->db->link,$data['phonenumber']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $username=mysqli_real_escape_string($this->db->link,$data['useradmin']);
        $pass=mysqli_real_escape_string($this->db->link,$data['password']);

        $premited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];


        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $upload_image="upload/".$file_name;
        if($fullname=="" || $gender=="" || $brithday=="" || $address=="" || $phone==""|| $email=="" || $username=="" || $pass=="" || $file_name==""){
            $alert= "<span class='error'> Thương hiệu không được để trống</span>";
            return $alert;
        if(in_array($file_ext,$premited)===false){
            $alert="<span class='error'>Bạn chỉ có thể tải lên:".implode(', ',$premited)."</span>";
            return $alert;
        }
        }else{
            move_uploaded_file($file_tmp,$upload_image);
            $query="INSERT INTO admin(AdminName,AdminGender,AdminBrithday,AdminAddress,AdminPhone,AdminEmail,AdminUser,AdminPass,AdminImg)
            VALUES('$fullname','$gender','$brithday','$address','$phone','$email','$username','$pass','$file_name')";
            $result=$this->db->insert($query);
            if($result){
                $alert="<span class='success'> Thêm thành công </span>";
                return $alert;
            }else{
                $alert="<span class='error'> Thêm không thành công </span>";
                return $alert;
            }
        }
    }
    public function show_profile(){
        $query="SELECT * FROM admin order by AdminID desc";
        $result=$this->db->select($query);
        return $result;
    }
    public function getProfilebyID($id){
        $query="SELECT * FROM admin WHERE AdminID='$id'";
        $result=$this->db->select($query);
        return $result;
    }
}

?>