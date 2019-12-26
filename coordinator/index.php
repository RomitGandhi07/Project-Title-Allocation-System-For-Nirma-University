<?php
include 'header.php';
include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Coordinator | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--  <style>
    /*Applying Dark Mode*/
    @media (prefers-color-scheme:dark)
    {
        body{
          background-color: #1c1c1e;
          color: #fefefe ;
        }
        a{
          color: #5fa9ee;
        }
        img{
          filter: grayscale(20%);
        }
    }
    </style>
-->
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
                                <h1 class="m-0 text-dark">Coordinator Dashboard</h1>
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
                        <!-- Info boxes / counters -->
                        <div class="row" style="">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Submitted Titles</span>
                                        <?php
                                        $sql  = "SELECT * FROM project_titles";
                                        $result = mysqli_query($con, $sql);
                                        $data=mysqli_num_rows($result);
                                         ?>
                                        <span class="info-box-number"><?php echo $data; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Students</span>
                                        <?php
                                        $sql  = "SELECT * FROM students";
                                        $result = mysqli_query($con, $sql);
                                        $data=mysqli_num_rows($result);
                                         ?>
                                        <span class="info-box-number"><?php echo $data; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <!-- fix for small devices only -->
                            <div class="clearfix hidden-md-up"></div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Faculties</span>
                                        <?php
                                        $sql  = "SELECT * FROM faculties";
                                        $result = mysqli_query($con, $sql);
                                        $data=mysqli_num_rows($result);
                                         ?>
                                        <span class="info-box-number"><?php echo $data; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-sticky-note"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Own Titles</span>
                                        <?php
                                        $sql  = "SELECT * FROM own_titles";
                                        $result = mysqli_query($con, $sql);
                                        $data=mysqli_num_rows($result);
                                         ?>
                                        <span class="info-box-number"><?php echo $data; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-check-square-o"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Allocated Titles</span>
                                        <?php
                                        $sql  = "SELECT * FROM project_titles WHERE flag=1";
                                        $result = mysqli_query($con, $sql);
                                        $data=mysqli_num_rows($result);
                                         ?>
                                        <span class="info-box-number"><?php echo $data; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>
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
                                                        <th>Actions</th>
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
                                                        <td>
                                                            <a href="editEvent.php?id=<?php echo $row["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="deleteEvent.php?id=<?php echo $row["id"];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>
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
                                    <!-- Buttons for dashboard-->
                                    <div class="card-footer clearfix">
                                        <a href="events.php" class="btn btn-sm btn-info float-right">Add New Event</a>
                                    </div>
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
