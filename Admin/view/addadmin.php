<?php include 'sidebar.php';?>
<?php include 'model/adminprofile.php';
$insert=new Adminprofile();
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $insertad=$insert->insert_admin($_POST,$_FILES);
}
?>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <h2 align='center'>Nhập thông tin cá nhân</h2>
                    <?php 
                            if(isset($insertad))
                                echo $insertad;
                    ?>
                    <div class="form-group row ">
                        <label class="col-sm-auto col-form-label">Họ và tên &emsp;</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Giới tính &emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio"  id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ngày sinh &emsp;</label>
                        <div class="col-sm-auto">
                            <div class="input-group date" id="datepicker">
                                <input type="text" name="brithday" class="form-control" value="">
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
                            value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Ảnh đại diện &nbsp;</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phonenumber" placeholder="Số điện thoại"
                            value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-auto col-form-label">Email&emsp;&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                            value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên tài khoản</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="useradmin" placeholder="Tên tài khoản"
                            value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-auto col-form-label">Mật khẩu&emsp;&ensp;&nbsp;</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu"
                            value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-auto">
                            <label class="col-sm-2 col-form-label">&emsp;&ensp;&emsp;&emsp;&ensp;</label>
                        </div>
                        <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
    </div>
    <!-- END MAIN CONTENT -->
<?php include 'footer.php'; ?>