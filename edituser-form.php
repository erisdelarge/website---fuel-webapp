<?php
include "config.php";
            // before, w sql: 
include "connectDatabase.php";


$id_admin= $_SESSION['id'];
if (isset($_GET['id'])){
//id dell user da editare:
$id_user = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id_user";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
}
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$salary = $row['salary'];
$position = $row['position'];
$age = $row['age'];
$username = $row['username'];

}else {
    header("Location: users_table.php");
    echo "can't find user id";
}
            // after, w class Utente():
// include "class-utente.php";
// if (isset($_GET['id'])){
//     // //id dell user da editare:
//     $id = $_GET['id'];
//     $userObj= new Utente($id);
//     $user=$userObj->read();
//     if (count($user)>0){
//         $firstname = $user['firstname'];
//         $lastname = $user['lastname'];
//         $salary = $user['salary'];
//         $position = $user['position'];
//         $age = $user['age'];
//         $username = $user['username'];
//     } else{
//         echo "Error: 0 results" ;
//         die();
        
//     }
// }
/// !!! nn capisco perché il metodo con class mi prende qui i dati giusti, ovvero dell'user da editare, ma inviando la richiesta a edit_user.php, questo riceve i dati dell'Admin, e di conseguenza edita quelli.


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Edit Form - <?=$id_user?>° User</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Users Table - Edit</h1>

                </div>
                <!-- /.container-fluid -->
                <!-- form change profile settings -->
                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit User Data:</h1>
                            </div>
                            <form class="user" method="POST" action="edit_user.php?id=<?=$id_user?>"> 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="firstname" placeholder="First name" value="<?php echo $firstname?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="lastname" placeholder="Last name" value="<?php echo $lastname?>">
                                    </div>
                                </div>
                                <div class="form-group row">    
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="examplePosition"
                                        name="position" placeholder="position" value="<?php echo $position?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user"
                                            id="exampleAge" name="age" placeholder="age" value="<?php echo $age?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user"
                                            id="exampleStartDate" name="startdate" placeholder="start date" value="<?php echo $startdate?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleSalary"
                                        name="salary" placeholder="salary" value="<?php echo $salary?>">
                                    </div>    
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Send Edit
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