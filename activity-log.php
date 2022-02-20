<?php
include "config.php";
include "class-report-all.php";
include "functions-database.php";
// include "database.php";
// $database= new Database();
include "connectDatabase.php";
$id_admin = $_SESSION['id'];
            // before, with sql: 
// $sql = "SELECT reports.date, reports.time, reports.report, jobs.job, agencies.business, users.firstname, users.lastname FROM reports INNER JOIN jobs ON jobs.id = reports.id_position INNER JOIN agencies ON agencies.id = reports.id_agency INNER JOIN users ON users.id = reports.id_user";
// $reports = $database->dbSelect($sql);
            // after, w class ReportAll() -> 
$allReportsObj= new ReportAll($id_admin);
$allReports=$allReportsObj->getAllReports();
$allReportsList="";
// var_dump ($allReports);
            // before w sql: 
// if ($reports > 0) {
            // after w class: 
if (count($allReports)>0){
    $allReportsList="";
        foreach($allReports as $report) {
    
        $allReportsList.='<tr><td>'.$report['date']."</td><td>".$report['time'].'</td><td>'.$report['report'].'</td><td>'.$report['job'].'</td><td>'.$report['business'].'</td><td>'.$report['firstname'].'</td><td>'.$report['lastname'].'</td></tr>';
    

        } 
}else{
    $allReportsList="";
    echo "0 results";}
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

    <title><?=$_SESSION["username"]?> - Activity Log</title>

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
                <div class="container-fluid f-profile-container">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Activity Log</h1>
                    
                     <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Earnings (Monthly)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Earnings (Annual) Card Example -->
                            <div class="col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Earnings (Annual)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
                     <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Reports table</h1>
                    <div class="container-fluid">
                        
                        
                            <!-- Begin Page Content -->
            

                                <!-- DataTables Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 row">
                                        <h6 class="col-md-6 m-0 align-middle text font-weight-bold text-primary">Daily Reports from All Users</h6>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Report</th>
                                                        <th>Position</th>
                                                        <th>Agency</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Report</th>
                                                        <th>Position</th>
                                                        <th>Agency</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                <?= $allReportsList?>
                                                </tbody>
                                            </table>
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
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>