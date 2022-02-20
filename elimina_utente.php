<?php

include "config.php";
include "callDatabase.php";
include "functions-database.php";
// include "database.php";
// $database= new Database();
include "class-utente.php";
if (isset($_GET['id'])) {       
    //     // echo " ciaone";
    //     $id = $_GET['id'];
    //     echo $id;
    // $sql = "DELETE FROM users WHERE id=$id";
    // // before:
    // // $result = mysqli_query($conn, $sql);
    
    // // if ($result) { 
    // //     after, w function:
    //     if ($database->dbQuery($sql) === TRUE) {    
    //     header("Location:users_table.php");
        
    //     // echo "uiiiiiiiiiii! you deleted all my data ^-^";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     die();
    // };
     // soluz with class User();
     $id=$_GET['id'];
     $username=$_GET['nome'];
     echo $id;
     $userObj = new Utente($id);
     $user=$userObj->read();
     if (count($user)>0){
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        
             $user=$userObj->delete();
             if($user===TRUE){
           
                 // header("Location: dashboard.php");
                 
                 header("Location:users_table.php?success=User successfully deleted: ". $id .", ".$firstname." ".$lastname);
                 // nn worka il success message
                 
     
             } else{
               echo "Error: " . $user->error;
               die();
             }
     } else{
        echo "Error: 0 results" ;
        die();
           
        }
}

$conn->close();
?>