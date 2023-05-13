<?php 

$search = "";
if(isset($_POST['submit'])):
    $search = $_POST['search'];
    $query ="SELECT * FROM `jwd_inventory` WHERE CONCAT(`item_desc`, `item_id`, 
    `item_model`, `item_quality`, `item_category`, `item_price`, `item_image`, 
    `item_status`, `item_brand`) 
     LIKE '%".$search."%'";
    $search_Res = filterList($query);   
else:  
    $query = "SELECT * FROM `jwd_inventory`";
    $search_Res = filterList($query);   
endif;

function filterList($query){
    $con = mysqli_connect('localhost', 'root', '', 'jwd');
    $filter_Res = mysqli_query($con, $query);
    return $filter_Res;
}


$result_arr = array();
while($row = mysqli_fetch_array($search_Res)) :
        $result_arr[] = $row;  
endwhile;
?>
<html>
<head>
    <title>JWD Home</title>
    <link rel = "stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/60641e66e0.js" crossorigin="anonymous"></script>
</head>
<body>
<div class = "menubar">
    <ul>
        <li class="active"><i class="fa-solid fa-house-chimney"></i><a href = "#"> Home<a></li>
        <li><i class="fa-solid fa-person-circle-question"></i><a href = "#"> About Us<a>
<div class="submenu1">
	<ul>
	    <li><a href="#">Mission</a></li>
	    <li><a href="#">Vision</a></li>	
	</ul>
	</div>
</li>
    <li><i class="fa-solid fa-house-chimney-medical"></i><a href = "#"> Home Essentials<a>
	<div class="submenu1">
	    <ul>
	        <li><a href="#">Air Purifiers</a></li>
	        <li><a href="#">Water Filtration Systems</a></li>	
	    </ul>
	</div>
</li>
<li><i class="fa-solid fa-heart-circle-plus"></i><a href = "#"> Living Necessities<a>
<div class="submenu1">
	<ul>
	    <li><a href="#">Kitchen Tools & Utilities</a></li>
	    <li><a href="#">Serving Set</a></li>	
	</ul>
	</div>
</li>

<li><i class="fa-solid fa-music"></i><a href = "#"> Musical Instruments<a>
<div class="submenu1">
	<ul>
	    <li><a href="#">Portable Piano Keyboards</a></li>
	    <li><a href="#">Keyboard Stands</a></li>	
	    <li><a href="#">Acoustic Guitars</a></li>
	    <li><a href="#">Keyboard Stands</a></li>
	    <li><a href="#">Drums</a></li>
	    <li><a href="#">Others</a></li>
	</ul>
	</div>
</li>
</ul>
<!--Search-->
<form action="" method="POST">
    <input type="submit" name=submit style="width: 70px;">
    <input type="text" name="search" style="width: 200px;" placeholder="Search.." value="<?php echo $search; ?>">
    <img src="jwd-small.png" align=right >
</form>
</div>


<br><br><br><br><br>
<div class="small-content">

<h1 align = center> Featured Products </h1>
<br>
   <div class="small-container">
        <form action="GET">
           <div class="row">
               <!--Sample Product-->
               <div class="col-4">
                   <a href="product-details.html"><img src="Products\Filtration Systems _ Replacements\11.png" height = 250></a>
                   <h4><a href="product-details.html">Sediment Filter</a></h4>
                   <div class="rating">
                  <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                   </div>
                   <p>₱145.00</p>
               </div> 
                <!-- Featured Products in SQL -->
               <?php foreach($result_arr as $val) { ?>  
                <div class="col-4">
                    <a href="product-details.html">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" height = 250>' ?></a>
                        <h4><a href="product-details.html"><?php echo $val['item_desc']; ?></a></h4>
                    <div class="rating">
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                   </div>
                   <p>₱<?php echo $val['item_price']?></p>      
                </div>
                <?php }?>
               

               
               <!--<div class="col-4">
                   <img src="Products\Piano\GL - 290\1.png" height = 250">
                   <h4>GL - 290 Piano</h4>
                   <div class="rating">
                   <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                   </div>
                   <p>₱2,270.00</p>
               </div> 
               <div class="col-4">
                   <img src="Products\Filtration Systems _ Replacements\20.png" height = 250">
                   <h4>Water Purifier 3rd Stage Filter</h4>
                   <div class="rating">
                     <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                   </div>
                   <p>₱328.00</p>
               </div> 
                <div class="col-4">
                   <img src="Products\Filtration Systems _ Replacements\3.png" height = 250">
                   <h4>3 in 1 Purifier Complete Set</h4>
                   <div class="rating">
                     <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star"></i>
                   </div>
                   <p>₱1590.00</p>
               </div> -->
           </div>
       
       </div>
</div>
</div>
</form>
</body>
</html>