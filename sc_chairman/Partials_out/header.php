<!DOCTYPE html>
<html lang="en">
<?php
 session_start();
include '../database/config.php'; ?>
<head>

<?php
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM `user_table_global` WHERE id=$user_id";
$exe=mysqli_query($con,$query);
$row_det=mysqli_fetch_array($exe);

$storage_confidentality = json_decode($row_det['more_details'], true);

?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">



</head>
<style>
    /* Wrapper for entire page */
#wrapper {
    display: flex;
    min-height: 100vh;
}

/* Fixed sidebar styles */
#accordionSidebar {
    position: fixed;
    height: 100vh;
    width: 225px; /* Adjust based on your design */
    z-index: 1000;
    overflow-y: auto;
}

/* Content wrapper adjustments */
#content-wrapper {
    margin-left: 225px; /* Match sidebar width */
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Fixed navbar styles */
.topbar {
    position: fixed;
    top: 0;
    right: 0;
    left: 225px; /* Match sidebar width */
    height: 70px; /* Adjust based on your navbar height */
    z-index: 1000;
}

/* Main content area */
#content {
    margin-top: 70px; /* Match navbar height */
    flex: 1;
    position: relative;
}

/* Scrollable content area */
#contentchange {
    padding: 1.5rem;
    position: relative;
    width: 100%;
    height: calc(100vh - 70px - 80px); /* Viewport height minus navbar and footer */
    overflow-y: auto;
}

/* Fixed footer */
.sticky-footer {
    position: fixed;
    bottom: 0;
    right: 0;
    left: 225px; /* Match sidebar width */
    z-index: 1000;
    background: white;
}

/* Ensure content doesn't get hidden behind footer */
#content {
    padding-bottom: 80px; /* Match footer height */
}

Responsive adjustments for smaller screens
@media (max-width: 768px) {
    #accordionSidebar {
        width: 0;
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
    }

    #content-wrapper {
        margin-left: 0;
    }

    .topbar {
        left: 0;
    }

    .sticky-footer {
        left: 0;
    }

    /* When sidebar is toggled */
    .sidebar-toggled #accordionSidebar {
        width: 225px;
        transform: translateX(0);
    }
}
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"style="    background: linear-gradient(135deg, #2C3E50, #3498DB);">

            <!-- Sidebar - Brand -->
         

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Proposals
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
         <!-- Scientific Committee Dropdown -->

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
        aria-expanded="true" aria-controls="collapseTwo1">
        <i class="fas fa-fw fa-cog"></i>
        <span>Application tracker</span>
    </a>
    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="./track_new_applications.php">Scientific application</a>
            <!-- <a class="collapse-item" href="" id="">Track application</a> -->
        </div>
    </div>
</li>

<!-- Ethics Committee Dropdown -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Ethics commiteee</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="./initial_review">Create application</a>
            <a class="collapse-item" href="./track_initial_application.php">Track application</a>
        </div>
    </div>
</li> -->


     


            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                           
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                          
                        </li>

                        <!-- Nav Item - Messages -->
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row_det['holder_name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./forgot_password.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Change password
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              


            <!-- End of Main Content -->
            <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  