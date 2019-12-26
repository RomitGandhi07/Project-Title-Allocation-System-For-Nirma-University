<?php
// include 'header.php';
// include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinator | Mail</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fa fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container | main menu -->
         <?php
         //include 'menu.php'; -->

         ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mail</h1>
                        </div>
                        <div class="col-sm-6" style="display:none;">
                            <!-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
                            </ol> -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Mail</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                      <div class="form-group">
                                          <label for="emailadd">Recipient's Email Address</label>
                                          <input type="email" class="form-control" id="" placeholder="Recipient's Email Address" name="emailadd" required>
                                      </div>

                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" id="" placeholder="Subject" name="subject" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" rows="3" placeholder="Message" name="message" required></textarea>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Title</button>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['submit'])) {
                                        $to = $_POST['emailadd'];
                                        $subject=$_POST['subject'];
                                        $message=$_POST['message'];
                                        error_reporting(0);
                                        $attach=$_POST['selection'];
                                        if (empty($attach)) {
                                            require 'PHPMailer/PHPMailerAutoload.php';
                                            $mail = new PHPMailer(); // create a new object
                                            $mail->IsSMTP(); // enable SMTP
                                            // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                                            $mail->SMTPAuth = true; // authentication enabled
                                            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
                                            $mail->Host = "smtp.gmail.com";
                                            $mail->Port = 587; // TCP port to connect to
                                            $mail->IsHTML(true);
                                            $mail->Username = "romitgandhi77@gmail.com";
                                            $mail->Password = "Password";
                                            $mail->SetFrom("romitgandhi77@gmail.com",'Romit Gandhi');
                                            $mail->Subject = $subject;
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
                                              ?>
                                              <script type="text/javascript">
                                                alert("Mail Sent Successfully...");
                                              </script>
                                              <?php
                                            }
                                          }


                                    }
                          ?>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <!--<b>Version</b> 3.0.0-alpha-->
            </div>
            <strong>Copyright &copy; 2018-2019 Nirma University</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>
</html>
