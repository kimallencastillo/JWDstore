<?php 
//  registration function

// check register
if(isset($_POST['register'])):
    //  connect to db
    require_once("db/db_connect.php");
    //  check string

    $username = $con->real_escape_string($_POST['username']);
    $userID = $con->real_escape_string($_POST['userID']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    //  create hash
	$hash_password = password_hash($password, PASSWORD_DEFAULT);

    //Generate Key
	$vKey = md5(time().$username);

	//encrypted password
	$password = md5($password);

    // insert to db
    $sql = "INSERT INTO `user_account`(`username`, `userID`, `vkey`, `password_user`) 
    VALUES ('$username','$userID','$vKey','$password')";
    
    // check errors
    if(mysqli_query($con, $sql)):
        // success
        echo '<script type="text/javascript">
                alert("Created Account Successfully!");
                window.location.href = "index.php";
             </script>';
    else:
         // error
         echo 'Query error ' . mysqli_error($con);          
    endif;

endif;
?>