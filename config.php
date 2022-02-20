<?php
session_start();

if(is_null($_SESSION["email"])) {
    header("Location:login.php");
}
// echo $_SESSION['id'];
$id = $_SESSION['id'];
// echo $id;
include "connectDatabase.php";
$adminPrivilege="";
$adminUsername="";
$adminMy= "My ";
if ($id == 1) {
    $adminPrivilege = "Admin";
    $adminUsername = " - Admin";
    $adminMy = "Admin";
};
$conn->close();
?>