<?php
    //echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; 
    require 'PHPMailer/PHPMailerAutoload.php';
    //require 'PHPMailer/class.phpmailer.php';
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.dhruv-al.com";
    $mail->Port = 587; // TCP port to connect to
    $mail->IsHTML(true);
    $mail->Username = "admin@dhruv-al.com";
    $mail->Password = "zHz1EeVI24^R";
    $mail->SetFrom("admin@dhruv-al.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("nirav96016@gmail.com"); // Add a recipient
    
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else {
        echo "Message has been sent";
    }
?>
