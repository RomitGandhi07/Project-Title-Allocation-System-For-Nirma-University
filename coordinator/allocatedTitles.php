<?php
include 'header.php';
include 'DBController.php';
$db_handle = new DBController();
$productResult = $db_handle->runQuery("SELECT title_id,title_name,student_roll_no,partner_roll_no,faculty_name from project_titles INNER JOIN titles_allocated where project_titles.id=titles_allocated.title_id AND flag=1 ");

if (isset($_POST["export"])) {
    $filename = "Allocated Titles.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinator | Allocated Titles</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.css">
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
        <?php include 'menu.php';

        ?>


<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Choice Filled By Students</h1>
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

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Choice Filled By Students</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                                       <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Title Name</th>
                                          <th>Student Roll No</th>
                                          <th>Partner Roll No</th>
                                          <th>Faculty Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
            if (! empty($productResult)) {
                foreach ($productResult as $key => $value) {
                    ?>

                     <tr>
                    <td><?php echo $productResult[$key]["title_id"]; ?></td>
                    <td><?php echo $productResult[$key]["title_name"]; ?></td>
                    <td><?php echo $productResult[$key]["student_roll_no"]; ?></td>
                    <td><?php echo $productResult[$key]["partner_roll_no"]; ?></td>
                    <td><?php echo $productResult[$key]["faculty_name"]; ?></td>
                </tr>
             <?php
                }
            }
            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th>#</th>
                                          <th>Title Name</th>
                                          <th>Student Roll No</th>
                                          <th>Partner Roll No</th>
                                          <th>Faculty Name</th>
                                        </tr>
                                    </tfoot>
                                      </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                    <form action="" method="post">
                                        <button type="submit" id="btnExport"
                                            name='export' value="Export to Excel"
                                            class="btn btn-primary btn-block">Export to Excel
                                        </button>
                                    </form>
                                    </div>


                                    <div class="col-lg-6">
                                        <form action="studentNotFilledChoices.php" method="POST">
                                            <button type="submit" class="btn btn-primary btn-block">Students Who didn't filled choices</button>
                                            </form>
                                        </div>



            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">

      <div class="col-lg-4">
          <form action="disallocatedTitles.php" method="POST">

              <button type="submit" class="btn btn-primary btn-block">Disallocated Titles</button>
          </form>
          </div>

      <div class="col-lg-4">
          <form action="studentsOwnTitles.php" method="POST">

              <button type="submit" class="btn btn-primary btn-block">Students Who Submitted Own Titles</button>
          </form>
          </div>

          <div class="col-lg-4">
              <form action="disallocatedStudents.php" method="POST">

                  <button type="submit" class="btn btn-primary btn-block">Disallocated Students</button>
              </form>
              </div>
    </div>
    <!-- /.row -->
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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>

<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
</script>
</body>
</html>
