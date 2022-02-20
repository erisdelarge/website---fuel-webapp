<?php
include "config.php";
// include "callDatabase.php";
include "class-edit-user.php";
/// !!!!! QUESTO è l' EDIT USER dell' ADMIN per tutti gli UTENTI !!!!!!(dall'USER_TABLE)    \\\\\\\\\
if(isset($_POST)){
        // $get_id_user = $_REQUEST[$id_user];
        $get_id_user = $_GET['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $position = $_POST['position'];
        $age = $_POST['age'];
        $startdate = $_POST['startdate'];
        $salary = $_POST['salary'];
// before w sql:
        // $sql = "SELECT * FROM users WHERE id=$get_id_user";     
        // $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($result);
    //   var_dump($row);
// after w class:
        $userObj= new editUser($firstname, $lastname, $position, $age, $startdate, $salary, $get_id_user);
        $user=$userObj->read(); 
        var_dump($user)
;

//if inputs are sent empty:
        $emptyFirstname= empty($_REQUEST['firstname']);
        $emptyLastname= empty($_REQUEST['lastname']);
        $emptyPosition= empty($_REQUEST['position']);
        $emptyAge= empty($_REQUEST['age']);
        $emptyStartdate= empty($_REQUEST['startdate']);
        $emptySalary= empty($_REQUEST['salary']);
//before it was row['firstname, lastname etc'], now it is user['data']
        $myFirstname= $emptyFirstname ? $user['firstname'] : $firstname;
        $myLastname= $emptyLastname ? $user['lastname'] : $lastname;
        $myPosition= $emptyPosition ? $user['position'] : $position;
        $myAge= $emptyAge ? $user['age'] : $age;
        $myStartdate= $emptyStartdate ? $user['startdate'] : $startdate;
        $mySalary= $emptySalary ? $user['salary'] : $salary;
        // echo $mySalary;
        
// before, w sql: 
        // $sql = "UPDATE users SET firstname='$myFirstname', lastname='$myLastname', position='$myPosition', age=$myAge, startdate='$myStartdate', salary='$mySalary' WHERE id=$get_id_user";
        // $res = $conn->query($sql);
        // if($res) {			  
        //     header("Location: users_table.php");
    
        // } else{
        // echo "ERROR: Hush! Sorry $sql. "
        //     . mysqli_error($conn);
        //     die();
            
        // }
// after, w class editUser() -> 
    //     $userObj= new editUser($myFirstname, $myLastname, $myPosition, $myAge, $myStartdate, $mySalary, $get_id_user);
        $readuser=$userObj->editUser(); 
        if($readuser===TRUE){
            header("Location: users_table.php");
        } else{
            echo "ERROR: Hush! Sorry $user. ";
        }
    $conn->close();
}       

/// !!!!  C E  L ' H O   F A T T A  !!!!!!    H O   I N S E R I T O   D U E   A Z I O N I   C H E    R I C H I A M A N O   U N A   C L A S S   N E L L O  S T E S S O    F I L E   !!!!!!    ^ 0 ^      \\\\\\\\\\\
?>

