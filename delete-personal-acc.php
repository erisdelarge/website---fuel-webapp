<?php

include "config.php";
echo "hello!";
// include "callDatabase.php";
// include "functions-database.php";
// include "database.php";
include "class-utente.php";
// $database= new Database();
        if (isset($_GET['id'])) {        
            
            $id= $_GET['id'];
            echo $id;
                // before, w sql: 
            // $sql = "DELETE FROM users WHERE id=$id";
                // after, w class: 
            $userObj = new Utente($id);
            $user=$userObj->delete();
                // before, w sql: 
            
            // // before:
            // // $result = mysqli_query($conn, $sql);
            
            // // if ($result) {  
            //     // after, w functions:
            //     if ($database->dbQuery($sql) === TRUE) {   
            //     header("Location:logout.php");
            // // echo "uiiiiiiiiiii! you deleted all my data ^-^";
            // } else {
            //     echo "Error: " . $sql . "<br>" . $conn->error;
            //     die();
            // };

                // after, w class: 
            if($user===TRUE){
                header("Location:logout.php");
            } else{
                echo "Error: " . $user->error;
                die();
            }
        }
        $conn->close();
?>