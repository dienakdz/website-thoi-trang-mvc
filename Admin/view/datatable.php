<?php include 'sidebar.php'; ?>
<div class="container">
<div class="box row" style="overflow: auto;">
<div class="table-responsive">          
                <table id="example" class="table table-striped">
                    <thead>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Chỉnh sưa</th>
                    </thead>
                    <tbody>
                    <?php 
                            $show = $cat->show_category();
                            if($show){
                                $i=0;
                                while($result=$show->fetch_assoc()){
                                    $i++;
                            
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['CategoryName']; ?></td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <?php 
                        }}
                        ?>
                    </tbody>
                </table>
</div>
</div>
</div>
<?php include 'footer.php'?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({});
    })
</script>