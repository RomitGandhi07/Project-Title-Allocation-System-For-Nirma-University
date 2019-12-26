<?php
include 'header.php';
include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coordinator | Content</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Data Tables-->
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
                    <a href="../index3.html" class="nav-link">Home</a>
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Content</h1>
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
                                    <h3 class="card-title">No Of Choices</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="projectTitle">No Of Choices</label>
                                            <input type="text" class="form-control" id="noofchoices" placeholder="Enter No Of Choices" name="noofchoices" required>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <?php
                                $sql="SELECT value,flag FROM content WHERE function='No Of Choices'";
                                $result_set =  mysqli_query($con,$sql);
                                while($row = mysqli_fetch_array($result_set)){
                                    $choices=$row['value'];
                                    $flag=$row['flag'];
                                }
                                if($flag==0){
                                ?>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submitnoofchoices">Submit</button>
                                    </div>
                                <?php }
                                else{
                                    ?>
                                    <script>
                                        var val="<?php echo $choices ?>";
                                        document.getElementById("noofchoices").value = val;
                                        document.getElementById("noofchoices").readOnly = true;

                                    </script>
                                    <?php
                                }
                                ?>
                                </form>
                                <?php
                                    if (isset($_POST['submitnoofchoices'])) {
                                        $noofchoices = $_POST['noofchoices'];
                                        $sql  ="UPDATE content SET flag=1,value='".$noofchoices."' WHERE function='No Of Choices'";
                                        //$result = mysqli_query($con, $sql);
                                        if ($con->query($sql) === TRUE) {
                                            // echo "Record updated successfully";
                                        } else {
                                            echo "Error updating record: " . $conn->error;
                                        }

                                        $sql="CREATE TABLE choice_filling (
                                            choice_id INT(6) AUTO_INCREMENT PRIMARY KEY,
                                            roll_no VARCHAR(8) NOT NULL,
                                            partner_roll_no VARCHAR(8) NOT NULL";
                                        for($i=1;$i<=$noofchoices;$i++){
                                            $temp=",choice_";
                                            $temp.=$i;
                                            $sql.=$temp." INT(6) NOT NULL";
                                        }
                                        $sql.=");";
                                        // echo $sql;
                                        if ($con->query($sql) === TRUE) {
                                            // echo "Table MyGuests created successfully";
                                        } else {
                                            // echo "Error creating table: " . $con->error;
                                            ?>
                                                <script>
                                                    alert("No Of Choices Are Already Defined...");
                                                    location.replace(content.php);
                                                </script>
                                            <?php
                                        }
                                    }
                                 ?>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Domain</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                    <div class="card-body">
                                    <div classs="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Domain Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count=0;
                            $sql  = "SELECT * FROM content WHERE function='Domain'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td>
                                            <a href="editDomain.php?id=<?php echo $row["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="deleteDomain.php?id=<?php echo $row["id"];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Domain Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="projectTitle">Add New Domain</label>
                                        <input type="text" class="form-control" id="domainname" placeholder="Enter Domain Name" name="domainname" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" name="newdomain">Add New Domain</button>
                                </form>
                                <?php
                                    if (isset($_POST['newdomain'])) {
                                        $domainname = $_POST['domainname'];
                                        $temp="Domain";
                                        $sql  ="INSERT into content (name,function) VALUES ('$domainname','$temp')";
                                        if (mysqli_query($con, $sql)) {
                                            echo "<script>alert('New Domain Addded Successfully !');</script>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                            echo "<script>alert('Something Went Wrong !');</script>";
                                        }
                                        echo "<script>window.location.replace('content.php');</script>";
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
