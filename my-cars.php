<?php
include "config.php";
$id = $_SESSION['id'];
include "connectDatabase.php";
  $mysql= "SELECT * FROM users WHERE id=$id";
  
  $result = mysqli_query($conn, $mysql);
        if (mysqli_num_rows($result) === 1) {

            $myrow = mysqli_fetch_assoc($result);
        }
        // $position = $myrow['position'];
    
$servername = "localhost";
$username = 'federicapietrolungo';
$password = '';
$dbname = 'my_federicapietrolungo';
$sql = "SELECT * FROM cars WHERE id_driver = $id";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $carlist="";
    while($row = $result->fetch_assoc()) {
        //row id works
        $addcar_button='<a href="car-add.php" class="btn btn-light btn-icon-split">
        <span class="icon text-gray-600">
            <i class="fas fa-arrow-right"></i>
        </span>
        <span class="text">Add New Car:</span>
    </a>';
        $carlist.='<div class="col-md-6 mb-4">
        <div class="card '.$_SESSION["car_border_color"].' shadow h-100 py-2">
            <a href="odometer-charts.php?id='.$row["id"].'" style="text-decoration: none;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold '.$_SESSION["car_text_color"].' text-uppercase mb-1">
                            '.$row["driver"].'</div>
                        <div class="h5 font-weight-bold text-gray-800">'.$row["brand"].' '.$row["model"].' '.'<span class="h6 mx-2 font-weight-bold text-secondary text-uppercase mb-1">
                        '.$row["series"].'</span></div>
                        <div class="text-xs font-weight-bold text-secondary text-lowercase mb-1">
                            '.$row["engine"].'</div>
                    </div>
                    <div class="col-auto"><img class="rounded-circle" style="width: 100px; height: 100px;" src="
                        '.$row["image"].'">
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>';
    };
    
} else {
// echo "0 results";
$addcar_button="";
$carlist=' <div class="text-center">
<div class="error mx-auto" data-text="404">404</div>
<p class="lead text-gray-800 mb-5">0 results</p>
<p class="text-gray-600 mb-0">You don\'t have any cars yet...</p>
<p>
    <a href="car-add.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Add a car
                        </a>
</p>
<p><a href="dashboard.php">&larr; Back to Dashboard</a></p>
</div>';
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$_SESSION["username"]?> - My Cars</title>

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
                    <div class="row">
                        <div class="col-6"><h1 class="h3 mb-4 text-gray-800">My Cars</h1></div>
                        <div class="col-6"> 
                            <?= $addcar_button?>
                            <!-- <a href="car-add.php" class="btn btn-light btn-icon-split">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Add New Car:</span>
                            </a> -->
                        </div>
                    </div>
                    
                    <?php if (isset($_GET['message'])) { ?>

                    <p style="color:green;"><?php echo $_GET['message']; ?></p>

                    <?php } ?>
                    <div class="row">
                           <!-- my cars list here -->

                           <?=$carlist?>
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

</body>

</html>