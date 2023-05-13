<?php 

$con = mysqli_connect('localhost', 'root', '', 'jwd');

// check connection
if(!$con){
    echo 'Connection Error: ' . mysqli_connect_error();
}
else {
    // echo "created succesfully";
}
?>