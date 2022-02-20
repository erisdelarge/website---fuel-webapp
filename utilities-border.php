<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$_SESSION["username"]?> - Border Utilities</title>

    <!-- Custom fonts for this template-->
    <?php require_once "include/head.php"?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Border Utilities</h1>
                    <p class="mb-4">Bootstrap's default utility classes can be found on the official <a
                            href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities
                        below were created to extend this theme past the default utility classes built into Bootstrap's
                        framework.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Border Left Utilities -->
                        <div class="col-lg-6">

                            <div id="change_border_primary" class="card mb-4 py-3 border-left-primary">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-primary</span>
                                    <button type="button" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                            <div id="change_border_secondary" class="card mb-4 py-3 border-left-secondary">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-secondary</span>
                                    <button type="button" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                            <div id="change_border_success" class="card mb-4 py-3 border-left-success">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-success</span>
                                    <button type="button" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                            <div id="change_border_info" class="card mb-4 py-3 border-left-info">
                                <div class="card-body d-flex justify-content-between">
                                   <span> .border-left-info</span>
                                   <button type="button" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                            <div id="change_border_warning" class="card mb-4 py-3 border-left-warning">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-warning</span>
                                    <button type="button" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                            <div id="change_border_danger" class="card mb-4 py-3 border-left-danger">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-danger</span>
                                    <button type="button" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                            <div id="change_border_dark" class="card mb-4 py-3 border-left-dark">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-dark</span>
                                    <button type="button" class="btn btn-dark btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>
                            <div id="change_border_light" class="card mb-4 py-3 border-left-light">
                                <div class="card-body d-flex justify-content-between">
                                    <span>.border-left-light</span>
                                    <button type="button" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span></button>
                                </div>
                            </div>

                        </div>

                        <!-- Border Bottom Utilities -->
                        <div class="col-lg-6">

                            <div class="card mb-4 py-3 border-bottom-primary">
                                <div class="card-body ">
                                    .border-bottom-primary
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-secondary">
                                <div class="card-body">
                                    .border-bottom-secondary
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-success">
                                <div class="card-body">
                                    .border-bottom-success
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-info">
                                <div class="card-body">
                                    .border-bottom-info
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-warning">
                                <div class="card-body">
                                    .border-bottom-warning
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-danger">
                                <div class="card-body">
                                    .border-bottom-danger
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-dark">
                                <div class="card-body">
                                    .border-bottom-dark
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?= include "logout_modal.php" ?>

<?php
require_once "include/script.php"
?>
<script src="sidebar-color-function.js"></script>
</body>

</html>