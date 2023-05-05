<?php
require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
if (isset($_POST)) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
    try {
      //  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $nguoigui = 'minhdien678@gmail.com';
        $matkhau = '24082002';
        $tennguoigui = 'Admin_TVD SHOP';
        $mail->Username = $nguoigui; // SMTP username
        $mail->Password = $matkhau;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom($nguoigui, $tennguoigui);
        // $to = $_POST['email'];
        // $to_name = "NguoiGui ne";
		// $tieude = $_POST['tieude'];

        // $mail->addAddress($to, $to_name); //mail và tên người nhận  
        $to = "nmdien.20it12@vku.udn.vn";
        $to_name = "minhdien";
        $mail->addAddress($to, $to_name); //mail và tên người nhận
		// $mail->addAddress("nlquan@vku.udn.vn","lequan");
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Tôi cần tư vấn qua Email này!!!';
		$noidungthu = $_GET['your_email'];
        $mail->Body =  $noidungthu;	
        $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
        $mail->send();
     //    if($mail->send())
		   // {
     //        echo "<script language='javascript'>alert('Mail của bạn đã được gửi thành công!');";
     //        echo "location.href='?act=home';</script>";
		   // }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }	
}
?>