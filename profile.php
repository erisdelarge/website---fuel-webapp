<?php
include "config.php";
$id = $_SESSION['id'];
// echo $id;

include "format_date.php";
include "connectDatabase.php";
  $mysql= "SELECT * FROM users WHERE id=$id";
  
  $result = mysqli_query($conn, $mysql);
        if (mysqli_num_rows($result) === 1) {

            $myrow = mysqli_fetch_assoc($result);
        }
        // $position = $myrow['position'];
        
  $qwery= "SELECT * FROM agencies";
  
  $result = mysqli_query($conn, $qwery);
        if ($result->num_rows > 0) {
            $agencyList="";

            while($mrow = $result->fetch_assoc()) {
        
                $agencyList.='<option value="'.$mrow['id'].'">'.$mrow['business'].'</option>';
        
            };
        } else {
            $agencyList="";
            // echo "0 results";
            };

  $myqwery= "SELECT * FROM jobs";
  
  $result = mysqli_query($conn, $myqwery);
        if ($result->num_rows > 0) {
            $jobList="";

            while($frow = $result->fetch_assoc()) {
        
                $jobList.='<option value="'.$frow['id'].'">'.$frow['job'].'</option>';
        
            };
        } else {
            $jobList="";
            // echo "0 results";
            };
        

  $sql = "SELECT report, date, time FROM reports WHERE id_user=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $reportList="";
    
    while($row = $result->fetch_assoc()) {
        
        $reportList.='<tr><td>'.formatDate($row["date"])."</td><td>".$row["time"].'</td><td>'.$row["report"].'</td></tr>';

    };



  } else {
    
    $reportList="";
    echo "0 results";
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

    <title><?=$_SESSION["username"]?> - Profile</title>

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
                    <h1 class="h3 mb-4 text-gray-800"><?=$adminMy?> Profile</h1>
                    
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
                    <h1 class="h3 mb-4 text-gray-800">Daily Diary</h1>
                    <?php if (isset($_GET['error'])) { ?>

                    <p style="color:red;"><?php echo $_GET['error']; ?></p>

                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <form id="daily-report-form" action="daily-report.php?id=<?=$_SESSION['id']?>" method="POST" class="f-try card shadow mb-4">
                                
                                    
                                <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Write here your daily report:</h6>
                                </div>
                                <div class="card-body" style="height: 400px;">
                                    
                                    <textarea name="report" style="resize: none; border: none; width:100%; height:100%" class="form-control">
                                    </textarea>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                         <!-- <input required name="report_agency" type="text" class="mx-2 f-orm-control form-control form-control-user" placeholder="agency/company:">
                                            <input required name="report_position" type="text" class="mx-2 f-orm-control form-control form-control-user" value="<php$position>" placeholder="job position:"> -->
    
                                        <select class="form-control form-select mx-2 mb-2" name="report_agency" id="select-agency">
                                            <option disabled selected value>select an agency/company:</option>
                                            <?= $agencyList ?>
                                        </select>
    
                                        <select class="form-control form-select mx-2 mb-2" name="report_position" id="select-position">
                                            <option disabled selected value>select a job position:</option>
                                            <?= $jobList ?>
                                        </select>
       
                                    </div>
                                    <div class="row">
                                        
                                        <div class="d-flex col-12 col-xl-8">
                                            <input name="report_date" type="date" class="mx-2 f-orm-control form-control form-control-user">
                                            <input name="report_time" type="time" class="mx-2 f-orm-control form-control form-control-user">
                                        </div>
                                        <div class="col-12 col-xl-4">
                                            <button class="btn btn-light btn-icon-split mx-2" type="submit">
                                                <span class="icon text-gray-600">
                                                <i class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="text">Send Report</span>
                                            </button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                    
                                
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <!-- Begin Page Content -->
            

                                <!-- DataTables Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 row">
                                        <h6 class="col-md-6 m-0 align-middle text font-weight-bold text-primary">Daily Reports Table</h6>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Report</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Report</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                <?= $reportList?>
                                                </tbody>
                                            </table>
                                        </div>
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