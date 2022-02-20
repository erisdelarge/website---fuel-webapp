<?php
/**
 * Funzione che controlla le credenziali inserite
 * e ritorna true in caso di credenziali corrette
 * o ritorna false in caso di credenziali inesistenti
 */
// function checkLogin($_email, $_password) {
//     $result = false;
    
//     if($_email == "emily_buttercup@gmail.com" && $_password == "qwokka"){
//         $result = true;
//     }

//     return $result;
// }
function formatDate($date, $format = "d/m/y"){
    return date($format, strtotime($date));
};
// function formatPrice($number){
//     return number_format($number, 2, ',','.');
// }
// function formatPriceEur($number, $valuta = '€'){
//     return number_format($number, 2, ',','.')." ".$valuta;
// }
?>
//