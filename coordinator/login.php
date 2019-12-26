<?php
    include 'connection.php';

    
    if (isset($_SESSION['coordinatorusername'])) {
      header('Location:index.php');
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinator - Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script>
    $(document).ready(function(){
        $('#btnSubmit').attr('disabled',true);
    });
    function checkNirmauniMail(email) {
      $('#btnSubmit').attr('disabled',true);
        // var email = document.getElementById("email");
        //email = email.value;
        var result = email.substring(email.lastIndexOf('@')+1);
        if(result=="nirmauni.ac.in"){
            $('#btnSubmit').attr('disabled',false);
        }
        else{
            alert(email+" is not valid Email");
            //document.getElementById("email1").innerHTML="this is an invalid email";
            $('#btnSubmit').attr('disabled',true);
        }
    }
    </script>
      <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
    </script>
</head>
<body class="hold-transition login-page" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="login-box">
        <div class="login-logo">
            <h2><strong>LOGIN</strong></h2>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="rollno@nirmauni.ac.in" name="email" onfocusout="checkNirmauniMail(this.value)">
                        <!--<span class="fa fa-envelope form-control-feedback"></span>-->
                    </div>
                    <div class="form-group has-feedback">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="password" name="password">
                        <!--<span class="fa fa-lock form-control-feedback"></span>-->
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="btnSubmit" name="submit">Submit</button>
                </form>
                <!-- <p class="mb-1" style="margin-top:10px;">
                    <a href="#">Forgot Password ?</a>
                </p> -->

                <!--google login section start-->
                <!--<div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fa fa-google mr-2"></i> Sign in using Google
                    </a>
                </div>-->
                <!--google login section end-->

                <!-- /.social-auth-links -->
                <!--<p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>-->
                <?php
                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $pswd = md5($_POST['password']);
                        $sql  = "SELECT * FROM coordinator where email='$email' AND password='$pswd'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $row = mysqli_fetch_assoc($result);
                            session_start();
                            $_SESSION['coordinatorusername'] = $row['name'];
                            header('Location:index.php');
                            }
                            else {
                                  echo "<script>alert('Invalid Credentials!');</script>";
                              }
                    }

                 ?>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue',
                increaseArea : '20%' // optional
            })
        })
    </script>
</body>
</html>
