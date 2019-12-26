<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" style=""alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $_SESSION['coordinatorusername']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Username</a>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="events.php" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Events</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="addTitle.php" class="nav-link">
                        <i class="nav-icon fa fa-plus-circle"></i>
                        <p>Add Titles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="viewTitles.php" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>View Titles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="students.php" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="faculties.php" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>Faculties</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ownTitles.php" class="nav-link">
                        <i class="nav-icon fa fa-sticky-note"></i>
                        <p>Own Titles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="titlesAllocation.php" class="nav-link">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>Title Allocation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="allocatedTitles.php" class="nav-link">
                        <i class="nav-icon fa fa-bookmark"></i>
                        <p>Allocated Titles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="mail.php" class="nav-link">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>Mail</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="content.php" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Content</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
