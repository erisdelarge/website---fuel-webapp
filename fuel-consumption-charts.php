<?php
include "config.php";
include "functions-database.php";
include "database.php";
$database= new Database();

$id = $_SESSION['id'];

include "format_date.php";
include "connectDatabase.php";
$sql = "SELECT * FROM fillup_reports WHERE id_cardriver = $id";
$result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {

  $sql = "SELECT date
  FROM fillup_reports 
  WHERE id_cardriver = $id
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
  WHERE id_cardriver = $id
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
  WHERE id_cardriver = $id 
  ORDER BY fillup_reports.date DESC LIMIT 7";
  $res = $database->dbSelect($sql);
  foreach($res as $row){
      foreach($row as $key=>$value){
          $mydata[]=$row[$key];
      }
  }
  $mydata=json_encode($mydata);
  // var_dump($mydata);
  //pick tot_um from my table
  $sql = "SELECT tot_um
  FROM fillup_reports 
  WHERE id_cardriver=$id
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

}else{header("Location: dashboard.php?error=Add a new fill-up report (if you don't have any car registered yet, add a car before)");}
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

    <title><?=$_SESSION["username"]?> - Charts</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Expenses Charts</h1>
                    <p class="mb-4">Take a look at your consumptions!</p>
                    <?php if (isset($_GET['success'])) { ?>

                    <p style="color:green;"><?php echo $_GET['success']; ?></p>

                    <?php } ?>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Fuel Costs: Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myFuelChart"></canvas>
                                    </div>
                                    <hr>
                                    That's your latest report.
                                </div>
                            </div>
                            <!-- Styling for the area chart can be found in the /js/demo/chart-area-demo.js file. -->

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Fuel costs: Bar Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarFuelChart"></canvas>
                                    </div>
                                    <hr>
                                    That's your latest report.
                                    <!-- Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-demo.js</code> file. -->
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
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script>
        // my data from php:
    let mydates=<?=$mydates?>;
    console.log(mydates);
let mydata=<?=$mydata?>;
let mytime=<?=$mytime?>;
var numdata = mydata.map(Number);;
console.log(numdata);
let myvaluta=<?=$myvaluta?>;
if (myvaluta == '\u20AC') {
    document.write('\u20AC') ;
}
console.log(myvaluta);
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
var ctx = document.getElementById("myFuelChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: (Object.values(mydates)),
    datasets: [{
      label: "Total spent",
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
            return (Object.values(myvaluta)) + number_format(value);
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
          return datasetLabel + ': '+(Object.values(myvaluta)) + number_format(tooltipItem.yLabel);
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
var ctx = document.getElementById("myBarFuelChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: (Object.values(mydates)),
    datasets: [{
      label: "Total spent",
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
          maxTicksLimit: 5,
          padding: 10,
          // Include tot_um in the ticks
          callback: function(value, index, values) {
            return (Object.values(myvaluta)) + number_format(value);
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
          return datasetLabel + ': ' +(Object.values(myvaluta))+ number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

</script>

</body>

</html>