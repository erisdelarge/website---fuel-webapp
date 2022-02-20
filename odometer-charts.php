<?php
include "config.php";
include "functions-database.php";
include "database.php";
$database= new Database();

$id = $_SESSION['id'];
if (isset($_GET['id'])){
  $id_car=$_GET['id'];
  echo$id_car;
  include "format_date.php";
  include "connectDatabase.php";
  $sql="SELECT * FROM cars WHERE id= $id_car";
  $result = mysqli_query($conn, $sql);
  // if ($result > 0) {
    $row = mysqli_fetch_assoc($result);
        
    $brand = $row['brand'];
    $model = $row['model'];
    $series = $row['series'];
    $engine = $row['engine'];
    $driver = $row['driver'];


    // $result = $conn->query($mysql); 

  // }

  $sql = "SELECT * FROM fillup_reports WHERE id_car = $id_car ORDER BY fillup_reports.odometer DESC";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $count_odometer=[];
    
    $tot_lt=[];
    foreach ($result as $row){
      $count_odometer[].=$row['odometer'];
      $tot_lt[].=$row['quantity'];
      $tot_litri_um=$row['qu_um'];
      
      
    }
    $count_odometer=json_encode($count_odometer);
    
    var_dump($count_odometer);
    
    $tot_lt=json_encode($tot_lt);
    var_dump($tot_lt);
    $tot_litri_um=json_encode($tot_litri_um);
    var_dump($tot_litri_um);
    

    $sql = "SELECT date
    FROM fillup_reports 
    WHERE id_car = $id_car
    ORDER BY fillup_reports.date DESC LIMIT 7";
    $result = $database->dbSelect($sql);
    // usort($result, fn ($a, $b) => strtotime($a["date"]) - strtotime($b["date"]));
    // var_dump($result);  

    foreach($result as $resrow){
        foreach($resrow as $key=>$value){
            $mydates[]=$resrow[$key];
        }
    }

    $mydates=json_encode($mydates);
    // var_dump($mydates);
    //pick time from my table
    $sql = "SELECT time
    FROM fillup_reports 
    WHERE id_car = $id_car
    ORDER BY fillup_reports.date DESC LIMIT 7";
    $result = $database->dbSelect($sql);
    // usort($result, fn ($a, $b) => strtotime($a["date"]) - strtotime($b["date"]));
    // var_dump($result);
    foreach($result as $resrow){
        foreach($resrow as $key=>$value){
            $mytime[]=$resrow[$key];
        }
    }
    $mytime=json_encode($mytime);
    // var_dump($mytime);
    //pick total from my table
    $sql = "SELECT total
    FROM fillup_reports 
    WHERE id_car = $id_car 
    ORDER BY fillup_reports.date DESC LIMIT 7";
    $res = $database->dbSelect($sql);
    foreach($res as $row){
        foreach($row as $key=>$value){
            $mydata[]=$row[$key];
        }
    }
    $mydata=json_encode($mydata);
    //  start odometer  --
    $sql = "SELECT odometer
    FROM fillup_reports 
    WHERE id_car= $id_car 
    ORDER BY fillup_reports.odometer DESC LIMIT 7";
    $res = $database->dbSelect($sql);
    foreach($res as $row){
        foreach($row as $key=>$value){
            $myOdometer[]=$row[$key];
        }
    }
    $myOdometer=json_encode($myOdometer);
    var_dump($myOdometer);
    //  end odometer  --
    //pick od_um from my table
    $sql = "SELECT od_um
    FROM fillup_reports 
    WHERE id_car=$id_car
    ORDER BY fillup_reports.date DESC LIMIT 7";
    $result = $database->dbSelect($sql);
    // var_dump($result);
    foreach($result as $key=>$value){
        $valuta[]=$result[$key];
        
        foreach($valuta as$key=>$value){
            $myvaluta=$valuta[$key];

        }
      
    }
    
    $myvaluta=json_encode($myvaluta);
    //end od_um
    //pick tot_um from my table
    $sql = "SELECT tot_um
    FROM fillup_reports 
    WHERE id_car=$id_car
    ORDER BY fillup_reports.date DESC LIMIT 7";
    $result = $database->dbSelect($sql);
    // var_dump($result);
    foreach($result as $key=>$value){
        $money[]=$result[$key];
        
        foreach($money as$key=>$value){
            $myMoney=$money[$key];

        }
      
    }
    
    $myMoney=json_encode($myMoney);
    var_dump($myMoney);

    
    //end tot_um

  }else{
    header("Location: dashboard.php?error=Add a new fill-up report (if you don't have any car registered yet, add a car before)");
  }
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

    <title><?=$_SESSION["username"]?> - Odometer Charts</title>

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
                    <h1 class="h3 mb-2 text-gray-800"><?=$brand?> <?=$model?> - Advanced Report</h1>

                    <!-- fillup cards -->
                    <div class="row">

                        <!-- KM/mi traveled Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Km - mi traveled <span style="font-size:10px;">(from the first fillup)</span>:</div>
                                            <div id="tot_percorso" class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Current odometer:</div>
                                            <div id="odometer_now" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Km/lt - mi/gal:
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div id="km_lt" class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
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
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                lt x 100km - gal x 100mi:</div>
                                            <div id="lt_x_100" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Km/miles traveled with: <?=$brand?> <?=$model?> <?=$series?></h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myOdometerChart"></canvas>
                                    </div>
                                    <hr>
                                    <!-- Styling for the area chart can be found in the
                                    <code>/js/demo/chart-area-demo.js</code> file. -->
                                </div>
                            </div>

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Total spent with: <?=$brand?> <?=$model?> <?=$series?></h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarOdometerChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-demo.js</code> file.
                                </div>
                            </div>

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the donut chart can be found in the
                                    <code>/js/demo/chart-pie-demo.js</code> file.
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <script>
             // my data from php:
             let count_odom=<?=$count_odometer?>;
            
             let last_odom = count_odom[count_odom.length - 1];
             let tot_lt= <?=$tot_lt?>;
             let tot_lt_um = <?=$tot_litri_um?>;
             let first_odom=count_odom[0];
             let tot_percorso= (first_odom-last_odom);
             console.log("il totale dei km percorsi è "+ last_odom + " meno " +first_odom+ " ovvero: " +tot_percorso);
            //calcolo somma dei lt caricati:
            tot_lt=tot_lt.map(Number);
             console.log(tot_lt);
           
            const litrisum = tot_lt.reduce(add, 0); // with initial value to avoid when the array is empty

            function add(accumulator, a) {
              return accumulator + a;
            }

            console.log(litrisum); 
            //calcolo km al lt:
            let km_lt= tot_percorso/litrisum;
            
            function formatNumber(number){
                return number_format(number, 2, '.');
            }
            
            km_lt= formatNumber(km_lt);
            
             console.log("i km al litro sono: "+ km_lt);
            // $('#myTot').html(sum+" "+tot_imp_um);
            
             //calcolo lt x 100km:
            let lt_x_100=(tot_percorso/litrisum)*100;
            let lt_x_2=lt_x_100.toFixed(2);



    let mydates=<?=$mydates?>;
    console.log(mydates);
