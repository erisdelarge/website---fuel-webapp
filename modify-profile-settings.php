<?php
include "config.php";
include "callDatabase.php";

        
        $id= $_SESSION['id'];
        $email= $_SESSION['email'];
        //perche l email me la prende easy e l'id me lo prende solo se glielo passo nel button submit name??????? ma porcoquelclero
        $position = $_REQUEST['position'];
        $age = $_REQUEST['age'];
        $startdate = $_REQUEST['start_date'];
        $salary = $_REQUEST['salary'];
        // $city = $_REQUEST['city'];
        // $address = $_REQUEST['address'];
        // $phone = $_REQUEST['phone'];
        $username = $_REQUEST['username'];
        $image = $_REQUEST['image'];

        $sql = "SELECT * FROM users WHERE email='$email' AND id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);


        $emptyPosition= empty($_REQUEST['position']);
        $emptyAge= empty($_REQUEST['age']);
        $emptyStartDate= empty($_REQUEST['start_date']);
        $emptySalary= empty($_REQUEST['salary']);
        $emptyUsername= empty($_REQUEST['username']);
        $emptyImage= empty($_REQUEST['image']);
        $myPosition= $emptyPosition ? $row['position'] : $_REQUEST['position'];
        $myAge= $emptyAge ? $row['age'] : $_REQUEST['age'];
        $myStartDate= $emptyStartDate ? $row['startdate'] : $_REQUEST['start_date'];
        $mySalary= $emptySalary ? $row['salary'] : $_REQUEST['salary'];
        $myUsername= $emptyUsername ? $row['username'] : $_REQUEST['username'];
        $myImage= $emptyImage ? $row['image'] : $_REQUEST['image'];
        $sql = "UPDATE users SET position='$myPosition', age='$myAge', startdate='$myStartDate',  salary='$mySalary', username='$myUsername', image='$myImage' WHERE id='$id'";
       
    //city='$city', rue='$address', phone='$phone', WHERE id='$id'
    $res = $conn->query($sql);
    //aggiorniamo i dati updatati irl:
    $mysql = "SELECT * FROM `users` WHERE `id`='$id'";
    $result = mysqli_query($conn, $mysql);
    $row = mysqli_fetch_assoc($result);
     
    $_SESSION['username'] = $row['username'];
    $_SESSION['image'] = $row['image'];
    
    ////    !!! dei seguenti dati non c'è bisogno di updatarli qui perché nella users_table i dati si updatano sempre irl, perché la php function di riempimento della tabella è direttamente nel file users_table.php e parte al caricamento della pag !!! \\\\\
    // $_SESSION['age'] = $row['age'];
    // $_SESSION['position'] = $row['position'];
    // $_SESSION['startdate'] = $row['startdate'];
    // $_SESSION['salary'] = $row['salary'];


    $result = $conn->query($mysql);
    
    // if($result){
	if($result) {			  
        header("Location: dashboard.php");

    } else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
        // header("Location: profile-settings.php");
    }

    $conn->close();
// second try start
// include "config.php";
// include "connectDatabase";
// if(isset($_POST['Submit'])) 
// {$result = mysqli_query($conn, $sql);
//     // $email=($_SESSION["email"]);
//     $position = $_REQUEST['position'];
//     $age = $_REQUEST['age'];
//     $start_date = $_REQUEST['start_date'];
//     $salary = $_REQUEST['salary'];
//     $city = $_REQUEST['city'];
//     $address = $_REQUEST['address'];
//     $phone = $_REQUEST['phone'];
//     $username = $_REQUEST['username'];
//     $image = $_REQUEST['image'];
//     $query = "UPDATE `users` SET `city` = '$city' WHERE `email` = 'emily_buttercup@gmail.com'"; 
//     $result = mysqli_query($connection,$query); 

//     if (!$result) {
//     die('Error' . mysqli_error($connection));
//     }
//     else
//     {
//     echo "Successfully updated";
//     header("Location: profile-settings.php");
//     }
// }
//second try end


//first try start

//     function validate($data){
		
//         $data = trim($data);

//         $data = stripslashes($data);

//         $data = htmlspecialchars($data);

//         return $data;

//     };
//     $email=($_SESSION["email"]);
//     $sql = "SELECT * FROM users WHERE email='$email'";
//     $result = mysqli_query($conn, $sql);
// $position = $_REQUEST['position'];
// $age = $_REQUEST['age'];
// $start_date = $_REQUEST['start_date'];
// $salary = $_REQUEST['salary'];
// $city = $_REQUEST['city'];
// $address = $_REQUEST['address'];
// $phone = $_REQUEST['phone'];
// $username = $_REQUEST['username'];
// $image = $_REQUEST['image'];
// $sql = "UPDATE users SET city=$city WHERE email=$email";
// if ($conn->query($sql) === TRUE) {
//     header("Location: profile-settings.php");
// } else {
//   echo "Error updating record: " . $conn->error;
// }
//   // Close connection
//   mysqli_close($conn);
// // $conn->close();


// // $sql = "UPDATE users SET position='$position', age='$age', startdate='$start_date', salary='$salary', city='$city', rue='$address', phone='$phone', username='$username', image='$image' WHERE email=$email";

//first try end


?>