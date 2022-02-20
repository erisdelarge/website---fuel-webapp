<?php
include "config.php";
include "functions-database.php";
// include "database.php";
// $database= new Database();
include "class-fillup.php";
$id_cardriver = $_SESSION['id'];
include "callDatabase.php";
  //brand: commonly known as 'make' (toyota, opel, volkswagen, honda, ford ..)
  //model: (yaris, corolla, supra) for toyota (astra, corsa, zafira) for opel ..
  //series: usually grouped by generations (by release year)
  //engine: type of fuel (diesel, gasoline, methan gas, hybrid ..)
if (isset($_POST['car']) && isset($_POST['quantity']) && isset($_POST['total'])) {

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    };

    $car = validate($_POST['car']);
    $date = validate($_POST['date']);
    $time = validate($_POST['time']);
    $odometer = validate($_POST['odometer']);
    $od_um = validate($_POST['od_um']);
    $quantity = validate($_POST['quantity']);
    $qu_um = validate($_POST['qu_um']);
    $price = validate($_POST['price']);
    $pr_um = validate($_POST['pr_um']);
    $total = validate($_POST['total']);
    $tot_um = validate($_POST['tot_um']);

    if (empty($car)) {

        header("Location: fill-up-add.php?error=car is required");

        exit();

    }else if(empty($date)){

        header("Location: car-add.php?error=date is required");

        exit();

    }else if(empty($time)){

        header("Location: car-add.php?error=time is required");

        exit();

    }else if(empty($odometer)){

        header("Location: car-add.php?error=odometer is required");

        exit();

    }else if(empty($quantity)){

        header("Location: car-add.php?error=quantity is required");

        exit();

    }else if(empty($total)){

        header("Location: car-add.php?error=total is required");

        exit();

    }else{

        //check if data already exists in database <-- nn mi fa workare l'upload su database
        // $sql = "SELECT * FROM fillup_reports WHERE id_car='$car' AND date='$date' AND time='$time AND id_cardriver=$id";

        // $result = mysqli_query($conn, $sql);
        // if (mysqli_num_rows($result) > 0) {

        //     $row = mysqli_fetch_assoc($result);
                

        //     // if ($brand==isset($row['brand']) && $model==isset($row['model']) && $series==isset($row['series']) && $engine==isset($row['engine'])) {

        //     //     header("Location: car-add.php?error=this car already exists");
        //     //     exit();
    
        //     // }

        // }
          //do your insert code here or do something (run your code)
              // Taking all values from the form data(input)
              
            //   $datetime = $date.' '.$time;
              
              $quant = floatval($quantity);
              $pri = floatval($price);
              $tot = floatval($total);
              
              $myquantity = formatNumber($quant);
              $myprice = formatNumber($pri);
              $mytotal = formatNumber($tot);

              $station = $_REQUEST['station'];
            //nn mi worka il formatPrice --> Fatal error: Uncaught TypeError: number_format(): Argument #1 ($num) must be of type float, string given in D:\xampp\htdocs\infobasic\Fuel-consumption-app\pages\functions-database.php:97 Stack trace: #0 D:\xampp\htdocs\infobasic\Fuel-consumption-app\pages\functions-database.php(97): number_format('12,57', 2, ',', '.') #1 D:\xampp\htdocs\infobasic\Fuel-consumption-app\pages\fill-up-action.php(101): formatPrice('12,57') #2 {main} thrown in D:\xampp\htdocs\infobasic\Fuel-consumption-app\pages\functions-database.php on line 97

            //   $id = $_REQUEST['id'];
              //encrypt password:
            //   $password = md5($password);

          
              // Performing insert query execution
          // solution using sql:
              // $sql = "INSERT INTO fillup_reports (id_car, date, time, odometer, od_um, quantity, qu_um, price, pr_um, total, tot_um, station, id_cardriver) VALUES ($car, '$date', '$time', $odometer, '$od_um', $quantity, '$qu_um', $price, '$pr_um', $total, '$tot_um', '$station', $id_cardriver)";
              // if ($conn->query($sql) === TRUE){
          
              //     header("Location: dashboard.php");
      
              // } else{
              // echo "ERROR: Hush! Sorry $sql. "
              //     . mysqli_error($conn);
              // }

          // solution using class Fillup() ->
            $fillupObj = new Fillup($car, $date, $time, $odometer, $od_um, $myquantity, $qu_um, $myprice, $pr_um, $mytotal, $tot_um, $station, $id_cardriver);
            $fillup=$fillupObj->insert();
            if($fillup===TRUE){
          
                header("Location: fuel-consumption-charts.php?success=! - New fillup report added to the charts");
    
            } else{
              echo "Error: " . $sql . "<br>" . $fillup->error;
              die();
            }

              // Close connection
              mysqli_close($conn);

    }

}


?>

