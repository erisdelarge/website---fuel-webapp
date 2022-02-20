<?php
include "config.php";
// echo $_SESSION['id'];
$id = $_SESSION['id'];
// echo $id;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register from Users Table</title>
    <?php require_once "include/head.php"?>

</head>

<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add User Profile:</h1>
                            </div>
                            <form class="user" method="POST" action="insert.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="first_name"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="examplePosition"
                                        name="position" placeholder="Position">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleAge"
                                        name="age" placeholder="Age">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" id="exampleStartDate"
                                        name="start_date" placeholder="Start Date">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleSalary"
                                        name="salary" placeholder="Salary">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                     name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleUserName" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Select Profile Image:</h1>
                                    <div class="form-group row">
    
                                        <div class="col-3 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage1" name="image" value="http://www.itshockeytime.net/img/undraw_profile_3.svg" checked>
                                                    <img class="rounded-circle" style="width: 65px;"
                                                    src="http://www.itshockeytime.net/img/undraw_profile_3.svg"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-3 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage2" name="image" value="https://source.unsplash.com/Mv9hjnEUHR4/60x60">
                                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-3 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage3" name="image" value="https://scontent.fpsr1-1.fna.fbcdn.net/v/t31.18172-8/fr/cp0/e15/q65/17972086_1866754863573391_4758387093733366191_o.jpg?_nc_cat=101&ccb=1-5&_nc_sid=85a577&efg=eyJpIjoidCJ9&_nc_ohc=EMx2DHxNrTkAX_ppdOs&tn=OX_HpFHVwCtKdgpf&_nc_ht=scontent.fpsr1-1.fna&oh=00_AT9DWTf5Tq0TJsEm7SwSrsncIWFD7RagmwbKmcBTLKf_Qg&oe=6220A119">
                                                    <img class="rounded-circle" style="width: 60px;" src="https://scontent.fpsr1-1.fna.fbcdn.net/v/t31.18172-8/fr/cp0/e15/q65/17972086_1866754863573391_4758387093733366191_o.jpg?_nc_cat=101&ccb=1-5&_nc_sid=85a577&efg=eyJpIjoidCJ9&_nc_ohc=EMx2DHxNrTkAX_ppdOs&tn=OX_HpFHVwCtKdgpf&_nc_ht=scontent.fpsr1-1.fna&oh=00_AT9DWTf5Tq0TJsEm7SwSrsncIWFD7RagmwbKmcBTLKf_Qg&oe=6220A119"
                                                    alt="...">
                                            </label>
                                        </div>
                                        <div class="col-3 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage4" name="image" value="https://i.pinimg.com/originals/56/46/db/5646dbe8f61faf8184f00c49384dde30.jpg">
                                                    <img class="rounded-circle" style="width: 60px;" src="https://i.pinimg.com/originals/56/46/db/5646dbe8f61faf8184f00c49384dde30.jpg"
                                                    alt="...">
                                            </label>
                                        </div>
                                    
                                    </div>
                                </div>
                                <button type="submit" name="id" class="btn btn-primary btn-user btn-block">
                                    Register User Profile
                                </button>
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