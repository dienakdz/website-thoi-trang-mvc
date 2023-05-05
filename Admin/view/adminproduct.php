<?php include 'sidebar.php'; ?>
<?php include_once 'lib/format.php'?>
<?php 
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $insert_product=$pro->insert_product($_POST,$_FILES);
}
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $delpro=$pro->del_product($id);
}
?>

    <div class="container">
        <div class="box row">
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h4 class="header_h4">Thêm sản phẩm</h4>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                        <?php 
                            if(isset($insert_product))
                                echo $insert_product;
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='productname'  placeholder="Nhập danh mục sản phẩm cần thêm...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Danh mục &emsp;&ensp;</label>
                        <div class="col-sm-auto">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option selected>Chọn danh mục&emsp;&emsp;</option>
                                <?php 
                                $catlist=$cat->show_category();
                                if($catlist){
                                    while($result=$catlist->fetch_assoc()){
                                ?>
                                <option value="<?php echo $result['CategoryID']; ?>"><?php echo $result['CategoryName']; ?></option>
                                <?php }}?>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Thương hiệu &ensp;</label>
                        <div class="col-sm-auto">
                        <select class="form-select" name="brand" aria-label="Default select example">
                                <option selected>Chọn thương hiệu &emsp;</option>
                                <?php 
                                $brandlist=$brand->show_brand();
                                if($brandlist){
                                    while($result=$brandlist->fetch_assoc()){
                                ?>
                                <option value="<?php echo $result['BrandID']; ?>"><?php echo $result['BrandName']; ?></option>
                                <?php }}?>
                        </select>               
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Số lượng&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='quantity'  placeholder="Nhập số lượng sản phẩm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ảnh sản phẩm1</label>
                        <div class="col-sm-10">
                        <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ảnh sản phẩm2</label>
                        <div class="col-sm-10">
                        <input type="file" name='image2' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Mô tả&emsp;&emsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <textarea name="productDesc" id="editor" cols=100% rows=12></textarea>
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
                        <label class="col-sm-auto col-form-label">Trạng thái&emsp;&emsp;</label>
                        <div class="col-sm-auto">
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option selected>Chọn trạng thái&emsp;&emsp;</option>
                                <option  value="1">Mới</option>
                                <option  value="2">Nổi bật</option>
                                <option  value="3">Giảm giá</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Giá sản phẩm&nbsp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='price'  placeholder="Nhập giá sản phẩm">
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
            <h4 class="header_h4">Danh sách danh mục</h4>
            <?php 
            if(isset($delpro))
                echo $delpro;
            ?>
            <div class="table-responsive">
            <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th >Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Hình ảnh1</th>
                            <th>Hình ảnh2</th>
                            <th>Thời gian</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $show_pro = $pro->show_product();
                            if($show_pro){
                                $i=0;
                                while($result=$show_pro->fetch_assoc()){
                                    $i++;
                            
                        ?>
                        <tr class="list">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['ProductName']; ?></td>
                            <td><?php echo $result['CategoryName']; ?></td>
                            <td><?php echo $result['BrandName']; ?></td>
                            <td><?php $fm= new Format();
                            echo $fm->textShorten($result['ProductDesc'],30); ?></td>
                            <td><?php echo $result['Price']; ?></td>
                            <td><?php echo $result['Quantity']; ?></td>
                            <td><?php echo $result['ProductStatusName']; ?></td>
                            <td> <img src="upload/<?php echo $result['Picture']; ?>" alt=""> </td>
                            <td> <img src="upload/<?php echo $result['Picture2']; ?>" alt=""> </td>
                            <td><?php echo $result['UpdateDate']; ?></td>
                            <td style="width: 35px;"> <button type="button" onclick="window.location.href='?act_admin=editproduct&proId=<?php echo $result['ProductID'];?>'" class="btn btn-primary">Sửa</button></td>
                            <td style="width: 35px;"><button type="button" class="btn btn-danger"
                            onclick="return confirm('Bạn có muốn xóa không'), window.location.href='?act_admin=adminproduct&delid=<?php echo $result['ProductID']; ?>'">Xóa</button></td>
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