<?php
$conn = mysqli_connect("localhost", 'federicapietrolungo', '', 'my_federicapietrolungo');

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

?>