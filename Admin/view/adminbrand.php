<?php include 'sidebar.php'; ?>
<?php include_once 'lib/format.php'?>
<?php 
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $insertBrand=$brand->insert_brand($_POST,$_FILES);
}
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $delbrand=$brand->del_brand($id);
}
?>

    <div class="container">
        <div class="box row">
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h4 class="header_h4">Thêm thương hiệu</h4>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                        <?php 
                            if(isset($insertBrand))
                                echo $insertBrand;
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên thương hiệu&ensp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='brandName'  placeholder="Nhập tên thương hiệu cần thêm...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Logo thương hiệu</label>
                        <div class="col-sm-10">
                        <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Mô tả &emsp;&emsp;&emsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <textarea name="brandDes" id="editor" cols=100% rows=12></textarea>
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
        <div class="box row">
            <h4 class="header_h4">Danh sách thương hiệu</h4>
            <?php 
            if(isset($delbrand))
                echo $delbrand;
            ?>
            <div class="table-responsive">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên thương hiệu</th>
                            <th>Logo</th>
                            <th>Mô tả</th>
                            <th colspan="2">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show = $brand->show_brand();
                            if($show){
                                $i=0;
                                while($result=$show->fetch_assoc()){
                                    $i++;
                            
                        ?>
                        <tr class="list">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['BrandName']; ?></td>
                            <td> <img src="upload/<?php echo $result['Logo']; ?>" alt=""> </td>
                            <td><?php $fm=new Format();
                            echo $fm->textShorten( $result['BrandDesc'],50);?></td>
                            <td style="width: 50px;"> <button type="button" onclick="window.location.href='?act_admin=editbrand&brandID=<?php echo $result['BrandID'];?>'" class="btn btn-primary">Sửa</button></td>
                            <td style="width: 50px;"><button type="button" class="btn btn-danger"
                            onclick="return confirm('Bạn có muốn xóa không'), window.location.href='?act_admin=adminbrand&delid=<?php echo $result['BrandID']; ?>'">Xóa</button></td>
                        </tr>
                        <?php 
                        }}
                        ?>
                    </tbody>
            </table>
            <?php 
                $show_all=$brand->show_all_brand();
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
                    <a href="?act_admin=adminbrand&trang=<?php echo $i ?>" class="<?php 
                    if(!isset($_GET['trang'])){
                        echo (isset($_GET['adminbrand']))?"active":"";                    }else{
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