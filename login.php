<?php
// session_start();
// require_once "checkLogin.php";

// $display = "d-none";
// $error = "";
// //if(count($_POST) > 0){
// if(isset($_POST["email"]) && isset($_POST["password"])){

//     if(checkLogin($_POST["email"], $_POST["password"])) {
//         $_SESSION["email"] = $_POST["email"];
//         header("Location: dashboard.php");
//     } else {
//         $display = "d-block";
//         $error = "Credenziali inesistenti!";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Session - Login</title>

   <?php require_once "include/head.php"?>
   

</head>
<body>
    
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user" method="POST" action="login_process_2.php">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address..."  name="email">
                                </div>
                                <div class="form-group text-center" id="show_hide_password">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password"  name="password">
                                    <span class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" name="sub" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                
                                <?php if (isset($_GET['error'])) { ?>

                                    <p style="color:red;"><?php echo $_GET['error']; ?></p>

                                    <?php } ?>
                                
                            </form>
                            <hr>
                                 
                            <div class="text-center">
                                <a class="small" href="register.php">Create an Account!</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
    
    <?php
    require_once "include/script.php"
    ?>
<script>
     $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
</script>
</body>

</html>