
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome!</title>

    <?php require_once "include/head.php"?>
    <style>
        .f-body {
            margin: 0;
            background-image: url("img/bg/bg.jpg");
            background-color: #cccccc;
            background-size: cover;
            overflow: hidden;
            /* width: 300px;
            height: 300px; */
        }
        .f-luid{
            margin: 200px auto 5px;
            

        }
        .f-card{
            background-color: rgba(233, 233, 233, 0.5);
            border: none;
        }
        h1{
            font-size: 150px;
        }
        .f-welcome{
            color: #303275;
        }
        .f-p-1{
            font-size: 30px;
            

        }
        .f-p-2{
            font-size: 22px;
            color: #1ac6b1;
            font-weight: 600;
        }
        .f-p-3{
            font-size:21px;

        }
        .f-links{
            margin: 4rem auto;
            
            text-decoration: none;
        }
        h5 {
            width: 400px;
            margin: 0 auto;
            padding: 1rem;
            background-color: #A9CCE3;
            border-radius: 5px;
        }
        .f-a-link {
            color: #FBFCFC;
            font-weight: 600;
            
        }
        .f-a-link:hover {
            color:#303275;
            font-weight: 600;
            text-decoration: none;
            
            
        }
        .f-a-link-i {
            color: #ECF0F1;
            font-weight: 600;
            
        }
        h5:hover{
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2);
            
        }
        
    </style>

</head>

<body id="page-top" class="f-body">

    <!-- Page Wrapper -->
    

        <!-- Sidebar -->
        <!-- include "sidebar.php" -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        

            <!-- Main Content -->
           

                <!-- Topbar -->
                <!-- include "topbar.php" -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid f-luid">

                 <div class="card f-card">
                        <!-- 404 Error Text -->
                        <div class="text-center f-welcome">
                            <h1>WELCOME!</h1>
                            <p class="lead text-gray-800 mb-5 f-p-1">to my experimental webapp</p>
                            <p class="mb-0 f-p-2">“Not all those who wander are lost.”</p>
                            <div class="f-links">
                            <p class="m-1 f-p-3">What can you try for first?</p>
                            <p>Of course to:</p>
                            <a class="f-a-link" href="login.php"><h5 class="mb-1"><i class="fa-solid fa-arrow-right-to-bracket fa-sm fa-fw mr-2 f-a-link-i"></i>Login</h5></a><p>or:</p><a class="f-a-link" href="register.php"><h5><i class="fa-solid fa-user-plus fa-sm fa-fw mr-2 f-a-link-i"></i>Sign Up</h5></a>
                                
                                <!-- <div></div> -->
                            </div>
                        </div>
    
                    </div>
                    <!-- /.container-fluid -->
    
             
                <!-- End of Main Content -->
    
                <!-- Footer -->
                <footer class="sticky-footer mt-5 mb-0">
                    <div class="mx-auto">
                        <div class="copyright text-center">
                            <div class="mb-2"><span>Copyright &copy; Your Website 2020</span></div>
                            
                            <a class="f-a-footer text-gray-600" href='https://www.freepik.com/vectors/background'>Background vector created by freepik - www.freepik.com</a>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
                 </div>

       
        <!-- End of Content Wrapper -->

   
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->

    <!-- Logout Modal-->
    <?= include "logout_modal.php" ?>

    <?php
    require_once "include/script.php"
    ?>

</body>

</html>