<?php 
    require_once("db.php");
    
    $idNum = $_GET['idNum'];

    $sql = "SELECT * FROM jwd_inventory WHERE id = $idNum";

    $result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>