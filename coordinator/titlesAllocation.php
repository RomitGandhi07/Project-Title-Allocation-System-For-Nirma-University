<?php
include 'header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinator | Title Allocation</title>
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
                            <th>Student Roll No</th>
                            <th>Partner Roll No</th>
                            <?php
                            $SQLSELECT = "SELECT value FROM content WHERE function='No Of Choices'";
                            $result_set =  mysqli_query($con,$SQLSELECT);
                            while($row = mysqli_fetch_array($result_set)){
                                $choices=$row['value'];
                            }
                            for($i=1;$i<=$choices;$i++){
                            ?>
                            <th>Choice <?php echo $i ?>
                            </th>
                            <?php }
                            ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
            $SQLSELECT="SELECT * FROM choice_filling";
            $result_set =  mysqli_query($con,$SQLSELECT);
            while($row = mysqli_fetch_array($result_set))
            {
        ?>
            <tr >

            <td><?php echo $row['choice_id']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>

            <td><?php if($row['partner_roll_no']=="null"){
                    echo " ";
                }
                else{
                    echo $row['partner_roll_no'];
                }

                ?></td>


                <?php
                    for($i=1;$i<=$choices;$i++){
                        $var="choice_";
                        $var.=$i;
                        // echo $var;
                        $SQLSELECT2="SELECT project_titles.title FROM choice_filling INNER JOIN project_titles ON choice_filling.".$var."=project_titles.id WHERE ".$var."=".$row[$var];
                        // echo $SQLSELECT2;
                        $result_set2 =  mysqli_query($con,$SQLSELECT2);
                        while($row2 = mysqli_fetch_array($result_set2))
                        {
                            $titlename=$row2['title'];
                        }
                        ?>
                        <td title="<?php echo $titlename; ?>"><?php echo $row[$var]; ?></td>
                        <?php
                    }
                ?>

            </tr>
                <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                            <th>#</th>
                            <th>Student Roll No</th>
                            <th>Partner Roll No</th>
                            <?php
                            $SQLSELECT = "SELECT value FROM content WHERE function='No Of Choices'";
                            $result_set =  mysqli_query($con,$SQLSELECT);
                            while($row = mysqli_fetch_array($result_set)){
                                $choices=$row['value'];
                            }
                            for($i=1;$i<=$choices;$i++){
                            ?>
                            <th>Choice <?php echo $i ?>
                            </th>
                            <?php }
                            ?>
                            </tr>
                            </tfoot>
                    </table>
                </div>
                </div>
                <?php
                  $SQLSELECT = "SELECT flag FROM content WHERE function='Apply FCFS'";
                  $result_set =  mysqli_query($con,$SQLSELECT);
                  while($row = mysqli_fetch_array($result_set)){
                      $fcfsflag=$row['flag'];
                  }
                  $sql  = "SELECT flag FROM events WHERE id=3";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        $flag=$row['flag'];
                      }
                    }

                  if($fcfsflag==0 && $flag==1){
                ?>
                <form action="titlesAllocationProcess.php" method="POST">
                                    <button type="submit" class="btn btn-primary btn-block">Apply FCFS</button>
                </form>
                <!-- /.card-body -->
                <?php
                  }
                ?>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
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
