<?php
include "config.php";
include "functions-database.php";
include "database.php";
$database= new Database();
$id = $_SESSION['id'];
// echo $id;
include "format_date.php";
// include "format_price.php";
include "connectDatabase.php";
   
$sql = "SELECT * FROM users";
// before:
    // $result = $conn->query($sql);
// after, w function:
$results = $database->dbSelect($sql);
// before:
    // if ($result->num_rows > 0) {
// after, w function:
if ($results > 0) {
    $list="";
    $deleteForms="";
    
    // output data of each row
// before:
    // while($row = $result->fetch_assoc()) {
// after, w function:
    foreach($results as $row) {
        if ($id == 1) {
            $action_edit= '<a style="text-decoration: none;" href="edituser-form.php?id='.$row["id"].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil text-primary" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
          </svg></a>';
          
            $action_delete= '<button type="button" class="eliminaUser" style="text-decoration: none; border: none; background-color: transparent;" data-id="'.$row["id"].'" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square text-danger" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg></button>';
          $tr_color= "#ccc"; $tr_text= "black";
          if ($row['id']==1){ $tr_color= "red"; $tr_text= "black"; $action_edit=""; $action_delete= ""; };
            $list.='<tr style="background-color: '.$tr_color.'; color: '.$tr_text.';" id="f-user'.$row["username"].'"><td id="name'.$row["id"].'">'.$row["firstname"]."</td><td>".$row["lastname"].'</td><td>'.$row["position"].'</td><td>'.$row["age"].'</td><td>'.formatDate($row["startdate"])."</td><td>".$row["salary"].'</td><td class="d-flex justify-content-around">'.$action_edit.$action_delete.'</td></tr>';
         
        } else {
               $list.="<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["position"]."</td><td>".$row["age"]."</td><td>".formatDate($row["startdate"])."</td><td>".$row["salary"]."</td><td>"."<span>actions disabled<br>admin only</span>"."</td></tr>";
            };    
    };    
} else {
    $list=""; 
    echo "0 results";
}
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

    <title><?=$_SESSION["username"]?> - Users Table</title>

    <?php require_once "include/head.php"?>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800"><?=$adminPrivilege?> Tables</h1>
                    <?php if (isset($_GET['success'])) { ?>

                    <p style="color:green;"><?php echo $_GET['success']; ?></p>

                    <?php } ?>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTables Example -->
                    <div class="card shadow my-4">
                        <div class="card-header py-3 row">
                            <h6 class="col-md-6 m-0 align-middle text font-weight-bold text-primary">DataTables Example</h6>
                            <div class="col-md-6">
                                    <a href="register-from-users-table.php" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text font-weight-bold text-primary">Add New User:</span>
                                    </a>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Position</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Position</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?= $list?>
                                    </tbody>
                                </table>
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
    
    <!-- delete user Modal-->
    
    <div class="modal fade" id="eliminaUser" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminaModalLabel">delete this user from the table</h5>
            <button type="button" class="btn-close chiudi-modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
            </button>
          </div>
          <div class="modal-body">
              Sei sicuro di voler eliminare l'utente <b style="text-transform: capitalize;" id="usernamee"></b>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary annulla">Annulla</button>
            <a href="" data-id="" id="yesElimina" class="btn btn-primary">Elimina</a>
            <!--qsto sarà il btn che avrà la function collegata x eliminare il champ-->
          </div>
        </div>
      </div>
    </div>
    
    

    <?php
    require_once "include/script.php"
    ?>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- delete user code js -->
    <script src="delete-user-code.js"></script>

</body>

</html>