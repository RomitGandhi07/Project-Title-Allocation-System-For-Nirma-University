<?php
    include 'connection.php';
    session_start();
    if (empty($_SESSION['susername'])) {
      ?>
        <script>
          location.replace("login.php");
        </script>
      <?php
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student | Change Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
      color: green;
    }

    .valid:before {
      position: relative;
      left: -35px;

    }

    /* Add a red text color and an "x" icon when the requirements are wrong */
    .invalid {
      color: red;
    }

    .invalid:before {
      position: relative;
      left: -35px;

    }
</style>


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

    <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

</head>
<body class="hold-transition login-page" >

  <div class="login-box">
      <div class="login-logo">
          <h2><strong>CHANGE PASSWORD</strong></h2>
      </div>

    <form action="" method="post">
      <div class="card">
          <div class="card-body login-card-body">
        <div class="form-group">
                <label for="exampleInputEmail1">New Password</label>
                <input type="password" class="form-control" id="new_password" aria-describedby="emailHelp" placeholder="New Password" name="new_password">
        </div>
        <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" onkeyup="check();" name="confirm_password">
                <span id='message'></span>
        </div>

        <div id="message">
              <h4>Password must contain the following:</h4>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>

        <button type="submit" class="btn btn-primary btn-block" id="btnSubmit" name="submit">Submit</button>
    </form>
    <?php
        if (isset($_POST['submit'])) {
          $_SESSION['studentusername']=$_SESSION['susername'];
            $password =md5($_POST['new_password']);
            $sql  = "UPDATE students SET password='".$password."',flag=1 WHERE email='".$_SESSION['susername']."@nirmauni.ac.in'";
            // $result = mysqli_query($con, $sql);
            echo $sql;
            if (mysqli_query($con, $sql)) {
              unset($_SESSION['susername']);
                // echo "<script>alert('Password Updated Successfully !');</script>";
                ?>
                <script>
                  location.replace("index.php");
                </script>
                <?php
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                echo "<script>alert('Something Went Wrong !');</script>";
            }
        }
     ?>
</div>
<script>

var check = function() {
  if (document.getElementById('new_password').value ==
    document.getElementById('confirm_password').value) {
      document.getElementById("btnSubmit").disabled = false;
  } else {
    document.getElementById("btnSubmit").disabled = true;
  }
}

var myInput = document.getElementById("new_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// var check = function() {
//   if (document.getElementById('new_password').value ==
//     document.getElementById('confirm_password').value) {
//     document.getElementById('message').style.color = 'green';
//     document.getElementById('message').innerHTML = 'matching';
//   } else {
//     document.getElementById('message').style.color = 'red';
//     document.getElementById('message').innerHTML = 'not matching';
//   }
// }

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
document.getElementById("message").style.display = "block";
}

document.getElementById("btnSubmit").disabled = true;

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
// Validate lowercase letters
var lowerCaseLetters = /[a-z]/g;
if(myInput.value.match(lowerCaseLetters)) {
letter.classList.remove("invalid");
letter.classList.add("valid");
} else {
letter.classList.remove("valid");
letter.classList.add("invalid");
}

// Validate capital letters
var upperCaseLetters = /[A-Z]/g;
if(myInput.value.match(upperCaseLetters)) {
capital.classList.remove("invalid");
capital.classList.add("valid");
} else {
capital.classList.remove("valid");
capital.classList.add("invalid");
}

// Validate numbers
var numbers = /[0-9]/g;
if(myInput.value.match(numbers)) {
number.classList.remove("invalid");
number.classList.add("valid");
} else {
number.classList.remove("valid");
number.classList.add("invalid");
}

// Validate length
if(myInput.value.length >= 8) {
length.classList.remove("invalid");
length.classList.add("valid");
} else {
length.classList.remove("valid");
length.classList.add("invalid");
}

if (letter.classList=="valid") {
if (capital.classList=="valid") {
if (number.classList=="valid") {
    if (length.classList=="valid") {
        // document.getElementById("btnSubmit").disabled = false;
    }
    else{
        document.getElementById("btnSubmit").disabled = true;
    }
}
else{
    document.getElementById("btnSubmit").disabled = true;
}
}
else{
document.getElementById("btnSubmit").disabled = true;
}
}
else{
document.getElementById("btnSubmit").disabled = true;
}

var check = function() {
  if (document.getElementById('new_password').value ==
    document.getElementById('confirm_password').value) {
      document.getElementById("btnSubmit").disabled = false;
  } else {
    document.getElementById("btnSubmit").disabled = true;
  }
}

}
</script>
</body>
</html>
