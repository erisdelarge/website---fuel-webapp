<?php
include "config.php";
include "class-change-color.php";
if(isset($_SESSION['id'])){
    
    
    $id = $_SESSION['id'];
    $db_color = "bg-gradient-dark";
    $text_color = "sidebar-dark";
    $navbar_text = "navbar-dark";
    $car_border_color= "border-left-dark";
	$car_text_color= "text-dark";
    
  
    $userColorObj= new UserColors($db_color, $text_color, $navbar_text, $car_border_color, $car_text_color, $id);
    $userColor=$userColorObj->update();
    
    
    if($userColor===TRUE){			  
        header("Location: utilities-color.php");

    } else{
    echo "ERROR: Hush! Sorry $user. ";
        
    }
    

    // //this'll send the new statistics to the jquery code
    // $sql = "SELECT 'db_color', 'text_color' FROM `users` WHERE `id`='$id'";
    // $result = mysqli_query($conn, $sql);
    //     $row = mysqli_fetch_assoc($result);
    // // echo json_encode($results);
    // if($result) {			  
    //     header("Location: dashboard.php");
    //     // echo json_encode($results);
    // } else{
    // echo "ERROR: Hush! Sorry $sql. "
    //     . mysqli_error($conn);
        
    //     header("Location: profile-settings.php");
 // };
};  
?>