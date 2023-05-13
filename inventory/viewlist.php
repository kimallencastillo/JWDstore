<?php 
$search = $catg = "";
$ctr = 1;

if(isset($_POST['submit'])):
    $search = $_POST['search'];
    $query ="SELECT * FROM `jwd_inventory` WHERE CONCAT(`item_desc`, 
    `item_id`, `item_model`, `item_quantity`, `item_category`, `item_price`, 
    `item_image`, `item_status`, `item_brand`) 
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="template/style.css">
    <script src="https://kit.fontawesome.com/60641e66e0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../others/DataTables-1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="../others/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../jwd.png">
    <title>View List</title>
</head>
    <?php require_once 'navbar.php' ?>
<body>
<div class="wrapper" style="overflow-y: scroll;">

<br><br><br>
<div class="content">
   

    <div class="right">
        <div class="title">
            <h2>View List<h2>
        </div>
        <style>
            .search {
               margin-right:400px;
            }
            .print {
                margin-left: 5px;
                margin-bottom: 50px;
            }
            table {
				box-shadow: 0 0 10px 1px #3366CC;
			}
            
        </style>
        <div class="actions-container">
                    <div class="search">
                    <form action="" method="POST">
                        Search
			            <input type="text" name="search" class="" placeholder="Enter info to search..." value="<?php echo $search; ?>" >
                        <!--Submit-->
			            <input type="Submit" name="submit" class="">
                        <input type="Submit" name="clear" value="Clear" class="">
                        <?php 
                        if(isset($_POST['clear'])){}?>
                    </form>
                    </div>
                    <div class="print">
                        <button name= "print" onclick="PrintDiv();" class="btn btn-info btn" >Print</button>
                    </div>
                    <!-- <button>Archive</button> -->
                </div>
                <?php
                $category = array(
                    'Serving set' => $ctr,
                    'Piano' => $ctr,
                    'Filtration' => $ctr,
                    'Air Purifiers' => $ctr,
                    'Utensils' => $ctr
                ); 
                ?>
                
                    
                     
                    <div class="table" id=table_print>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered bg-secondary table-hover">
							    <form method="GET">
                                    <thead>

                                    <!-- Air Purifiers -->
                                    <?php foreach($result_arr as $val) { ?>
                                        <?php if ($val['item_category'] == 'Air Purifiers') { ?>
                                            <?php if($category['Air Purifiers'] == 1) : ?>
                                                <tr ><td colspan="7" style="text-align: center;">Air Purifiers</td></tr>
                                            <?php $category['Air Purifiers']++;  ?>
                                        <tr class="text-light text-center">
                                            <td>Item Id</td>
                                            <td>Image</td>
                                            <td>Model</td>
                                            <td>Brand</td>
                                            <td>Category</td>
                                            <td>Quantity</td>
										    <td style="text-align: center;" >price</td>
                                        </tr>
                                        <?php endif; ?>
                                    </thead>
                                    
                                    <tr class="text-center">
                                        <td><?php echo $val['item_id']; ?></td>
                                        <th style="text-align: center;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
                                                        height="90" width="150" id=img class="img-thumnail" />'; ?></th>
                                        <td ><?php echo $val['item_model']; ?></td>
                                        <td ><?php echo $val['item_brand']; ?></td>
                                        <td ><?php echo $val['item_category']; ?></td>
                                        <td><?php echo $val['item_quantity'];?></td>
                                        <td style="text-align: center;">₱<?php echo $val['item_price']; ?></td>
                                    </tr>
                                    <?php }//end foreach  ?>            
                                    <?php  } // end if?>


                                    <!-- Piano -->
                                    <table class="table table-striped table-bordered bg-secondary table-hover">
                                    <?php foreach($result_arr as $val) { ?>
                                        <?php if ($val['item_category'] == 'Piano') { ?>
                                            <?php if($category['Piano'] == 1) : ?>
                                                <tr ><td colspan="7" style="text-align: center; background: #6c757d;">Piano</td></tr>
                                            <?php $category['Piano']++;  ?>
                                        <tr class="text-light text-center">
                                            <td>Item Id</td>
                                            <td>Image</td>
                                            <td>Model</td>
                                            <td>Brand</td>
                                            <td>Category</td>
                                            <td>Quantity</td>
										    <td style="text-align: center;" >price</td>
                                        </tr>
                                        <?php endif; ?>
                                    </thead>
                                    
                                    <tr class="text-center">
                                        <td><?php echo $val['item_id']; ?></td>
                                        <th style="text-align: center;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
                                                        height="90" width="150" id=img class="img-thumnail" />'; ?></th>
                                        <td ><?php echo $val['item_model']; ?></td>
                                        <td ><?php echo $val['item_brand']; ?></td>
                                        <td ><?php echo $val['item_category']; ?></td>
                                        <td><?php echo $val['item_quantity'];?></td>
                                        <td style="text-align: center;">₱<?php echo $val['item_price']; ?></td>
                                    </tr>
                                    <?php }//end foreach  ?>            
                                    <?php  } // end if?>

                                    <!-- Utensils -->
                                    <table class="table table-striped table-bordered bg-secondary table-hover">
                                    <?php foreach($result_arr as $val) { ?>
                                        <?php if ($val['item_category'] == 'Utensils') { ?>
                                            <?php if($category['Utensils'] == 1) : ?>
                                                <tr ><td colspan="7" style="text-align: center; background: #6c757d;">Utensils</td></tr>
                                            <?php $category['Utensils']++;  ?>
                                        <tr class="text-light text-center">
                                            <td>Item Id</td>
                                            <td>Image</td>
                                            <td>Model</td>
                                            <td>Brand</td>
                                            <td>Category</td>
                                            <td>Quantity</td>
										    <td style="text-align: center;" >price</td>
                                        </tr>
                                        <?php endif; ?>
                                    </thead>
                                    
                                    <tr class="text-center">
                                        <td><?php echo $val['item_id']; ?></td>
                                        <th style="text-align: center;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
                                                        height="90" width="150" id=img class="img-thumnail" />'; ?></th>
                                        <td ><?php echo $val['item_model']; ?></td>
                                        <td ><?php echo $val['item_brand']; ?></td>
                                        <td ><?php echo $val['item_category']; ?></td>
                                        <td><?php echo $val['item_quantity'];?></td>
                                        <td style="text-align: center;">₱<?php echo $val['item_price']; ?></td>
                                    </tr>
                                    <?php }//end foreach  ?>            
                                    <?php  } // end if?>

                                    <!-- Serving Set -->
                                    <table class="table table-striped table-bordered bg-secondary table-hover">
                                    <?php foreach($result_arr as $val) { ?>
                                        <?php if ($val['item_category'] == 'Serving set') { ?>
                                            <?php if($category['Serving set'] == 1) : ?>
                                                <tr><td colspan="7" style="text-align: center; background: #6c757d;">Serving Set</td></tr>
                                            <?php $category['Serving set']++;  ?>
                                        <tr class="text-light text-center">
                                            <td>Item Id</td>
                                            <td>Image</td>
                                            <td>Model</td>
                                            <td>Brand</td>
                                            <td>Category</td>
                                            <td>Quantity</td>
										    <td style="text-align: center;" >price</td>
                                        </tr>
                                        <?php endif; ?>
                                    </thead>
                                    
                                    <tr class="text-center">
                                        <td><?php echo $val['item_id']; ?></td>
                                        <th style="text-align: center;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
                                                        height="90" width="150" id=img class="img-thumnail" />'; ?></th>
                                        <td ><?php echo $val['item_model']; ?></td>
                                        <td ><?php echo $val['item_brand']; ?></td>
                                        <td ><?php echo $val['item_category']; ?></td>
                                        <td><?php echo $val['item_quantity'];?></td>
                                        <td style="text-align: center;">₱<?php echo $val['item_price']; ?></td>
                                    </tr>
                                    <?php }//end foreach  ?>            
                                    <?php  } // end if?>


                                      <!-- Filtration -->
                                      <table class="table table-striped table-bordered bg-secondary table-hover">
                                    <?php foreach($result_arr as $val) { ?>
                                        <?php if ($val['item_category'] == 'Filtration Systems') { ?>
                                            <?php if($category['Filtration'] == 1) : ?>
                                                <tr ><td colspan="7" style="text-align: center; background: #6c757d;">Filtration Systems & Replacements</td></tr>
                                            <?php $category['Filtration']++;  ?>
                                        <tr class="text-light text-center">
                                            <td>Item Id</td>
                                            <td>Image</td>
                                            <td>Model</td>
                                            <td>Brand</td>
                                            <td>Category</td>
                                            <td>Quantity</td>
										    <td style="text-align: center;" >price</td>
                                        </tr>
                                        <?php endif; ?>
                                    </thead>
                                    
                                    <tr class="text-center">
                                        <td><?php echo $val['item_id']; ?></td>
                                        <th style="text-align: center;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($val['item_image']).'" 
                                                        height="90" width="150" id=img class="img-thumnail" />'; ?></th>
                                        <td ><?php echo $val['item_model']; ?></td>
                                        <td ><?php echo $val['item_brand']; ?></td>
                                        <td ><?php echo $val['item_category']; ?></td>
                                        <td><?php echo $val['item_quantity'];?></td>
                                        <td style="text-align: center;">₱<?php echo $val['item_price']; ?></td>
                                    </tr>
                                    <?php }//end foreach  ?>            
                                    <?php  } // end if?>
                                 </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</body>
</html>
<script type="text/javascript">
    // print     
    function PrintDiv() {    
        var divToPrint = document.getElementById('table_print');
        var popupWin = window.open('', '_blank', 'width=600,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
    // image
    $(document).ready(function(){  
      $('#accept').click(function(){  
           var image = $('#itemImage').val();   
           if(image == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension_image = $('#itemImage').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension_image, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#itemImage').val('');
                    return false;  
                }  
           }  
      });  
 });  
</script>