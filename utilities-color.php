<?php
include "config.php";
include "class-utente.php";
$id = $_SESSION['id'];
$userObj= new Utente($id);
$user=$userObj->read();
if (count($user)>0){
    $_SESSION['db_color'] = $user['db_color'];
    $_SESSION['text_color'] = $user['text_color'];
    $_SESSION['navbar_text'] = $user['navbar_text'];
    $_SESSION['car_border_color'] = $user['car_border_color'];
    $_SESSION['car_text_color'] = $user['car_text_color'];
} else{
    echo "Error: 0 results" ;
    die();
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$_SESSION["username"]?> - Color Utilities</title>

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
                    <h1 class="h3 mb-1 text-gray-800">Color Utilities</h1>
                    <p class="mb-4">Bootstrap's default utility classes can be found on the official <a
                            href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities
                        below were created to extend this theme past the default utility classes built into Bootstrap's
                        framework.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- First Column -->
                        <div class="col-lg-4">

                            <!-- Custom Text Color Utilities -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Custom Text Color Utilities</h6>
                                </div>
                                <div class="card-body">
                                    <p class="text-gray-100 p-3 bg-dark m-0">.text-gray-100</p>
                                    <p class="text-gray-200 p-3 bg-dark m-0">.text-gray-200</p>
                                    <p class="text-gray-300 p-3 bg-dark m-0">.text-gray-300</p>
                                    <p class="text-gray-400 p-3 bg-dark m-0">.text-gray-400</p>
                                    <p class="text-gray-500 p-3 m-0">.text-gray-500</p>
                                    <p class="text-gray-600 p-3 m-0">.text-gray-600</p>
                                    <p class="text-gray-700 p-3 m-0">.text-gray-700</p>
                                    <p class="text-gray-800 p-3 m-0">.text-gray-800</p>
                                    <p class="text-gray-900 p-3 m-0">.text-gray-900</p>
                                </div>
                            </div>

                            <!-- Custom Font Size Utilities -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Custom Font Size Utilities</h6>
                                </div>
                                <div class="card-body">
                                    <p class="text-xs">.text-xs</p>
                                    <p class="text-lg mb-0">.text-lg</p>
                                </div>
                            </div>

                        </div>

                        <!-- Second Column -->
                        <div class="col-lg-4">

                            <!-- Background Gradient Utilities -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Change your Dashboard background color!
                                    </h6>
                                </div>
                                <div id="f-color-forms" class="card-body">
                                    <!-- mysql_fetch_array()  mysql_query()  -->
                                  <div class="row">
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-primary.php"><button style="border: none; width: 95%;" type="submit" name="<?=$_SESSION['id']?>" class="px-3 py-5 bg-gradient-primary text-white">blue</button></form>
                                        <!-- .bg-gradient-primary -->
                                        <form class="col-6 col-lg-12" id="f-try" method="POST" action="change-dbcolor-secondary.php"><button style="border: none; width: 95%;" type="submit" name="<?=$_SESSION['id']?>" class="px-3 py-5 bg-gradient-secondary text-white">grey</button></form>
                                        <!-- .bg-gradient-secondary -->
                                  </div>
                                    
                                    <div class="row">
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-success.php"><button style="border: none; width: 95%;" type="submit" name="<?=$_SESSION['id']?>"  class="px-3 py-5 bg-gradient-success text-white">green</button></form>
                                        <!-- .bg-gradient-success -->
                                        
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-info.php"><button style="border: none; width: 95%;" name="<?=$_SESSION['id']?>" type="submit" class="px-3 py-5 bg-gradient-info text-white">cyan</button></form>
                                        <!-- .bg-gradient-info -->
                                    </div>
                                    <div class="row">
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-warning.php"><button style="border: none; width: 95%;" name="<?=$_SESSION['id']?>" type="submit" class="px-3 py-5 bg-gradient-warning text-white">yellow</button></form>
                                        <!-- .bg-gradient-warning -->
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-danger.php"><button style="border: none; width: 95%;" name="<?=$_SESSION['id']?>" type="submit" class="px-3 py-5 bg-gradient-danger text-white">red</button></form>
                                        <!-- .bg-gradient-danger -->
                                    </div>
                                  <div class="row">
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-dark.php"><button style="border: none; width: 95%;" name="<?=$_SESSION['id']?>" type="submit" class="px-3 py-5 bg-gradient-dark text-white">black</button></form>
                                        <!-- .bg-gradient-dark -->
                                        <form class="col-6 col-lg-12" method="POST" action="change-dbcolor-light.php"><button style="border: none; width: 95%;" name="<?=$_SESSION['id']?>" type="submit" class="px-3 py-5 bg-gradient-light text-white">white</button></form>
                                        <!-- .bg-gradient-light -->
                                  </div>
                                   
                                </div>
                            </div>

                        </div>

                        <!-- Third Column -->
                        <div class="col-lg-4">

                            <!-- Grayscale Utilities -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Custom Grayscale Background Utilities
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="p-3 bg-gray-100">.bg-gray-100</div>
                                    <div class="p-3 bg-gray-200">.bg-gray-200</div>
                                    <div class="p-3 bg-gray-300">.bg-gray-300</div>
                                    <div class="p-3 bg-gray-400">.bg-gray-400</div>
                                    <div class="p-3 bg-gray-500 text-white">.bg-gray-500</div>
                                    <div class="p-3 bg-gray-600 text-white">.bg-gray-600</div>
                                    <div class="p-3 bg-gray-700 text-white">.bg-gray-700</div>
                                    <div class="p-3 bg-gray-800 text-white">.bg-gray-800</div>
                                    <div class="p-3 bg-gray-900 text-white">.bg-gray-900</div>
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
    
    <script src="change-db-color.js"></script>
</body>

</html>