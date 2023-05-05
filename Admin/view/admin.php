<?php 
include 'lib/session.php';
Session::checkSession();
?>
<?php include 'sidebar.php'; ?>
<?php include 'lib/format.php';
    $format= new Format();
?>

    <div class="main-content">
        <div class="row">
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Tổng đơn hàng
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php $count_show_order= $order->show_all_order();
                                    $count_order=mysqli_num_rows($count_show_order);
                                    echo $count_order;
                                ?>
                            </div>
                            <i class='bx bx-shopping-bag'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Liên hệ
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php $count_show_contact= $cont->show_all_contact();
                                    $count_contact=mysqli_num_rows($count_show_contact);
                                    echo $count_contact;
                                ?>
                            </div>
                            <i class='bx bx-chat'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Tổng doanh thu
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php if($count_show_order){
                                    $total=0;
                                    while($rs=$count_show_order->fetch_assoc()){
                                        $total+=$rs['Totalprice'];
                                    }
                                    echo number_format($total,0,',','.')." "."VNĐ";
                                } ?>
                            </div>
                            <i class='bx bx-line-chart'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Khách hàng
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                <?php $show_cus=$cus->show_all_customer();
                                    $count_cus = mysqli_num_rows($show_cus);
                                    echo $count_cus;?>
                            </div>
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 col-md-6 col-sm-12">
                <!-- TOP PRODUCT -->
                <div class="box f-height">
                    <div class="box-header">
                        Sản phẩm mua nhiều nhất
                    </div>
                    <table class="table table-striped" align="center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng đã bán</th>
                                    <th>Người mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $show_top_pro=$order->top_pro_order();
                                $i=0;
                                while($res_top_pro=$show_top_pro->fetch_assoc()){
                                    $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><img  src="upload/<?php echo $res_top_pro['Picture']; ?>" style="width: 50px;height:30px"></td>
                                    <td><?php echo $res_top_pro['ProductName']; ?></td>
                                    <td><?php echo $res_top_pro['quantity']; ?></td>
                                    <td><?php echo $res_top_pro['product_count']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                </div>
                <!-- TOP PRODUCT -->
            </div>
            <div class="col-4 col-md-6 col-sm-12">
                <!-- CATEGORY CHART -->
                <div class="box f-height">
                    <div class="box-body">
                        <div id="category-chart"></div>
                    </div>
                </div>
                <!-- END CATEGORY CHART -->
            </div>
            <div class="col-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                    <div class="box-header">
                        Những đơn đặt hàng gần đây
                    </div>
                    <div class="box-body overflow-scroll">
                        <table class="table table-striped" align="center">
                            <thead>
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $show_order=$order->show_order_new();
                                if($show_order){
                                    while($result=$show_order->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $result['OrderID']; ?></td>
                                    <td>
                                        <div class="order-owner">
                                            <span><?php echo $result['Fulname']; ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $result['OrderDate']; ?></td>
                                    <!-- <td>
                                        <span class="order-status order-ready">
                                            Ready
                                        </span>
                                    </td> -->
                                    <td>
                                        
                                        <?php if($result['Status']=="0"){?>
                                            <span class="order-status order-confirm">Chưa xác nhận</span>                                        
                                        <?php }elseif($result['Status']=="1"){ ?>
                                            <span class="order-status order-ready">Đang vận chuyển</span>
                                        <?php }elseif($result['Status']=="2"){ ?>
                                            <span class="order-status order-shipped">Đang giao</span>
                                        <?php }?>
                                        
                                    </td>
                                    <td><?php echo $result['Totalprice']; ?></td>
                                </tr>
                                <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <?php 
                    $show_cat=$cat->show_all_category();
                    $data1='';
                    while($ress=$show_cat->fetch_assoc()){
                        $data1=$data1.'"'.$ress['CategoryName'].'",';
                    }
                    $data1=trim($data1,",");
                    ?>
                    <?php 
                    $show_pro_by_cat=$pro->count_product_by_cat();
                    $data2='';
                    while($count_pro_by_cat=$show_pro_by_cat->fetch_assoc()){
                        $data2=$data2.$count_pro_by_cat['product_count'].',';
                    }
                    $data2=trim($data2);
                    // $m=trim($m,",");
                    ?>
                </div>
                <!-- END ORDERS TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
<?php include 'footer.php'; ?>
<script>
    let category_options = {
    series: [<?php echo $data2; ?>],
    labels: [<?php echo $data1; ?>],
    chart: {
        type: 'donut',
    },
    colors: ['#6ab04c', '#2980b9', '#f39c12', '#d35400',"#a44f54"]
}
let category_chart = new ApexCharts(document.querySelector("#category-chart"), category_options)
category_chart.render()
// let customer_options = {
//     series: [{
//         name: "Store Customers",
//         data: [40, 70, 20, 90, 36, 80, 30, 91, 60]
//     },{
//         name: "Online Customers",
//         data: [20, 30, 10, 20, 16, 40, 20, 51, 10]
//     }],
//     colors: ['#6ab04c', '#2980b9'],
//     chart: {
//         height: 350,
//         type: 'line',
//     },
//     dataLabels: {
//         enabled: false
//     },
//     stroke: {
//         curve: 'smooth'
//     },
//     xaxis: {
//         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
//     },
//     legend: {
//         position: 'top'
//     }
// }
// let customer_chart = new ApexCharts(document.querySelector("#customer-chart"), customer_options)
// customer_chart.render()

setDarkChart = (dark) => {
    let theme = {
        theme: {
            mode: dark ? 'dark' : 'light'
        }
    }

    // customer_chart.updateOptions(theme)
    category_chart.updateOptions(theme)
} 
</script>