<?php
    include 'header.php';
    include 'connection.php';
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinator | Edit Events</title>
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
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            //alert(today);
            $("#start_date").prop('min',today);
            $("#end_date").prop('min',today);
        });
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
        <?php include 'menu.php';
        
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Events</h1>
                        </div>
                        <div class="col-sm-6" style="display:none;">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"></li>
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
                                    <h3 class="card-title">Event Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="" method="post">
                                    <?php
                                        $sql = "SELECT * FROM events WHERE id='$id'";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            $row = mysqli_fetch_assoc($result);
                                            $name = $row['name'];
                                            $start_date = $row['start_date'];
                                            $end_date = $row['end_date'];
                                            $status = $row['flag'];
                                        }
                                     ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" id="" placeholder="Event Name" name="name" value="<?php echo $name; ?>" required >
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date" min="" name="start_date" value="<?php echo $start_date; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">End Date</label>
                                                    <input type="date" class="form-control" id="end_date" min="" name="end_date" value="<?php echo $end_date; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($start_date < date("Y-m-d")) {
                                          ?>
                                          <script>
                                            document.getElementById('start_date').disabled=true;
                                          </script>
                                          <?php
                                        }
                                        if ($end_date < date("Y-m-d")) {
                                          ?>
                                          <script>
                                            document.getElementById('end_date').disabled=true;
                                          </script>
                                          <?php
                                        }
                                         ?>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="">Select Event Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Active</option>
                                                <option value="2">Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Title</button>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['submit'])) {
                                        $name = $_POST['name'];
                                        $start_date = $_POST['start_date'];
                                        $end_date = $_POST['end_date'];
                                        $status = $_POST['status'];
                                        $sql  = "UPDATE events SET name='$name',start_date='$start_date',end_date='$end_date',flag='$status' WHERE id='$id'";
                                        //$result = mysqli_query($con, $sql);
                                        if (mysqli_query($con, $sql)) {
                                            echo "<script>alert('Event Updated Successfully !');window.location.replace('index.php');</script>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                            echo "<script>alert('Something Went Wrong !');window.location.replace('index.php');</script>";
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
