<?php
include "config.php";
// echo $_SESSION['id'];
$id = $_SESSION['id'];
// echo $id;

//  !!   other way to add retry to previous page function:
// $previous = "javascript:history.go(-1)";
// if(isset($_SERVER['HTTP_REFERER'])) {
//     $previous = $_SERVER['HTTP_REFERER'];
// }
//  !!   write $previous in a php inside the href=""  !!
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Car</title>
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
    
        <div><h1 class="h4 text-gray-100 mx-5">Add new Car:</h1></div>
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
                            <form class="user" method="POST" action="car-add-action.php">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 f-input-div">
                                        <input class="form-control f-orm-control f-input" type="text" name="brand" placeholder="Brand">
                                    </div>
                                    <div class="col-sm-6 f-input-div">
                                        <input class="form-control f-orm-control f-input" type="text"
                                        name="model" placeholder="Model">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 f-input-div d-flex">
                                            <input type="text" class="form-control f-orm-control f-input"
                                            name="series" placeholder="series (optional)">
                                    </div>
                                    <div class="col-sm-6 f-input-div d-flex">
                                        <input type="text" class="form-control f-orm-control f-input"
                                        name="engine" placeholder="Engine">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 f-input-div d-flex">
                                            <input type="text" class="form-control f-orm-control f-input"
                                            name="driver" placeholder="Driver (optional)">
                                    </div>
                                    <div class="col-sm-6 f-input-div d-flex">
                                        <input type="text" class="form-control f-orm-control f-input"
                                        name="license" placeholder="License Plate (optional)">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Select an Image:</h1>
                                    <div class="form-group row">
    
                                        <div class="col-6 col-md-2 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage0" name="image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShAg_R54aavMZwOvGAgPNXoJumZuvrIN118GziumQlaaFNcJyxNvipj-GUPBuieQqsbW8&usqp=CAU" checked>
                                                    <img class="rounded-circle" style="width: 100px; height: 100px;"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShAg_R54aavMZwOvGAgPNXoJumZuvrIN118GziumQlaaFNcJyxNvipj-GUPBuieQqsbW8&usqp=CAU"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-6 col-md-2 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage1" name="image" value="https://360view.hum3d.com/zoom/Lamborghini/Lamborghini_Gallardo_LP570-4_Superleggera_2011_1000_0001.jpg" checked>
                                                    <img class="rounded-circle" style="width: 100px; height: 100px;"
                                                    src="https://360view.hum3d.com/zoom/Lamborghini/Lamborghini_Gallardo_LP570-4_Superleggera_2011_1000_0001.jpg"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-6 col-md-2 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage2" name="image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTerorf3Z49ocoqBegDdYsK-bzUztILV6LbUQ&usqp=CAU">
                                                    <img class="rounded-circle" style="width: 100px; height: 100px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTerorf3Z49ocoqBegDdYsK-bzUztILV6LbUQ&usqp=CAU"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-6 col-md-2 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage3" name="image" value="https://w7.pngwing.com/pngs/228/771/png-transparent-range-rover-sport-land-rover-car-range-rover-evoque-rover-company-land-rover-vehicle-transport-range-rover-autobiography.png">
                                                    <img class="rounded-circle" style="width: 100px; height: 100px;" src="https://w7.pngwing.com/pngs/228/771/png-transparent-range-rover-sport-land-rover-car-range-rover-evoque-rover-company-land-rover-vehicle-transport-range-rover-autobiography.png"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-6 col-md-2 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage4" name="image" value="https://cdn.jdpower.com/ChromeImageGallery/Expanded/Transparent/640/2021BMC08_640/2021BMC080001_640_01.png">
                                                    <img class="rounded-circle" style="width: 100px; height: 100px;" src="https://cdn.jdpower.com/ChromeImageGallery/Expanded/Transparent/640/2021BMC08_640/2021BMC080001_640_01.png"
                                                    alt="...">
                                            </label>
                                        </div>
                                    
                                    </div>
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
                                        <span class="text">Save Car</span>
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