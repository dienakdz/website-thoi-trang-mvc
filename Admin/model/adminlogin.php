<?php 
include 'lib/session.php';
Session::checkLogin();
include_once 'lib/database.php';
include 'lib/format.php';
?>
<?php 
class Adminlogin
{
    private $db;
    private $fm;
    function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function login_admin($adminUser,$adminPass){
        $adminUser=$this->fm->validation($adminUser);
        $adminPass=$this->fm->validation($adminPass);

        $adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass=mysqli_real_escape_string($this->db->link,$adminPass);

        if(empty($adminUser) || empty($adminPass)){
            $alert= "Username or Password must be not empty";
            return $alert;
        }else{
            $query="SELECT * FROM admin WHERE AdminUser='$adminUser' AND AdminPass='$adminPass'";
            $result=$this->db->select($query);
            if($result !=false){
                $value=$result->fetch_assoc();
                Session::set('adminlogin', true);
                Session::set('AdminID',$value['AdminID']);
                Session::set('AdminName',$value['AdminName']);
                Session::set('AdminGender',$value['AdminGender']);
                Session::set('AdminBrithday',$value['AdminBrithday']);
                Session::set('AdminAddress',$value['AdminAddress']);
                Session::set('AdminPhone',$value['AdminPhone']);
                Session::set('AdminEmail',$value['AdminEmail']);
                Session::set('AdminUser',$value['AdminUser']);
                Session::set('AdminPass',$value['AdminPass']);
                Session::set('AdminImg',$value['AdminImg']);
                header('Location: ?act_admin=admin');
            }else{
                $alert="Username or Password not match";
                return $alert;
            }
        }
    }
    public function update_admin($data,$file,$id){
        $fullname=mysqli_real_escape_string($this->db->link,$data['fullname']);
        $gender=mysqli_real_escape_string($this->db->link,$data['gender']);
        $brithday=mysqli_real_escape_string($this->db->link,$data['brithday']);
        $address=mysqli_real_escape_string($this->db->link,$data['address']);
        $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $username=mysqli_real_escape_string($this->db->link,$data['username']);
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
                AdminEmail='$email',AdminUser='$username',AdminPass='$pass' WHERE AdminID='$id'";
            }else{
                //neu khong chon anh
                $query="UPDATE admin SET AdminName='$fullname',AdminGender='$gender',AdminBrithday='$brithday',AdminAddress='$address',AdminPhone='$phone',
                AdminEmail='$email',AdminUser='$username',AdminPass='$pass',AdminImg='$file_name' WHERE AdminID='$id'";
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
}

?>