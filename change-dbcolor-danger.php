<?php
include "config.php";
include "class-change-color.php";
// include "class-utente.php";
if(isset($_SESSION['id'])){
    // include "callDatabase.php";
    // include "database.php";
    // $database= new Database();
    $id = $_SESSION['id'];
    $db_color = "bg-gradient-danger";
    $text_color = "sidebar-dark";
    $navbar_text = "navbar-dark";
    $car_border_color= "border-left-danger";
	$car_text_color= "text-danger";
            // before, w sql: 
    // $sql = "UPDATE users SET db_color='$db_color', text_color='$text_color', navbar_text='$navbar_text', car_border_color='$car_border_color', car_text_color='$car_text_color' WHERE id='$id'";
    // $res = $conn->query($sql);
            // after, w class UserColors():
    $userColorObj= new UserColors($db_color, $text_color, $navbar_text, $car_border_color, $car_text_color, $id);
    $userColor=$userColorObj->update(); 
//dice che richiamo il database. ma io non lo richiamo!!!!!!!!!!!
    if($userColor===TRUE){
        header("Location: utilities-color.php");
        // $userColorObj= new UserColors($id);
        // $userColorChanged=$userColorObj->read();
        // if (count($userColorChanged)>0){
        //     $_SESSION['db_color'] = $userColorChanged['db_color'];
        //     $_SESSION['text_color'] = $userColorChanged['text_color'];
        //     $_SESSION['navbar_text'] = $userColorChanged['navbar_text'];
        //     $_SESSION['car_border_color'] = $userColorChanged['car_border_color'];
        //     $_SESSION['car_text_color'] = $userColorChanged['car_text_color'];
            
        // } else{
        //     echo "Error: 0 results" ;
        //     die();
            
        // }
  
        // $userObj= new Utente($id);
        // $user=$userObj->read();
        // $userColor=$userColorObj->read(); 
    
    ///  !!    n n    W O R K A V A      !!!!!!!!!!!!!!!!!!!!!
        // var_dump ($user);
//   errore che mi esce se tolgo i ="" e =0 nella function__construct(dati traparentesi $firstname $lastname etc) nel file class-user.php -->      
// Fatal error: Uncaught ArgumentCountError: Too few arguments to function User::__construct(), 1 passed in D:\xampp\htdocs\infobasic\fuel\Fuelapp-w-class\pages\change-dbcolor-danger.php on line 18 and exactly 11 expected in D:\xampp\htdocs\infobasic\fuel\Fuelapp-w-class\pages\class-user.php:18 Stack trace: #0 D:\xampp\htdocs\infobasic\fuel\Fuelapp-w-class\pages\change-dbcolor-danger.php(18): User->__construct('31') #1 {main} thrown in D:\xampp\htdocs\infobasic\fuel\Fuelapp-w-class\pages\class-user.php on line 18
        // if (count($userColor)>0){
        //     $_SESSION['db_color'] = $user['db_color'];
        //     $_SESSION['text_color'] = $user['text_color'];
        //     $_SESSION['navbar_text'] = $user['navbar_text'];
        //     $_SESSION['car_border_color'] = $user['car_border_color'];
        //     $_SESSION['car_text_color'] = $user['car_text_color'];
        
            // echo$_SESSION['car_text_color'];

            // header location: --->

            // header("Location: utilities-color.php");
    



        // $mysql = "SELECT * FROM `users` WHERE `id`='$id'";
        // $result = mysqli_query($conn, $mysql);
        // $row = mysqli_fetch_assoc($result);
        
        // $_SESSION['db_color'] = $row['db_color'];
        // $_SESSION['text_color'] = $row['text_color'];
        // $_SESSION['navbar_text'] = $row['navbar_text'];
        // $_SESSION['car_border_color'] = $row['car_border_color'];
        // $_SESSION['car_text_color'] = $row['car_text_color'];


        // $result = $conn->query($mysql);
        
        
        // if($result) {			  
        //     header("Location: utilities-color.php");

        // } else{
        // echo "ERROR: Hush! Sorry $mysql. "
        //     . mysqli_error($conn);
        //     // header("Location: profile-settings.php");
        // }
        // } else{
        //     echo "Error: 0 results" ;
        //     die();
            
        // }
    } else{
        echo "ERROR: Hush! Sorry $user. ";
            // header("Location: profile-settings.php");
        }

};  
?>