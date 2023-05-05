<?php include 'sidebar.php'; ?>
<?php include_once 'lib/format.php'?>
<?php 
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $insertCat=$cat->insert_category($_POST,$_FILES);
}
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $delcat=$cat->del_cat($id);
}
?>

    <div class="container">
        <div class="box row">
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h4 class="header_h4">Thêm danh mục sản phẩm</h4>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                        <?php 
                            if(isset($insertCat))
                                echo $insertCat;
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='catName'  placeholder="Nhập danh mục sản phẩm cần thêm...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ảnh danh mục</label>
                        <div class="col-sm-10">
                        <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Mô tả &emsp;&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <textarea name="catDes" id="editor" cols=100% rows=12></textarea>
                            <script>
                                    ClassicEditor
                                            .create( document.querySelector( '#editor' ) )
                                            .then( editor => {
                                                    console.log( editor );
                                            } )
                                            .catch( error => {
                                                    console.error( error );
                                            } );
                            </script>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                        <input type="submit" name='submit' class="btn btn-primary" value="Thêm">
                        </div>
                    </div>
            </div>
        </form>
        </div>
        <div class="box row" style="overflow: auto;">
            <h4 class="header_h4">Danh sách danh mục</h4>
            <?php 
            if(isset($delcat))
                echo $delcat;
            ?>
            <div class="table-responsive">          
            <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show = $cat->show_category();
                            if($show){
                                $i=0;
                                while($result=$show->fetch_assoc()){
                                    $i++;
                            
                        ?>
                        <tr class="list">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['CategoryName']; ?></td>
                            <td> <img src="upload/<?php echo $result['Picture']; ?>" alt=""> </td>
                            <td><?php $fm= new Format();
                            echo $fm->textShorten($result['Description'],30); ?></td>
                            <td style="width: 50px;"> <button type="button" onclick="window.location.href='?act_admin=editcategory&catId=<?php echo $result['CategoryID'];?>'" class="btn btn-primary">Sửa</button></td>
                            <td style="width: 50px;"><button type="button" class="btn btn-danger"
                            onclick="return confirm('Bạn có muốn xóa không'), window.location.href='?act_admin=admincategory&delid=<?php echo $result['CategoryID']; ?>'">Xóa</button></td>
                        </tr>
                        <?php 
                        }}
                        ?>
                    </tbody>
            </table>
            <?php 
                $show_all=$cat->show_all_category();
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
                    <a href="?act_admin=admincategory&trang=<?php echo $i ?>" class="<?php 
                    if(!isset($_GET['trang'])){
                        echo (isset($_GET['admincategory']))?"active":""; 
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
<script>
$(document).ready(function() {
    $('#example').DataTable({});
})
</script>