<?php
include 'header.php';
 include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student | Remarks</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function updateClick() {
            // body...
            document.getElementById("save").disabled = false;
            document.getElementById("update").disabled = true;
            // document.getElementById("domain").disabled = false;
            $('#title').removeAttr("readonly");
            $('#description').removeAttr("readonly");
            $('#domain').removeAttr("disabled");
            $('#type').removeAttr("disabled");
            $('#guide').removeAttr("disabled");



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
                    <a class="nav-link" href="#">
                        <i class="fa fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'menu.php';
        

        $sql  = "SELECT flag FROM events WHERE id=2";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $flag=$row['flag'];
            }
          }
            if ($flag>0) {


    $SQLSELECT = "SELECT * FROM own_titles WHERE roll_no like '%".$_SESSION['studentusername']."%'";
    // echo $SQLSELECT;
    $result_set =  mysqli_query($con,$SQLSELECT);
    while($row = mysqli_fetch_array($result_set))
    {
        $id=$row['id'];
    }
    $number=mysqli_num_rows($result_set);
    if($number>0){
    $SQLSELECT2 = "SELECT * FROM own_titles WHERE id=".$id;
    $result_set2 =  mysqli_query($con,$SQLSELECT2);
    while($row2 = mysqli_fetch_array($result_set2)){
        $id=$row2['id'];
        $flag=$row2['flag'];
        $remarks=$row2['remarks'];
        $title=$row2['title'];
        $description=$row2['description'];
        $domain=$row2['domain'];
        $type=$row2['type'];
        $faculty=$row2['faculty'];
    }
?>


<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Remarks</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!--<ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>-->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Your Title</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="remarks.php" method="post">
                                    <div class="card-body">
                                    <?php
                                    if($flag==1){
                                    ?>
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="update" name="update" onclick="updateClick()">Update</button>
                                        </div>
                                    <?php
                                        }
                                    ?>

                                    <div class="form-group">
                                    <label for="status">Status</label>
                                        <?php
                                        if($flag==2){
                                            ?><span class="badge badge-success ">Approved</span>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <span class="badge badge-danger">Pending</span>
                                            <?php
                                        }?>
                                    </div>

                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <textarea class="form-control" rows="3" placeholder="Remarks" name="remarks" required readonly><?php echo $remarks;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectTitle">Title</label>
                                            <input type="text" class="form-control" value="<?php echo $title; ?>" id="title" placeholder="Project / Seminar Title" name="title" required readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Select Domain</label>
                                                    <select class="form-control" id="domain" name="domain" required disabled>
                                                        <option value="">Select Domain</option>
                                                        <?php
                                                        $sql="SELECT name FROM content WHERE function='Domain'";
                                                        $result_set3=mysqli_query($con,$sql);
                                                        while($row3 = mysqli_fetch_array($result_set3)){
                                                        ?>
                                                        <option value="<?php echo $row3['name']; ?>"><?php echo $row3['name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <script>
                                                        $('select option[value="<?php echo $domain; ?>"]').attr("selected",true);
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Select Type</label>
                                                    <select class="form-control" name="type" id="type" required disabled>
                                                        <option value="">Select Type</option>
                                                        <option value="Application">Application</option>
                                                        <option value="Research">Research</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <script>
                                                        $('select option[value="<?php echo $type; ?>"]').attr("selected",true);
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="3" id="description" placeholder="Brief about Project / Seminar Title" name="description" required readonly><?php echo $description;?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Faculty Guide</label>
                                            <select class="form-control" name="guide" id="guide" required disabled>
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
                                            <script>
                                                        $('select option[value="<?php echo $faculty; ?>"]').attr("selected",true);
                                                    </script>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" id="save" name="save"  disabled>Submit Title</button>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['save'])) {
                                        $title = $_POST['title'];
                                        $description = $_POST['description'];
                                        $domain = $_POST['domain'];
                                        $type = $_POST['type'];
                                        $guide = $_POST['guide'];
                                        $sql  = "UPDATE own_titles SET title='".$title."',description='".$description."',domain='".$domain."',type='".$type."',faculty='".$faculty."',flag=0 WHERE id=".$id;
                                        // echo $sql;
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_query($con, $sql)) {
                                             echo "<script>alert('Title Updated successfully !'); location.replace('index.php'); </script>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                            echo "<script>alert('Something Went Wrong !');</script>";
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
<?php
    }
    else{
        ?>
        <script>
            alert("No Remarks...");
            location.replace("index.php");
        </script>
        <?php
    }
?>
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
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
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
