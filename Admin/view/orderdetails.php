<?php
include 'sidebar.php';
?>
<?php
if(isset($_GET['orderID']) || $_GET['orderID']!=NULL){
    $id=$_GET['orderID'];
}
?>

        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row row-auto">
            <div class="col-sm-2">
                    <div class="form-group">
                        <img style="width: 150px;" src="upload/logofastion.png" alt="">
                    </div>
            </div>
            <div class="col-sm-10">
                <h3>Cửa hàng thời trang trực tuyến TVD Fashion</h3>
                <span>Địa chỉ: 470 Trần Đại Nghĩa, phường Hòa Hải, quận Ngũ Hành Sơn, Đà Nẵng</span>
                <p>Số điện thoại: 0373377580</p>
            </div>
            </div>
            <div class="row row-auto">
                <h4 align="center">CHI TIẾT HÓA ĐƠN</h4>
            </div>
            <?php
            $get_order_id=$order->order_details_by_id($id);
            if($get_order_id){
                $result=$get_order_id->fetch_assoc();
            ?>
                <div class="row row-auto">
                <div class="form-group row ">
                        <label class="col-sm-auto col-form-label">Mã hóa đơn: &nbsp;</label>
                        <div class="col-md-10">
                            <span><?php echo $result['OrderID']; ?></span>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-sm-auto col-form-label">Họ và tên KH:</label>
                        <div class="col-md-10">
                            <span><?php echo $result['Fulname']; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Số điện thoại:</label>
                        <div class="col-sm-auto">
                            <span><?php echo $result['Phonenumber']; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Địa chỉ: &emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <?php echo $result['Address']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Hình thức TT:</label>
                        <div class="col-sm-10">
                            <?php echo $result['Shippingtype']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Loại địa chỉ: &ensp;</label>
                        <div class="col-sm-10">
                            <?php echo $result['Typeaddress']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-auto col-form-label">Thời gian:&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <?php echo $result['OrderDate']; ?>
                        </div>
                    </div>
            </div>
            </form>
            <div class="row">
            <h4 class="header_h4">Chi tiết sản phẩm</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                    <thead>
                    <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $detailproduct=$order->order_details_by_id($id);
                        while($res=$detailproduct->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $res['ProductID']; ?></td>
                            <td><?php echo $res['ProductName']; ?></td>
                            <td><?php echo $res['QuantityOrdered']; ?></td>
                            <td><?php echo $res['Price']; ?></td>
                            <td><?php echo $res['Price']*$res['QuantityOrdered']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
            </div>
            <div class="form-total-checkout">
                <div class="total__checkout checkout__item__name ">Phí vận chuyển</div>
                <div class="total__checkout checkout__item__price ">₫32.800</div>
                <div class="total__checkout checkout__item__name ">Tổng thanh toán:</div>
                <div class="total__checkout price-checkout checkout__item__price" name="total-order"><?php echo $result['Totalprice']; ?> VNĐ</div>
            </div>
        </div>
            </div>
            <?php }?>

    </div>
    <!-- END MAIN CONTENT -->
<?php include 'footer.php'; ?>