let mydata=<?=$mydata?>;
let myOdometer=<?=$myOdometer?>;
let mytime=<?=$mytime?>;
var numdata = mydata.map(Number);
console.log(numdata);
//i valori min e max da inserire nelle tacchette verticali dei charts
var minData=numdata[0];
console.log(minData);
var maxData=numdata[6];
console.log(maxData);
var numOdometer = myOdometer.map(Number);
console.log(numOdometer);
// numOdometer=formatNumber(numOdometer);
//i valori min e max da inserire nelle tacchette verticali dei charts
var minOdom=numOdometer[0];
console.log(minOdom);
var maxOdom=numOdometer[6];
console.log(maxOdom);

let myvaluta=<?=$myvaluta?>;
//trasformo la mia valuta in '€' in caso di scrittura criptata del simbolo

// console.log(myvaluta);
let myMoney=<?=$myMoney?>;
//trasformo la valuta di myMoney (€ o $) in '€' in caso di scrittura criptata di quel simbolo
if (myMoney == '\u20AC') {
    document.write('\u20AC') ;
}
console.log(myMoney);
km_mi=(Object.values(myvaluta));
$("#tot_percorso").html(tot_percorso+ " " + km_mi);
$("#odometer_now").html(last_odom+ " " + km_mi);
$("#km_lt").html(km_lt+ " " + km_mi+"/"+tot_lt_um);
$("#lt_x_100").html(lt_x_2+ " " + tot_lt_um);
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
// var numericData = mydata.split(',').map(Number);
// console.log(numericData);
var ctx = document.getElementById("myOdometerChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: (Object.values(mydates)),
    datasets: [{
      label: "Total " +km_mi +" traveled",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: (Object.values(numOdometer)),
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include the tot_um sign in the ticks from the array extracted by php
          callback: function(value, index, values) {
            return number_format(value)+km_mi;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+km_mi;
        }
      }
    }
  }
});
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarOdometerChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: (Object.values(mydates)),
    datasets: [{
      label: "Total " +(Object.values(myMoney)) +" spent",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: (Object.values(numdata)),
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 10,
          padding: 5,
          // Include tot_um in the ticks
          callback: function(value, index, values) {
            return number_format(value)+(Object.values(myMoney)) ;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+(Object.values(myMoney));
        }
      }
    },
  }
});


</script>

</body>

</html>