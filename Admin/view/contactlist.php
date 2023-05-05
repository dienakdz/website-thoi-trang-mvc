<?php include 'sidebar.php'; ?>
<?php
if(isset($_GET['repcontactid'])){
    $id=$_GET['repcontactid'];
    $status=$_GET['status'];
    if($status=="0")
    $repcontact=$cont->rep_contact($id);
    
}
?>

    <div class="container">
        <div class="box row">
            <?php 
            // if(isset($delbrand))
            //     echo $delbrand;
            ?>
            <div class="table-responsive">
            <table id="example" class="table table-striped">
                    <thead>
                    <tr>
                            <th>Mã</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th>Phản hồi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show = $cont->show_contact();
                            if($show){
                                while($result=$show->fetch_assoc()){
                        ?>
                        <tr class="list">
                            <td><?php echo $result['ContactID'];?></td>
                            <td><?php echo $result['FullName']; ?></td>
                            <td><?php echo $result['Email']; ?></td>
                            <td><?php echo $result['Title']; ?></td>
                            <td><?php echo $result['Content']; ?></td>
                            <td><?php echo $result['ContactDate']; ?></td>
                            <td style="width:50px">
                            
                            <?php if($result['Status']=="0"){ ?>
                                <button type="button" class="btn btn-primary order-status order-ready" onclick="window.location.href='?act_admin=replycontact&contID=<?php echo $result['ContactID'] ?>'">
                                Phản hồi</button>
                            <?php }else{?>
                                <span class="order-status order-shipped">Đã phản hồi </span>
                            <?php }
                            ?>
                            </td>
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
