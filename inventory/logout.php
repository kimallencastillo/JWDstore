<?php
session_start();
session_destroy();
echo '<script type="text/javascript">
        alert("Signing Out!");
        window.location.href = "../index.php";
    </script>';


?>