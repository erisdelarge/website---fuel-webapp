<?php
include "config.php";
$id_driver = $_SESSION['id'];
include "callDatabase.php";
include "functions-database.php";
// include "database.php";
include "class-car.php";
// $database= new Database();
  //brand: commonly known as 'make' (toyota, opel, volkswagen, honda, ford ..)
  //model: (yaris, corolla, supra) for toyota (astra, corsa, zafira) for opel ..
  //series: usually grouped by generations (by release year)
  //engine: type of fuel (diesel, gasoline, methan gas, hybrid ..)
if (isset($_POST['brand']) && isset($_POST['model'])) {

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    };

    $brand = validate($_POST['brand']);
    $model = validate($_POST['model']);
    $series = validate($_POST['series']);
    $engine = validate($_POST['engine']);

    if (empty($brand)) {

        header("Location: car-add.php?error=Brand is required");

        exit();

    }else if(empty($model)){

        header("Location: car-add.php?error=Model is required");

        exit();

    }else if(empty($engine)){

        header("Location: car-add.php?error=engine is required");

        exit();

    }else{

        //check if data already exists in database
        // $sql = "SELECT * FROM cars WHERE brand='$brand'";

        // $result = mysqli_query($conn, $sql);
        // if (mysqli_num_rows($result) > 0) {

        //     $row = mysqli_fetch_assoc($result);
                

            // if ($brand==isset($row['brand']) && $model==isset($row['model']) && $series==isset($row['series']) && $engine==isset($row['engine'])) {

            //     header("Location: car-add.php?error=this car already exists");
            //     exit();
    
            // }
            //nn worka, anche se l'unico criterio uguale è solo il primo (brand)

        // }
          //do your insert code here or do something (run your code)
              // Taking all values from the form data(input)
              $driver = $_REQUEST['driver'];
              $license = $_REQUEST['license'];
              $image = $_REQUEST['image'];

            //   $id = $_REQUEST['id'];
              //encrypt password:
            //   $password = md5($password);

          
              // before with sql, after with car class:
            //   $sql = "INSERT INTO cars (brand, model, series, engine, driver, license, image, id_driver) VALUES ('$brand', '$model', '$series', '$engine', '$driver', '$license', '$image', $id_driver)";
            $carObj = new Car($brand, $model, $series, $engine, $driver, $license, $image, $id_driver);
            $car=$carObj->insert();
    //   before:
            //   if(mysqli_query($conn, $sql)){
                //   after, w function:
                // if ($database->dbQuery($sql) === TRUE) {
                    // before with sql, after with car class:
                        if($car===TRUE){
          
                  header("Location: dashboard.php");
      
              } else{
                echo "Error: " . $car->error;
                die();
              }

              // Close connection
              mysqli_close($conn);

    }

}


?>

