   <!-- MAIN CONTENT -->
    <div class="main " style="margin-bottom:3%">
        <div class="container">
            <form action="?act=taikhoan&xuli=update" method="post" enctype="multipart/form-data">
                <div class="row row-auto">
                <div class="col-sm-3">
 
                </div>
                <div class="col-sm-9">
                    <h2 align='center'>Thông tin cá nhân</h2>
                    <div class="container" style="color:  #83b735;">
                        <?php if (isset($_COOKIE['thaydoitt'])) {
                            echo $_COOKIE['thaydoitt'];
                         } ?>
                    </div>
                    <div class="container" style="color:  red;">
                        <?php if (isset($_COOKIE['thaydoitt1'])) {
                            echo $_COOKIE['thaydoitt1'];
                         } ?>
                    </div>
                    
                    <div class="form-group row ">
                        <label class="col-sm-auto  col-md-2 col-form-label">Họ và tên * &emsp;</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control margin_row" name="fullname" placeholder="Họ và tên" value="<?= $data['Fullname'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-md-2 col-form-label">Giới tính &emsp;&ensp;</label>
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
                                <input class="form-check-input " name="gender" type="radio" <?php echo  checked($data['Gender'],1);?> id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " name="gender" type="radio" <?php echo  checked($data['Gender'],0);?>  id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Nữ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " name="gender" type="radio" <?php echo  checked($data['Gender'],3);?>  id="inlineRadio2" value="3">
                                <label class="form-check-label" for="inlineRadio2">Giới tính khác</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-sm-auto col-md-2 col-form-label">Số điện thoại *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control margin_row" name="phonenumber" placeholder="Số điện thoại"
                            value="<?= $data['Phonenumber'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-auto col-md-2 col-form-label">Email&emsp;&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10 ">
                            <input type="email" class="form-control margin_row" name="email" placeholder="Email"
                            value="<?= $data['Email'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-md-2 col-form-label">Địa chỉ &emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control margin_row" name="address" placeholder="Địa chỉ" 
                            value="<?= $data['Address'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-md-2 col-form-label">Tên tài khoản *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control margin_row" name="user_change" placeholder="Tên tài khoản"
                            value="<?= $data['Username'] ?>">
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-auto col-md-2 col-form-label">Mật khẩu *&emsp;&ensp;&nbsp;</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control margin_row" name="password_change" placeholder="Mật khẩu"
                            value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label class="col-sm-2 col-form-label"></label>
                        </div>
                        <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn_ttkh btn-primary">Thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            </div>
    </div>
    <!-- END MAIN CONTENT -->
