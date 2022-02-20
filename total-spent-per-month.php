<?php
include "config.php";
$id=$_SESSION['id'];
include "functions-database.php";
include "class-fillup.php";
$fillupObj= new Fillup($id);
$fillup=$fillupObj->readDate();
var_dump($fillup);
?>
<script>
         var num1, num2;
         num1 = 50;
         num2 = 35;
         var difference = function (num1, num2){
            return Math.abs(num1 - num2);
         }
         document.write("Difference = "+difference(num1,num2));
      </script>