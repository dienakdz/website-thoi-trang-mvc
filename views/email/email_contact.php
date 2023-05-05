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
        $tennguoigui = $_POST['contact_name'];
        $mail->Username = $nguoigui; // SMTP username
        $mail->Password = $matkhau;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom($nguoigui, $tennguoigui);
        // $to = $_POST['email'];
        // $to_name = "NguoiGui ne";
		$tieude = $_POST['contact_subject'];

        $to = "nmdien.20it12@vku.udn.vn";
        $to_name = "Quản trị viên TVDShop";
        $mail->addAddress($to, $to_name);//mail và tên người nhận

        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $tieude;
		$noidungthu = ' <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title"><b>Xin chào ' . $to_name . '</b></h3>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"> Hãy trả lời tôi qua email này :' . $_POST['contact_email'] . '</p>
                    <p class="card-text">' . $_POST['contact_message'] . '</p>
                </div>
                </div> ';
        $mail->Body =  $noidungthu;	
        $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
        if($mail->send())
		   {
			echo "<script language='javascript'>alert('Nội dung của bạn đã được gửi!!');";
            echo "location.href='?act=lienhe';</script>";
		   }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }	
}
?>