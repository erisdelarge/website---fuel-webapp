<?php
include "config.php";
include "connectDatabase.php";
$id= $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id= $id";
$result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
        }
        $salary = $row['salary'];
        $position = $row['position'];
        $age = $row['age'];
        $username = $row['username'];
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

    <title><?=$_SESSION["username"]?> - Profile</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Profile Settings</h1>

                </div>
                <!-- /.container-fluid -->

                <!-- form change profile settings -->
                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Change Profile Settings:</h1>
                            </div>
                            <form class="user" method="POST" action="modify-profile-settings.php?id=<?=$_SESSION['id']?>">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="examplePosition"
                                        name="position" placeholder="Position" value="<?php echo $position?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleAge"
                                        name="age" placeholder="Age" value="<?php echo $age?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" id="exampleStartDate"
                                        name="start_date" placeholder="Start Date">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleSalary"
                                        name="salary" placeholder="Salary" value="<?php echo $salary?>">
                                    </div>
                                </div>
                                
<!--                                 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputCity" name="city" placeholder="City">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleUserAddress" required name="address" placeholder="Address">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="tel" class="form-control form-control-user"
                                            id="exampleInputPhone" name="phone" placeholder="Tel.">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleUserName" name="username" placeholder="Username" value="<?php echo $username?>">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Select Profile Image:</h1>
                                    <div class="form-group row">
    
                                        <div class="col-3 mb-3 mb-sm-0">
                                            <label>
                                                <input type="radio" 
                                                    id="exampleInputImage1" name="image" value="http://www.itshockeytime.net/img/undraw_profile_3.svg">
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
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Save Profile Settings
                                </button>
                                <?php if (isset($_GET['error'])) { ?>

                                <p style="color:red;"><?php echo $_GET['error']; ?></p>

                                <?php } ?>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end form -->

                

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

</body>

</html>