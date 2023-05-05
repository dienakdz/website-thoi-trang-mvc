<?php 
include 'lib/session.php';
Session::checkSession();
?>
<?php include 'model/adminprofile.php';?>
<?php 
$profie = new Adminprofile();
$id=Session::get('AdminID');
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $update_profile=$profie->update_admin($_POST,$_FILES,$id);
}
?>
<?php
include 'sidebar.php';
?>
        <div class="container">
            <?php
            $get_profile_id= $profie->getProfilebyID($id);
            if($get_profile_id){
                while($result=$get_profile_id->fetch_assoc()){
            
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row row-auto">
                <div class="col-sm-3">
                    <div class="form-group">
                        <img src="upload/<?php echo $result['AdminImg']; ?>" alt="">
                    </div>
                        <div class="form-group row">
                            <label>Tải ảnh lên </label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                </div>
                <div class="col-sm-9">
                    <h2 align='center'>Thông tin cá nhân</h2>
                    <div class="form-group row ">
                        <label class="col-sm-auto col-form-label">Họ và tên &emsp;</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="<?php echo $result['AdminName']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Giới tính &emsp;&ensp;</label>
                        <div class="col-sm-10">
                        <?php 
                        function checked($value,$compare){
                            if($value==$compare){
                                $rs='checked="checked"';
                            }else{
                                $rs='';
                            }
                            return $rs;
                        }
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio" <?php echo  checked($result['AdminGender'],1);?> id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio" <?php echo checked($result['AdminGender'],0);?> id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ngày sinh &emsp;</label>
                        <div class="col-sm-auto">
                            <div class="input-group date" id="datepicker">
                                <input type="text" name="brithday" class="form-control" value="<?php echo $result['AdminBrithday']; ?>">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class='bx bx-calendar'></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Địa chỉ &emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ" 
                            value="<?php echo $result['AdminAddress']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phonenumber" placeholder="Số điện thoại"
                            value="<?php echo $result['AdminPhone']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-auto col-form-label">Email&emsp;&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                            value="<?php echo $result['AdminEmail']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên tài khoản</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="useradmin" placeholder="Tên tài khoản"
                            value="<?php echo $result['AdminUser']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-auto col-form-label">Mật khẩu&emsp;&ensp;&nbsp;</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu"
                            value="<?php echo $result['AdminPass']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label class="col-sm-2 col-form-label"></label>
                        </div>
                        <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php }} ?>
            </div>
    </div>
    <!-- END MAIN CONTENT -->
<?php include 'footer.php'; ?>