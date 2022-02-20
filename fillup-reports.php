<?php
include "config.php";
include "format_date.php";
include "database.php";
include "connectDatabase.php";
$database= new Database();
// include "class-fillup.php";
// $id_cardriver= $_SESSION['id'];
echo $id;
// !!
//per avere l'id della car desiderata da mettere dopo WHERE id_car= ..gasta fare una schermata da cui selezionare la car, che porti a questa pag come "fillup-reports.php?id= e l'id della car "
// !! 
// $rifObj= new Fillup($id);
// $rifornim=$rifObj->getAll();
$sql = "SELECT * FROM fillup_reports WHERE id_cardriver = $id ORDER BY fillup_reports.date DESC";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
// $rifornim = mysqli_fetch_assoc($result);
// var_dump($result);
//Fatal error: Uncaught Error: mysqli object is already closed in C:\xampp\htdocs\fuel\Fuelapp-w-class\pages\fillup-reports.php:12 Stack trace: #0 C:\xampp\htdocs\fuel\Fuelapp-w-class\pages\fillup-reports.php(12): mysqli_query(Object(mysqli), 'SELECT * FROM f...') #1 {main} thrown in C:\xampp\htdocs\fuel\Fuelapp-w-class\pages\fillup-reports.php on line 12
$tot_importo= [];
$tot_importo_um="";
$tot_litri=[];
$tot_litri_um="";
$current_odom=0;
$fillup_dates=[];
// $tot_km=$rifornim[0]['odometer'] - $rifornim[count($rifornim)-1]['odometer'];
// // $i= count($rifornim)-1;
// $data_ultimo_rif=$rifornim[0]['date'];
// $km_attuali= $rifornim[0]['odometer'];
$fillupList="";
foreach ($result as $rif){
    $tot_importo[].=$rif['total'];
    $tot_litri[].=$rif['quantity'];
    $tot_litri_um=$rif['qu_um'];
    $tot_importo_um=$rif['tot_um'];
    $current_odom=$rif['odometer'];
    $fillup_dates[].=$rif['date'];
    $fillupList.='<tr><td>'.formatDate($rif['date']).'</td><td>'.$rif['time'].'</td><td>'.$rif['odometer'].$rif['od_um'].'</td><td>'.$rif['quantity'].$rif['qu_um'].'</td><td>'.$rif['total'].$rif['tot_um'].'</td><td>'.$rif['id_car'].'</td></tr>';
}
$tot_importo=json_encode($tot_importo);
var_dump($tot_importo);
$tot_importo_um=json_encode($tot_importo_um);
var_dump($tot_importo_um);
$fillup_dates=json_encode($fillup_dates);
var_dump($fillup_dates);
$tot_litri=json_encode($tot_litri);
$tot_litri_um=json_encode($tot_litri_um);
var_dump($tot_litri);
var_dump($tot_litri_um);

var_dump($current_odom);
}else {
    header("Location: dashboard.php?error=Add a new fill-up report (if you don't have any car registered yet, add a car before)");
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

    <title><?=$_SESSION["username"]?> - Fillup Reports</title>

    <?php require_once "include/head.php"?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800"><?=$adminPrivilege?> Fillup Reports</h1>
                    <?php if (isset($_GET['success'])) { ?>

                    <p style="color:green;"><?php echo $_GET['success']; ?></p>

                    <?php } ?>
                    <!-- fillup cards -->
                    <div class="row">

                        <!-- Fillups (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Last fillup date:</div>
                                            <div id="lastfill" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- Total km/mi traveled: -->
                        <!-- <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Current odometer:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total spent this month:
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div id="myTot" class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <!-- fas fa-clipboard-list fa-2x text-gray-300 -->                                       
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total lt/gal charged:</div>
                                            <div id="mylt" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fillup reports Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                My</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Fillups</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow my-4">
                        <div class="card-header py-3 row">
                            <h6 class="col-md-6 m-0 align-middle text font-weight-bold text-primary">Reports Table</h6>
                            <div class="col-md-6">
                                    <a href="fill-up-add.php" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text font-weight-bold text-primary">Add New Fillup:</span>
                                    </a>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Odometer</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Car</th>
                                            

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Odometer</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Car</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?= $fillupList?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- advanced reports button-->
                    <div class="text-end mx-4">
                        <a href="my-cars.php?message=! - Select a car first" class="btn btn-light btn-icon-split">
                            <span class="icon text-gray-600">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text font-weight-bold text-primary">Advanced reports</span>
                        </a>
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


    <?php
    require_once "include/script.php"
    ?>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- delete user code js -->
    <script src="delete-user-code.js"></script>
    <script>
        let fillup_dates=<?= $fillup_dates?>;
        let last_fillup=fillup_dates[0];
        $("#lastfill").html(last_fillup);
        let tot_importo=<?=$tot_importo?>;
        let tot_imp_um=<?=$tot_importo_um?>;
        if (tot_imp_um == '\u20AC') {
    document.write('\u20AC') ;
        }
console.log(tot_imp_um);
var myTot = tot_importo.map(Number);;
//calcolo la somma dei numeri nell'array 'myTot' ovvero tutti i pagamenti effettuati
const sum = myTot.reduce(add, 0); // with initial value to avoid when the array is empty
let tot_lt_um=<?= $tot_litri_um?>;
let tot_litri=<?=$tot_litri?>;
var mylt = tot_litri.map(Number);;
//calcolo la somma dei numeri nell'array 'myTot' ovvero tutti i pagamenti effettuati
const ltsum = mylt.reduce(add, 0); // with initial value to avoid when the array is empty

function add(accumulator, a) {
  return accumulator + a;
}
ltsum_2dec = ltsum.toFixed(2);
console.log(sum); 
$('#myTot').html(sum+" "+tot_imp_um);
console.log(ltsum); 
$('#mylt').html(ltsum_2dec+" "+tot_lt_um);

    </script>

</body>

</html>