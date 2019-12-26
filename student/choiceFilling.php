<?php
include 'header.php';
 include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student | Choice Filling</title>
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

    $(document).ready(function(){
        //  $('#partnersRollNo').hide();
        $('#single').click(function(){
            var x=1;
            $('#partnersRollNo').hide();
            location.replace("choiceFilling.php?select="+x);
        });
        $('#group').click(function(){
             var x=2;
            //window.location.replace("choiceFilling.jsp?select="+x);
            $('#partnersRollNo').show();
            location.replace("choiceFilling.php?select="+x);
        });

    });

</script>

<script>
 $(document).ready(function() {

    $('select').each(function(cSelect) {
        $(this).data('stored-value', $(this).val());

    });

    $('.ddlselect').change(function() {
        var previousVal = $(this).data('stored-value'); //get previous selected value
        var selectedVal = $(this).val(); //get selected dropdown value
        $(this).data('stored-value', selectedVal); //set new selected value
        var eleid = $(this).attr("id");
        $(".ddlselect").each(function() {

            if ($(this).attr("id") !== eleid) {
                $(this).parent().find('option[value="' + selectedVal + '"]:not(:selected)').attr('disabled', 'disabled');
            }
        });
    });
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

    $SQLSELECT = "SELECT value FROM content WHERE function='No Of Choices'";
    $result_set =  mysqli_query($con,$SQLSELECT);
    while($row = mysqli_fetch_array($result_set)){
        $choices=$row['value'];
    }
    
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


<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Choice Filling</h1>
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

        <?php
          $select=2;
          $noofchoices=0;
          if(empty($_GET['select']))
          {
            $noofchoices=2;
          }
          else{
              $noofchoices = intval($_GET['select']);
          }
          $count=0;
            if($noofchoices=="1"){ ?>
          <script type="text/javascript">
            $(document).ready(function(){
                $('#partnersRollNo').hide();
               document.getElementById("single").checked = true;
            });
        </script>

        <?php }
        else{
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#partnersRollNo').show();
                document.getElementById("group").checked = true;
            });
        </script>
        <?php } ?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Fill choices</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="choiceFillingProcess.php" method="POST">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Selection Of Group or Single</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="abc" id="single">Single
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="abc" id="group">Group
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.getElementById("group").checked = false;
                                        document.getElementById("single").checked = false;
                                    </script>
                                <div class="row">
                                    <?php

                                        if($noofchoices=="1"){ ?>
                                            <script type="text/javascript">
                                            document.getElementById("single").checked = true;
                                            </script>
                                        <?php } ?>
                                    <div class="col-6">
                                        <div class="form-group" id="studentsRollNo">
                                            <label for="studentsRollNo">Your Roll No</label>
                                            <input type="text" class="form-control" id="" placeholder="Enter Your Roll No" name="studentrollno" value="<?php echo $_SESSION['studentusername']; ?>" required readonly>
                                        </div>
                                    </div>
                                    <?php
                                    if($noofchoices=="2"){ ?>
                                        <script type="text/javascript">
                                            document.getElementById("group").checked = true;
                                        </script>
                                    <div class="col-6">
                                        <div class="form-group" id="partnersRollNo">
                                            <label for="PartnersRollNo">Partner's Roll No</label>
                                            <input type="text" class="form-control" id="" placeholder="Partners Roll No" name="partnerrollno" required>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                    $SQLSELECT = "SELECT * FROM project_titles WHERE students=$noofchoices";
                                    ?>
                                </div>
                                <?php
                                for($i=1;$i<=$choices;$i++){
                                    $result_set =  mysqli_query($con,$SQLSELECT);
                                    $name="choice";
                                    $id="dropdown";
                                    $name.=$i;
                                    $id.=$i;
                                    $count=0;
                                    // echo $name;
                                    // echo $id;
                                ?>
                                <div class="form-group">
                                    <label for="choice1">Choice <?php echo $i ?></label>
                                    <select class="form-control ddlselect" name="<?php echo $name; ?>" id="<?php echo $id; ?>" required>
                                     <option value="" disabled="" selected="" style="display:none;"></option>
                                    <?php  while($row = mysqli_fetch_array($result_set))
                                    { $count++;?>
                                        <option value="<?php echo $row['id']; ?>" name="<?php echo $row['id']; ?>"> <?php echo $row['id'];
                                        echo ".";
                                        echo $row['title']; ?></option>
                                    <?php }
                                    $count=0;?>
                                    </select>
                                </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content-wrapper -->
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
