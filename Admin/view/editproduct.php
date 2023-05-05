<?php include 'sidebar.php'; ?>
<?php 
if(isset($_GET['proId']) || $_GET['proId']!=NULL){
    $id=$_GET['proId'];
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $update_product=$pro->update_product($_POST,$_FILES,$id);
}
?>

    <div class="container">
        <div class="box row">
        <?php
        $get_pro_id=$pro->getProbyID($id);
            if($get_pro_id){
                while($result_pro=$get_pro_id->fetch_assoc()){

        ?>
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h4 class="header_h4">Sửa sản phẩm</h4>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                        <?php 
                            if(isset($update_product))
                                echo $update_product;
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='productname' value="<?php echo $result_pro['ProductName']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Danh mục &emsp;&ensp;</label>
                        <div class="col-sm-auto">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option selected>Chọn danh mục</option>
                                <?php 
                                $catlist=$cat->show_category();
                                if($catlist){
                                    while($result_cat=$catlist->fetch_assoc()){
                                ?>
                                <option 
                                <?php
                                if($result_cat['CategoryID']==$result_pro['CategoryID']){ echo 'selected';}
                                ?>
                                value="<?php echo $result_cat['CategoryID']; ?>"><?php echo $result_cat['CategoryName']; ?></option>
                                <?php }}?>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Thương hiệu&ensp;&nbsp;</label>
                        <div class="col-sm-auto">
                        <select class="form-select" name="brand" aria-label="Default select example">
                                <option selected>Chọn thương hiệu</option>
                                <?php 
                                $brandlist=$brand->show_brand();
                                if($brandlist){
                                    while($result_bra=$brandlist->fetch_assoc()){
                                ?>
                                <option
                                <?php
                                if($result_bra['BrandID']==$result_pro['BrandID']){ echo 'selected';}
                                ?>
                                value="<?php echo $result_bra['BrandID']; ?>"><?php echo $result_bra['BrandName']; ?></option>
                                <?php }}?>
                        </select>               
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Số lượng&emsp;&emsp;&nbsp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='quantity' value="<?php echo $result_pro['Quantity']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ảnh sản phẩm 1</label>
                        <div class="col-sm-10">
                        <img src="upload/<?php echo $result_pro['Picture']; ?>" alt="" width="300px" height="200px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ảnh sản phẩm 2</label>
                        <div class="col-sm-10">
                        <img src="upload/<?php echo $result_pro['Picture2']; ?>" alt="" width="300px" height="200px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Chọn ảnh 1&emsp;&emsp;</label>
                        <div class="col-sm-10">
                        <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Chọn ảnh 2&emsp;&emsp;</label>
                        <div class="col-sm-10">
                        <input type="file" name='image2' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Mô tả&emsp;&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <textarea name="productDesc" id="editor" cols=100% rows=12><?php echo $result_pro['ProductDesc']; ?></textarea>
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
                        <label class="col-sm-auto col-form-label">Trạng thái&emsp;&ensp;</label>
                        <div class="col-sm-auto">
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option selected>Chọn trạng thái</option>
                                <?php 
                                if($result_pro['ProductStatus']==0){
                                ?>
                                <option value="1">Mới</option>
                                <option value="2">Nổi bật</option>
                                <option value="3">Giảm giá</option>
                                
                                <?php 
                                }else{
                                ?>
                                <option  value="1">Mới</option>
                                <option  value="2">Nổi bật</option>
                                <option  value="3">Giảm giá</option>
                                <?php } ?>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Giá sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='price'  value="<?php echo $result_pro['Price']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-auto">
                        <input type="submit" name='submit' class="btn btn-primary" value="Sửa">
                        </div>
                    </div>
            </div>
        </form>
        <?php }}?>
        </div>
        
    </div>
    </div>
    <!-- END MAIN CONTENT -->
    <?php include 'footer.php'; ?>