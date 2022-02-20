<?php
include "config.php";

if(isset($_SESSION['id'])){
    
    include "callDatabase.php";
    $id = $_SESSION['id'];
    $color = "bg-gradient-secondary";
    $textcolor = "sidebar-dark";
    $sql = "UPDATE users SET db_color='$color', text_color='$textcolor' WHERE id='$id'";
    $res = $conn->query($sql);

    $mysql = "SELECT 'db_color', 'text_color' FROM `users` WHERE `id`='$id'";
    $result = mysqli_query($conn, $mysql);
    $row = mysqli_fetch_assoc($result);
     
    $_SESSION['db_color'] = $row['db_color'];
    $_SESSION['text_color'] = $row['text_color'];


    $res = $conn->query($mysql);
    
    // if($result){
	if($res) {			  
        header("Location: dashboard.php");

    } else{
    echo "ERROR: Hush! Sorry $mysql. "
        . mysqli_error($conn);
        // header("Location: profile-settings.php");
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