<?php 
require "PHPMailer/PHPMailer.php"; 
require "PHPMailer/SMTP.php"; 
require 'PHPMailer/Exception.php'; 
?>
<?php 
class gmail
{
    public function send_mail(){
if (isset($_POST)) {
$mail = new PHPMailer\PHPMailer\PHPMailer(true); 
    try {
$mail->isSMTP();
$mail->CharSet  = "utf-8";
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;
$nguoigui = 'dnthu21042002@gmail.com';
$matkhau = 'dangngocthu21042002';
$tennguoigui = 'dang thu';
$mail->Username = $nguoigui; 
$mail->Password = $matkhau;   
$mail->SMTPSecure = 'ssl';   
$mail->Port = 465;                 
$mail->setFrom($nguoigui, $tennguoigui);

$recipients = $_POST['email'];
$email_array = explode(",",$recipients);
$to_name = $_POST['fullname'];
foreach($email_array as $email)
{
   $to      =  $email;
   $mail->addAddress($to, $to_name); 
}
$tieude = 'Phản hồi '.$_POST['title'];

$mail->isHTML(true);  
$mail->Subject = $tieude;
$noidungthu = ' <div class="card" style="width: 18rem;">
      <div class="card-body">
          <h5 class="card-title"><b>Xin chào ' . $to_name . '</b></h5>
          <h5 class="card-subtitle mb-2 text-muted">Chúng tôi đến từ TVD Fashion</h5>
          <p class="card-text">' . $_POST['repcontent'] . '</p>
      </div>
      </div> ';
$mail->Body =  $noidungthu;	
  if(isset($_FILES['file']['name'])) {
      $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
      if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
          $mail->addAttachment($uploadfile, $_FILES['file']['name']);
  } 
$mail->smtpConnect(array(
      "ssl" => array(
          "verify_peer" => false,
          "verify_peer_name" => false,
          "allow_self_signed" => true
      )
  ));
if($mail->send())
 {
    // header("Location:index.php");
 }
} catch (Exception $e) {
echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}	
}
    }
}
?>