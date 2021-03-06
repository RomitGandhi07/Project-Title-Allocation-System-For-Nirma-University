<?php
include 'header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student | Own Titles</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

        window.onload = function()
        {
            var select = document.getElementById("select");
            var texts = document.getElementById("texts");
            select.onchange = function()
            {
                var val = select.options[select.selectedIndex].value;
                texts.innerHTML = "";
                for(i=0; i < val; i++)
                {
                    texts.innerHTML += '<div class="form-group"><lable>Student '+(i+1)+'</lable><input type="text" class="form-control" placeholder="Enter Roll No" id="student'+(i+1)+'" name="student'+(i+1)+'" /></div>';
                }
                var temp="<?php echo $_SESSION['studentusername']; ?>";
                document.getElementById("student1").value = temp ;
                document.getElementById("student1").readOnly = true;
            }

        }
    </script>

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
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
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
        <?php error_reporting(0); include 'menu.php';
        
        $sql  = "SELECT flag FROM events WHERE id=2";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $flag=$row['flag'];
            }
          }
            if ($flag==1) {

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Own Title Form</h1>
                        </div>
                        <div class="col-sm-6" style="display:none;">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
                            </ol>
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
                                    <h3 class="card-title">New Title</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="ownTitleProcess.php" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="projectTitle">Title</label>
                                            <input type="text" class="form-control" id="" placeholder="Project / Seminar Title" name="title" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Select Domain</label>
                                                    <select class="form-control" name="domain" required>
                                                        <option value="">Select Domain</option>
                                                        <?php
                                                        $sql="SELECT name FROM content WHERE function='Domain'";
                                                        $result_set=mysqli_query($con,$sql);
                                                        while($row = mysqli_fetch_array($result_set)){
                                                        ?>
                                                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Select Type</label>
                                                    <select class="form-control" name="type" required>
                                                        <option value="">Select Type</option>
                                                        <option value="Application">Application</option>
                                                        <option value="Research">Research</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Brief about Project / Seminar Title" name="description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Select No Of Students</label>
                                            <select class="form-control" id="select" name="studentsCount" required>
                                                <option value="">Select No. Of Students</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                            <!-- <input type="submit" name="Submit" value="Submit" > -->
                                        </div>
                                        <div id="texts"></div>
                                        <div class="form-group">
                                            <label>Select Faculty Guide</label>
                                            <select class="form-control" name="guide" required>
                                                <option value="">Select Faculty</option>
                                                <?php
                                                    $sql="SELECT name FROM faculties";
                                                    $result = mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // output data of each row
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Title</button>
                                    </div>
                                </form>
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
<?php
}
else{
  ?>
  <script>
    alert("This Phase Is Currently Unavailable...");
    location.replace("index.php");
  </script>
  <?php
}
?>
