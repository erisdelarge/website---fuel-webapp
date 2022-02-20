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

    <title><?=$_SESSION["username"]?> - 404</title>

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

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="dashboard.php">&larr; Back to Dashboard</a>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- start advanced settings section -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Advanced Settings</h1>
                </div>
                <div class="container">
                    <a href="change-password.php">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Security Settings
                    </a>
                    <a data-toggle="modal" data-target="#deletePersonalAccModal<?= $_SESSION['id']?>" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Delete Account
                    </a>
                </div>
                <!-- end advanced settings section -->

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
      <!-- delete personal account modal -->

    <form action="delete-personal-acc.php?id=<?= $_SESSION['id']?>" method="POST">
    <div class="modal fade" id="deletePersonalAccModal<?= $_SESSION['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete your personal account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><?= $_SESSION['firstname']?> <?= $_SESSION['lastname']?>, are you sure you want to delete this account? All your personal data will be erased from the database.</div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="profile-settings.php" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <?php
    require_once "include/script.php"
    ?>

</body>

</html>