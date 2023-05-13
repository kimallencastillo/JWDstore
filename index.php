<?php 
session_start();
//unset
unset($_SESSION['username']);
unset($_SESSION['userID']);
unset($_SESSION['type']);
unset($_SESSION['vkey']);
//  connect to db
include("db/db_connect.php");
$type = $name = $password = "";
?>
<html>
<head></head>
	<title>Login/Register</title>
	<link rel="stylesheet" href="css/login/login_style.css">
</head>
<style>

</style>
<body>
	<div class="main">
		<div class="form-box">
			<div class ="button-box">
			<div id="btn"> </div>
			<button type="button" class="toggle-btn" onclick="login()" style="color:black;">Log In</button>
			<button type="button" class="toggle-btn" onclick="register()" style="color:black;">Register</button>
		</div>
	<div class="social-ic">
	
		<a href="https://www.google.com/"><img src="img/gp.png"></a>
	</div>
	<!-- login -->
	<form id="login" class="input-gp" method="POST">
		<input type="text" class="input-field" placeholder="Username" name="name" required>
		<input type="password" class="input-field" id="pass" placeholder="Enter Password" name="password" required>
		<input type="checkbox" class="check-box" onclick="myFunction()"><font id ="fon"><span>Remember Password</span></font>
		<input type="submit" class="submit-btn" value="Log In" name="login">
		<!--<a href ="Home.html" class="back-btn" style="color:white; text-decoration-line: none;"><center>Back</center></a>-->
	</form>
	<?php 
	if(isset($_POST['login'])) {
		$query = "SELECT * FROM jwd_account ORDER BY created_at";
		$result = mysqli_query($con, $query);
		//	check string
		$name = $_POST['name'];
		$pass = $_POST['password'];
		
		$hash_password = password_hash($pass, PASSWORD_DEFAULT);
		$pass = md5($pass);
		
	
		if(mysqli_num_rows($result) > 0):
		while($value = mysqli_fetch_array($result)) :
			if($name == $value['username'] && $pass == $value['password_user']) {
				//	check if admin
				if($value['type'] === 'Admin'){
					$_SESSION['username'] = $value['username'] ;
					$_SESSION['userID'] = $value['userID'] ;
					$_SESSION['type']  = $value['type'];
					$_SESSION['vkey'] = $value['vkey'];
					echo '<script>alert("Log in Admin Successful!")</script>';
                    echo '<script>window.location="inventory/item_inv.php"</script>';
				
				//	check if user
				
				}elseif($value['type'] === "User"){
					$_SESSION['username'] = $value['username'] ;
					$_SESSION['userID'] = $value['userID'] ;
					$_SESSION['type']  = $value['type'];
					$_SESSION['vkey'] = $value['vkey'];
					echo '<script>alert("Log in User Successful!")</script>';
                    echo '<script>window.location="inventory/item_inv.php"</script>';
				//	echo $name . '<br>';
				//	echo $pass . '<br>';
				//	echo 'Working';
				break;
				}
				
			}
			elseif(!$name == $value['username'] && !$pass == $value['password_user']) {
				
				echo '<script>alert("Invalid User!")</script>';
			}
		endwhile;
	endif;
	}
	?>
	<!-- Register -->
	<form id="register" class="input-gp" method="POST">
		<input type="text" class="input-field" placeholder="Username" name="username" required>
		<input type="text" class="input-field" placeholder="User ID" name="userID" required>
		<input type="email" class="input-field" placeholder="Email ID" name="email" required>
		<select class="input-field" name="type" style="width:80%" required>
			<option>--Select--</option>
            <option value="Admin" <?php if ($type == 'Admin') {  echo 'selected';} ?>>Admin</option>
            <option value="User" <?php if ($type == 'User') {  echo 'selected';} ?>>User</option>   
		</select>        
		<input type="password" class="input-field" placeholder="Enter Password" name="password" required>
		<input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
		<input type="submit" class="submit-btn" value="Register" name="register">
	</form>
	</div>
	</div>
<?php 
	//  registration function

// check register
if(isset($_POST['register'])):
    //  check string

    $username = $con->real_escape_string($_POST['username']);
    $userID = $con->real_escape_string($_POST['userID']);
    $type = $con->real_escape_string($_POST['type']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    //  create hash
	$hash_password = password_hash($password, PASSWORD_DEFAULT);

    //Generate Key
	$vKey = md5(time().$username);

	//encrypted password
	$password = md5($password);

    // insert to db
    $sql = "INSERT INTO `jwd_account`(`username`, `userID`, `type`, `vkey`, `password_user`) 
    VALUES ('$username','$userID', '$type', '$vKey','$password')";
    
    // check errors
    if(mysqli_query($con, $sql)):
        // success
        echo '<script type="text/javascript">
                alert("Created Account Successfully!");
                window.location.href = "login.php";
             </script>';
    else:
         // error
         echo 'Query error ' . mysqli_error($con);          
    endif;

endif;
	?>

	<script>
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");
		
		function register() {
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}	
		function login() {
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0px";
		}	
		//	show password
		function myFunction() {
			var x = document.getElementById("pass");
				if (x.type === "pass") {
					x.type = "text";
				} else {
					x.type = "pass";
				}
			}    
	</script>
</body>
</html>