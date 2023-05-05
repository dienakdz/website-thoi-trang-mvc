<?php include 'sidebar.php'; ?>
<?php include_once 'lib/format.php'?>

<?php
if(isset($_GET['confirmid'])){
    $id=$_GET['confirmid'];
    $status=$_GET['status'];
    if($status=="0")
    $confirmorder=$order->confirm_order($id);
    else{
    $confirmorder=$order->confirm2_order($id);
    }
    
}
?>
    <div class="container">
        <div class="box row">
            <h4 class="header_h4">Danh sách đơn hàng</h4>
            <div class="table-responsive">
            <table id="example" class="table table-striped">
                    <thead>
                    <tr>
                            <th>Mã Đơn hàng</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Hình thức TT</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Tổng tiền</th>
                            <th>Mã KH</th>
                            <th>Tình trạng</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show = $order->show_order();
                            if($show){
                                while($result=$show->fetch_assoc()){
                        ?>
                        <tr class="list">
                            <td><?php echo $result['OrderID'];?></td>
                            <td><?php echo $result['Fulname']; ?></td>
                            <td><?php echo $result['Phonenumber']; ?></td>
                            <td><?php $fm= new Format();
                            echo $fm->textShorten($result['Address'],30); ?></td>
                            <td><?php echo $result['Shippingtype']; ?></td>
                            <td><?php echo $result['OrderDate']; ?></td>
                            <td><?php echo $result['Totalprice']; ?></td>
                            <td><?php echo $result['CustomerID']; ?></td>
                            <td style="width:50px">                                
                                <?php
                                if($result['Status']=="0"){?>
                                    <button type="button" class="btn btn-primary order-status order-confirm" onclick="window.location.href='?act_admin=orderlist&confirmid=<?php echo $result['OrderID'];?>&status=<?php echo $result['Status']; ?>'">Xác nhận</button>
                                <?php }elseif($result['Status']=="1"){?>
                                    <button type="button" class="btn btn-primary order-status order-ready" onclick="window.location.href='?act_admin=orderlist&confirmid=<?php echo $result['OrderID'];?>&status=<?php echo $result['Status']; ?>'">Gửi hàng</button>
                                <?php }else{ ?>
                                    <span class="order-status order-shipped">Đang giao </span>
                                <?php }?>
                                
                            </td>
                            <td style="width: 50px;"> <button type="button" onclick="window.location.href='?act_admin=orderdetails&orderID=<?php echo $result['OrderID'];?>'" class="btn btn-primary order-status order-ready">Chi tiết</button></td>
                        </tr>
                        <?php 
                        }}
                        ?>
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>

    <!-- END MAIN CONTENT -->
<?php include 'footer.php'; ?>
<script>
$(document).ready(function() {
    $('#example').DataTable({});
})
</script>