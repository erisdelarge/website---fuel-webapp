<?php

session_start ();
include("connectDatabase.php"); 
if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    };

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($email)) {

        header("Location: login.php?error=Email is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{
        
       

    // before, encrypt password w md5: 
        //    $pass = mysqli_real_escape_string($conn, $_POST["password"]);  
        //    $pass = md5($pass);
    // after, encrypt pass w sanature key:
            $sntkey= "Dj3XyJH.%QT&Wt411\FfBDw6?3RYgP";
            $password= hash("sha512", $sntkey.$pass);
            // $password=$pass;
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['pass'] === $password) {

                
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                
                $_SESSION['position'] = $row['position'];
                $_SESSION['age'] = $row['age'];
                $_SESSION['startdate'] = $row['startdate'];
                $_SESSION['salary'] = $row['salary'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['pass'] = $row['pass'];
               
                $_SESSION['username'] = $row['username'];
                
                $_SESSION['image'] = $row['image'];
                $_SESSION['db_color'] = $row['db_color'];
                $_SESSION['text_color'] = $row['text_color'];
                $_SESSION['navbar_text'] = $row['navbar_text'];
                $_SESSION['car_border_color'] = $row['car_border_color'];
                $_SESSION['car_text_color'] = $row['car_text_color'];
                
                $_SESSION['id'] = $row['id'];

                // $_SESSION['name'] = $row['name'];

                // $_SESSION['id'] = $row['id'];

                header("Location: dashboard.php");

                exit();
                // $mysql = "SELECT * FROM colors WHERE id=2";
                // $res = mysqli_query($conn, $mysql);
                // $row = mysqli_fetch_assoc($res);
                // $_SESSION['bgcolor'] = $row['bgcolor'];
                // $_SESSION['text_color'] = $row['text_color'];
                
        
                // exit();
        
                

            }else{

                header("Location: login.php?error=Incorrect email or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorrect email or password");

            exit();

        }

    }

}else{

    header("Location: login.php");

    exit();

}
       
    
?>