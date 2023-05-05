<?php include 'sidebar.php'; ?>
<?php
if(isset($_GET['catId']) || $_GET['catId']!=NULL){
    $id=$_GET['catId'];
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $update_Cat=$cat->update_category($_POST,$_FILES,$id);
}
?>

    <div class="container">
        <div class="box row">
        <?php
        $get_cat_id=$cat->getCatbyID($id);
            if($get_cat_id){
                while($result=$get_cat_id->fetch_assoc()){

        ?>
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h3 class="header_h3">Sửa danh mục</h3>
                    <?php
                    if(isset($update_Cat)){
                        echo $update_Cat;
                    }
                    ?>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tên danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['CategoryName'] ?>" class="form-control" name='catName'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Ảnh danh mục</label>
                        <div class="col-sm-10">
                        <img src="upload/<?php echo $result['Picture']; ?>" alt="" width="300px" height="200px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Chọn ảnh&emsp;&emsp;</label>
                        <div class="col-sm-10">
                        <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Mô tả  &nbsp;&emsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <textarea name="catDes" id="editor" cols=100% rows=12><?php echo $result['Description']; ?></textarea>
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