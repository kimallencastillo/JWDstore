<?php 
session_start();
if(empty($vkey)) :
	$username= "Admin";
	$user_id = "101145";
	$type_user = "Admin";
	$vkey = "asdgadasjdjg11232313123123askldansdjkasjkd";
else:
$username = $_SESSION['username'];
$user_id = $_SESSION['userID'];
$type_user = $_SESSION['type'];
$vkey = $_SESSION['vkey'];
endif;

?>

<!DOCTYPE html>
<html lang="en">
<title>JWD Home</title>
    <link rel = "stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/60641e66e0.js" crossorigin="anonymous"></script>
</head>
<body>
<div class = "menubar">
    <ul>
        <li class="active"><i class="fa-solid fa-house-chimney"></i><a href = "../store/index.html">Store<a></li>

	<!--submenu-->
	<li><i class="fa-solid fa-shelves"></i><a href = "item_inv.php"> Inventory <a>
<div class="submenu1">
	<ul>
		<li><a href="item_inv.php">Items</a></li>
	    <li><a href="viewlist.php">Viewlist</a></li>
	</ul>
	</div>
</li>
    <li><i class="fa-solid fa-person-circle-question"></i><a href = "#"> About Us<a></a>
<div class="submenu1">
	<ul>
	    <!--<li><a href="#">Mission</a></li>-->
	    <li><a href="vission.php">Vision</a></li>	
	</ul>
	</div>
</li>

<li ><a style="margin-right: 10px;"><?php echo $type_user;?></a><i class="fa-solid fa-sign-out" aria-hidden="true"></i><a href = "logout.php"> Sign out <a></i>

</div>

</div>

</body>
</html>