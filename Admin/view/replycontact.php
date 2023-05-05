<?php include 'sidebar.php'; ?>
<?php include 'model/gmail.php' ;
$gmail= new gmail()?>
<?php 

if(isset($_GET['contID']) || $_GET['contID']!=NULL){
    $id=$_GET['contID'];
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $repcontact=$cont->rep_contact($id);
    $sendmail=$gmail->send_mail();
}
?>
    <div class="container">
        <div class="box row">
        <?php
        $get_cont_id=$cont->getContbyID($id);
            if($get_cont_id){
                while($result=$get_cont_id->fetch_assoc()){

        ?>
        <form action="" method="POST" enctype="multipart/form-data"> 
            <div class="col-sm-12">
                    <h3 class="header_h3">Trả lời</h3>
                    <?php
                    // if(isset($update_Cat)){
                    //     echo $update_Cat;
                    // }
                    ?>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Họ tên KH:&nbsp;&ensp;&emsp;</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" for="" name="fullname" value="<?php echo $result['FullName']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Email:&nbsp;&emsp;&emsp;&emsp;&ensp;</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" for="" name=email value="<?php echo $result['Email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Tiêu đề:&emsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <input type="text" for="" class="form-control" name="title" value="<?php echo $result['Title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Nội dung:&nbsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <label for=""><?php echo $result['Content']; ?></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-auto col-form-label">Phản hồi:  &nbsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                            <textarea name="repcontent" id="editor" cols=100% rows=12></textarea>
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
                        <label class="col-sm-auto col-form-label">&nbsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&nbsp;&emsp;&emsp;</label>
                        <div class="col-sm-10">
                        <input type="submit" name='submit' class="btn btn-primary" value="Phản hồi">
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