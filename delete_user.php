<?php
// !!!      mi sa che sta pag è inutile ^^"   !!! \\\\\\\\\
include "config.php";
include "callDatabase.php";
if (isset($_POST)) {        
    // echo "entered";
    // $user_id= $_REQUEST['id'];
    // // echo $user_id;
    // $sql = "DELETE FROM users WHERE id=$user_id";
    // $result = mysqli_query($conn, $sql);
    // // echo $result;
    // //     $row = mysqli_fetch_assoc($result);
    // // echo $row;
    // // $id_user = $_REQUEST['id'];
    // // echo $id_user;
    // // $sql = "SELECT * FROM utenti WHERE id = $id_user";
    // if ($result) {     
    //     header("Location:users_table.php");
    //     // echo "uiiiiiiiiiii! you deleted all my data ^-^";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     die();
    // };
    // soluz with class User();
    $id=$_REQUEST['id'];
    $userObj = new Utente($id);
            $user=$userObj->delete();
            if($user===TRUE){
          
                // header("Location: dashboard.php");
                
                header("Location:dashboard.php?success=User successfully deleted");
                // nn worka il success message
                
    
            } else{
              echo "Error: " . $sql . "<br>" . $database->conn->error;
              die();
            }
}
$conn->close();

?>