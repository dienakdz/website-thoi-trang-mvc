<?php include 'sidebar.php'; ?>
<?php 
if(isset($_GET['brandID']) || $_GET['brandID']!=NULL){
    $id=$_GET['brandID'];
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $update_brand=$brand->update_brand($_POST,$_FILES,$id);
}
?>

    <div class="container">
        <div class="box row">
        <?php
        $get_brand_id=$brand->getBrandbyID($id);
            if($get_brand_id){
                while($result=$get_brand_id->fetch_assoc()){

        ?>
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h4 class="header_h4">Sửa danh mục</h4>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                        <?php 
                            if(isset($update_brand))
                                echo $update_brand;
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên thương hiệu&ensp;</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['BrandName'] ?>" class="form-control" name='brandName'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Logo thương hiệu</label>
                        <div class="col-sm-10">
                        <img src="upload/<?php echo $result['Logo']; ?>" alt="" width="300px" height="200px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Chọn ảnh&emsp;&emsp;&nbsp;&emsp;</label>
                        <div class="col-sm-10">
                        <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Mô tả&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <textarea name="brandDes" id="editor" cols=100% rows=12><?php echo $result['BrandDesc']; ?></textarea>
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