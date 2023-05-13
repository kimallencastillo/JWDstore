<?php 

    require_once("../db/db_connect.php");
    $id_to_delete = $_GET['id'];
    $sql_delete = "DELETE FROM `jwd_inventory` WHERE id=$id_to_delete";
    if(mysqli_query($con, $sql_delete)):
        // success
        // echo 'Success';
        // header('location : inventory.php');
        echo '<script type="text/javascript">
                        alert("Deleted Successfully!");
                        window.location.href = "item_inv.php";
        </script>';
    else:
        echo 'query error ', mysqli_error($con);
    endif; 


?>