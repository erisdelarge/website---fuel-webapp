<?php
include "config.php";
include "class-car-id.php";
// echo $_SESSION['id'];
$id_driver = $_SESSION['id'];
// echo $id;

//  !!   other way to add retry to previous page function:   !!!!!!!
// $previous = "javascript:history.go(-1)";
// if(isset($_SERVER['HTTP_REFERER'])) {
//     $previous = $_SERVER['HTTP_REFERER'];
// }
//  !!   write $previous in a php inside the href=""  !!
include "connectDatabase.php";
            //  before, with sql: 

// $sql= "SELECT * FROM cars WHERE id_driver = $id";

            // after, with Car_id() class: -> 
$carObj= new Car_id($id_driver);
    $cars=$carObj->viewData();
    

            //  before, with sql: 

// $result = mysqli_query($conn, $sql);
//       if ($result->num_rows > 0) {

            //   after, with Car_id() class: ->
           
    if (count($cars)>0){
 //   var_dump ($cars);
          $carList="";
       
            // before, with sql:
        //   while($row = $cars->fetch_assoc()) {
      
        //       $carList.='<option value="'.$row['id'].'">'.$row['brand'].$row['model'].'</option>';
      
        //   };
        //   after, with Car_id() class using dbSelect: -> 
        foreach($cars as $car) {
            $carList.='<option value="'.$car['id'].'">'.$car['brand']." ".$car['model'].'</option>';
        }
    } else {
          header("Location: car-add.php?error=Add a car first!");
          };
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

    <title>Add Fill-up</title>
    <?php require_once "include/head.php"?>
    <!-- style for this page -->
    <link rel="stylesheet" href="fillup-style.css">
    

</head>

<body>

    <div class="container-lg">
    <div class="text-center d-flex bg-gradient-info p-3">
    
        <a class="h4 text-gray-100" style="text-decoration: none; padding: 0 5rem 0 3rem;" href="javascript:history.go(-1)">
        <i class="fa-solid fa-chevron-left"></i>
            </a>
    
        <div><h1 class="h4 text-gray-100 mx-5">Add new Fill-up:</h1></div>
    </div>
                            
        <!-- class="o-hidden" = "overflow-hidden" -->
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- dog image -->
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <!-- end dog image -->
                    <div class="col">
                        <!-- the class in the previous div was col-lg-7 before, to match the col-lg-5 with the dog image inside -->
                        <div class="p-5">
                            <!-- <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add new Fill-up:</h1>
                            </div> -->
                            <form class="user" method="POST" action="fill-up-action.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 f-input-div">
                                    <select class="form-control form-select f-select" name="car"><option disabled selected value>Select Car</option><?=$carList?></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 f-input-div">
                                        <input class="form-control f-orm-control f-input" type="date" name="date">
                                    </div>
                                    <div class="col-sm-6 f-input-div">
                                        <input class="form-control f-orm-control f-input" type="time"
                                        name="time">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 f-input-div d-flex">
                                            <input type="number" class="form-control f-orm-control f-input"
                                            name="odometer" placeholder="Odometer"><select class="f-select" name="od_um"><option value="km" selected>km</option><option value="mi" disabled>mi</option></select>
                                            <!-- onkeyup="formatPrice();" -->
                                    </div>
                                    <div class="col-sm-6 f-input-div d-flex">
                                        <input type="text" class="form-control f-orm-control f-input"
                                        required name="quantity" placeholder="Quantity"><select class="f-select" name="qu_um"><option value="lt" selected>lt</option><option value="gal" disabled>gal</option></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 f-input-div d-flex">
                                        <input type="text" class="form-control f-orm-control f-input"
                                        name="price" placeholder="Price lt/gal"><select class="f-select" name="pr_um"><option value="€/lt" selected>EUR/lt</option><option value="$/gal" disabled>USD/gal</option></select>
                                    </div>
                                    <div class="col-sm-6 f-input-div d-flex">
                                        <input type="number" class="form-control f-orm-control f-input"
                                        required name="total" placeholder="Total cost"><select class="f-select" name="tot_um"><option value="€" selected>EUR</option><option value="$" disabled>USD</option></select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="mt-3 col-sm-6 f-input-div">
                                        <input type="text" class="form-control f-orm-control f-input"
                                            name="station" placeholder="Filling station address">
                                    </div>
                                </div>
                                
                                <div class="box_contatti map">
                                    <h1>Gas Station</h1>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104995.0066185466!2d135.4159976953748!3d34.67757806999355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e0cd5c283afd%3A0xf01d07d5ca11e41!2sCastello%20di%20Osaka!5e0!3m2!1sit!2sit!4v1631634940917!5m2!1sit!2sit" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                                <div class="text-center d-block d-md-none">
                                <button type="submit" class="btn btn-success btn-circle btn-lg">
                                        <i class="fas fa-check"></i>
                                    </button></div>
                                <div class="text-lg-end d-none d-md-block" style="margin-right: 5rem;">
                                <button type="submit" class="btn btn-info btn-icon-split">
                                        <span class="icon text-gray-100">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Send Fill-up Record</span>
                                    </button>
                                <!-- <button type="submit" name="id" class="btn btn-lg btn-success btn-user btn-block">
                                       SEND
                                    </button> -->
                                </div>
                                <?php if (isset($_GET['error'])) { ?>

                                <p style="color:red;"><?php echo $_GET['error']; ?></p>

                                <?php } ?>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    require_once "include/script.php"
    ?>

</body>

</html>