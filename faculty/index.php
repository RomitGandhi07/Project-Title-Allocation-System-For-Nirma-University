<?php
include 'header.php';
include 'connection.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Faculty | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
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
                    <a href="../faculty/index.php" class="nav-link">Home</a>
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
                    <a class="nav-link" href="#"><i
                        class="fa fa-th-large"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php include'menu.php';
            
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Faculty Dashboard</h1>
                            </div><!-- /.col -->
                            <!--Remove diplay:none for site navigation-->
                            <div class="col-sm-6" style="display:none;">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v2</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-12">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="card card-primary">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Events</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sql  = "SELECT * FROM events";
                                                        $result = mysqli_query($con, $sql);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            // output data of each row
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php switch ($row['flag']) {
                                                            case 0:
                                                                echo '<span class="badge badge-info">Pending</span>';
                                                                break;
                                                            case 1:
                                                                echo '<span class="badge badge-success">Active</span>';
                                                                break;
                                                            case 2:
                                                                echo '<span class="badge badge-danger">Completed</span>';
                                                                break;
                                                        } ?>
                                                        </td>
                                                        <td><?php echo $row['start_date']; ?></td>
                                                        <td><?php echo $row['end_date']; ?></td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- Buttons for dashboard
                                    <div class="card-footer clearfix">
                                        <a href="" class="btn btn-sm btn-info float-left">Add New Event</a>
                                        <a href="" class="btn btn-sm btn-secondary float-right">View Events</a>
                                    </div>-->
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <!-- /.content-wrapper -->

                            <!-- Control Sidebar -->

                            <!-- /.control-sidebar -->

                            <!-- Main Footer -->
                            <footer class="main-footer" style="display:none;">
                                <!-- To the right -->
                                <div class="float-right d-sm-none d-md-block">

                                </div>
                                <!-- Default to the left -->
                                <strong>Copyright &copy; 2018-2019 <a href="">Nirma University</a>.</strong> All rights reserved.
                            </footer>
                        </div>
                        <!-- ./wrapper -->

                        <!-- REQUIRED SCRIPTS -->
                        <!-- jQuery -->
                        <script src="../plugins/jquery/jquery.min.js"></script>
                        <!-- Bootstrap -->
                        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <!-- AdminLTE App -->
                        <script src="../dist/js/adminlte.js"></script>

                        <!-- OPTIONAL SCRIPTS -->
                        <script src="../dist/js/demo.js"></script>

                        <!-- PAGE PLUGINS -->
                        <!-- SparkLine -->
                        <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
                        <!-- jVectorMap -->
                        <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                        <!-- SlimScroll 1.3.0 -->
                        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
                        <!-- ChartJS 1.0.2 -->
                        <script src="../plugins/chartjs-old/Chart.min.js"></script>

                        <!-- PAGE SCRIPTS -->
                        <script src="../dist/js/pages/dashboard2.js"></script>
                    </body>
                    </html>
