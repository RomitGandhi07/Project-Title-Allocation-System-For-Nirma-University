<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Faculty | Email Confirmation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style>
        .margin-zero{
            margin: 0px;
        }
        .bg-image{
            background-image: url("img/computer-cup-desk-434337.jpg");
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .box {
            width:32%;
            height:auto;
            background:#FFF;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            padding: 30px;
        }
        .effect1{
            -webkit-box-shadow: 0 10px 6px -6px #777;
               -moz-box-shadow: 0 10px 6px -6px #777;
                    box-shadow: 0 10px 6px -6px #777;
        }
        .box-heading{
            text-align: center;
            margin-bottom: 12px;
        }
    </style>

    <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
    </script>

    </head>
    <body class="bg-image" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

        <div class="box effect1">
            <form action="" method="post">
                <h3 class="box-heading">Change Password</h3>
                <div class="form-group">

                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php session_start(); echo $_SESSION['email']; ?>" readonly>

                </div>
                <button type="submit" class="btn btn-primary btn-block" id="Submit" name="submit">Submit</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
              $to = $_POST['email'];
              $subject = "OTP";
              $message = rand(100000,999999);
              $_SESSION['tempotp']=$message;
              require 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "mail.dhruv-al.com";
            $mail->Port = 587; // TCP port to connect to
            $mail->IsHTML(true);
            $mail->Username = "admin@dhruv-al.com";
            $mail->Password = "zHz1EeVI24^R";
            $mail->SetFrom("admin@dhruv-al.com",'Daiwat Vyas');
            $mail->Subject = "OTP";
            $mail->Body = $message;
            $mail->AddAddress($to);
            
            if(!$mail->Send()) {
                // echo "Mailer Error: " . $mail->ErrorInfo;
                ?>
                 <script type="text/javascript">
                  alert("Error occured...");
                 </script>
                 <?php 
            }else {
                // echo "Message has been sent";
                header('Location:otp.php');
            }
            }
             ?>
        </div>
    </body>
</html>
