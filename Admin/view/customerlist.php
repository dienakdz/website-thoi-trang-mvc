<?php include 'sidebar.php'; ?>
<?php include_once 'lib/format.php'?>

<?php
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $delcus=$cus->del_cus($id);
}
?>

    <div class="container">
        <div class="box row">
            <h4 class="header_h4">Danh sách khách hàng</h4>
            <?php 
            if(isset($delcus))
                echo $delcus;
            ?>
            <div class="table-responsive">
            <table class="table table-striped">
                    <thead>
                    <tr>
                            <th>Mã KH</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show = $cus->show_customer();
                            if($show){
                                while($result=$show->fetch_assoc()){
                                
                            
                        ?>
                        <tr class="list">
                            <td><?php echo $result['CustomerID'];?></td>
                            <td><?php echo $result['Fullname']; ?></td>
                            <td>
                            <?php if($result['Gender']==1){
                                echo "Nam";
                            }elseif($result['Gender']==0){
                                echo "Nữ";
                            }else{
                                echo "GT khác";
                            } ?>
                            </td>
                            <td><?php echo $result['Email']; ?></td>
                            <td><?php echo $result['Address']; ?></td>
                            <td><?php echo $result['Phonenumber']; ?></td>
                            <td><?php echo $result['Username']; ?></td>
                            <td><?php $fm= new Format();
                            echo $fm->textShorten($result['Password'],10); ?></td>
                            <td style="width: 50px;"><button type="button" class="btn btn-danger"
                            onclick="return confirm('Bạn có muốn xóa không'), window.location.href='?act_admin=customerlist&delid=<?php echo $result['CustomerID']; ?>'">Xóa</button></td>
                        </tr>
                        <?php 
                        }}
                        ?>
                    </tbody>
            </table>
            <?php 
                $show_all=$cus->show_all_customer();
                $count= mysqli_num_rows($show_all);
                $page_button=ceil($count/10);
                ?>
            <ul class="pagination modal-1">
                <li><a href="#" class="prev">&laquo</a></li>
                <li>
                    <?php
                    $i=1;
                    for($i=1;$i<=$page_button;$i++){
                    ?>
                    <a href="?act_admin=customerlist&trang=<?php echo $i ?>" class="<?php 
                    if(!isset($_GET['trang'])){
                        echo (isset($_GET['customerlist']))?"active":""; 
                    }else{
                    echo (basename($_GET['trang'])=="$i")?"active":""; }  ?>">
                    <?php echo $i ?>
                    </a>
                    <?php }?>
                </li>
                <li><a href="#" class="next">&raquo;</a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>

    <!-- END MAIN CONTENT -->
<?php include 'footer.php'; ?>
