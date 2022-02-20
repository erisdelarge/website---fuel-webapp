<?php

/**
 * Funzione che controlla le credenziali inserite
 * e ritorna true in caso di credenziali corrette
 * o ritorna false in caso di credenziali inesistenti
 */
function checkLogin($_email, $_password) {
    $result = false;
    
    if($_email == "emily_buttercup@gmail.com" && $_password == "qwokka"){
        $result = true;
    }

    return $result;
}




//     $email= $_POST["email"];
// $password= $_POST["password"];
//     $email!="emily_buttercup@gmail.com"?header('Location: login.php'):header('Location: index.html');
//     // $password=="qwokka"?
//     session_start();

//#exampleInputEmail
//#exampleInputPassword
?>
