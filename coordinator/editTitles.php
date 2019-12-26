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
    <title>Coordinator | Edit Title</title>
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
                    <a href="inedx.php" class="nav-link">Home</a>
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
                            <h1>Edit Title Form</h1>
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
                                    <h3 class="card-title">New Details Of Title</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="" method="post">
                                    <?php
                                        $sql = "SELECT * FROM project_titles WHERE id='$id'";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            $row = mysqli_fetch_assoc($result);
                                            $title = $row['title'];
                                            $description = $row['description'];
                                            $domain = $row['domain'];
                                            $type = $row['type'];
                                            $students = $row['students'];
                                        }

                                     ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="projectTitle">Title</label>
                                            <input type="text" class="form-control" id="" placeholder="Project / Seminar Title" name="title" value="<?php echo $title; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Brief about Project / Seminar Title" name="description"  required><?php echo $description; ?></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Select Domain</label>
                                                    <select class="form-control" id="domain" name="domain" required >
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
                                                    <select class="form-control" name="type" id="type" required>
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
                                            <label>Select No. Of Students</label>
                                            <select class="form-control" name="studentsCount" required>
                                                <option value="<?php echo $students; ?>">Select No. Of Students</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <!-- <option>3</option> -->
                                            </select>
                                            <script>
                                                $('select option[value="<?php echo $students; ?>"]').attr("selected",true);
                                            </script>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Title</button>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['submit'])) {
                                        $title = $_POST['title'];
                                        $description = $_POST['description'];
                                        $domain = $_POST['domain'];
                                        $type = $_POST['type'];
                                        $students = $_POST['studentsCount'];
                                        $sql  = "UPDATE project_titles SET title='$title',description='$description',domain='$domain',type='$type',students='$students' WHERE id='$id'";
                                        //$result = mysqli_query($con, $sql);
                                        if (mysqli_query($con, $sql)) {
                                            // echo "<script>alert('Title updated successfully !');</script>";
                                            // echo "<script>window.location.replace('viewTitles.php');</script>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                            echo "<script>alert('Something Went Wrong !');</script>";
                                        }

                                        $sql2 = "UPDATE titles_allocated SET title_name='$title' WHERE title_id='$id'";
                                        //$result = mysqli_query($con, $sql);
                                        if (mysqli_query($con, $sql2)) {
                                            echo "<script>alert('Title updated successfully !');</script>";
                                            echo "<script>window.location.replace('viewTitles.php');</script>";
                                        } else {
                                            echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
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
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>
</html>
