<?php 
// connect to db
require_once('../db/db_connect.php');
//Get ID
$id = $_GET['id'];
$upt_image = " ";
$catg = "";
$sql = "SELECT * FROM jwd_inventory WHERE id=$id";
$result = mysqli_query($con, $sql);
// chech error
if($result->num_rows != 1) {
    die("ERROR 404");
}

$val = $result->fetch_assoc();
$item_id = $val['item_id'];
$item_image = $val['item_image'];
$item_model = $val['item_model'];
$item_brand = $val['item_brand'];
$item_category = $val['item_category'];
$item_price = $val['item_price'];
$item_status = $val['item_status'];
$item_desc = $val['item_desc'];
$item_quantity = $val['item_quantity'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="template/style.css">
    <title>Edit</title>
    <?php include_once '../others/font.php' ?>
    <link rel="stylesheet" href="../others/DataTables-1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/inventory.css">
    <link rel="stylesheet" href="../others/bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
    <?php require_once 'navbar.php' ?>
<body>
    <br><br><br>
<div class="wrapper" style="overflow-y: scroll;">
    <div class="container" style="margin-top: 30px;">
	<div id="borrower-details" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
            <div class="title" style="text-align: center;">
                    <h2>Edit Items<h2>
                </div>

				<div class="modal-header">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($item_image).'" 
                     height="400" width="100%" id=img class="img-thumnail" />'; ?>
                </div>
                
                <?php 
                if(isset($_POST['back'])){
                    echo '<script type="text/javascript">
                                window.location.href = "admin-borrowers.php";
                            </script>';
                }
                ?>
				<form action="item_upt.php?id=<?=$id?>" id="borrowerForm" name="borrower" role="form" method="POST" enctype="multipart/form-data">
					<div class="modal-body">					
					<div class="form-group">
					<table width=100%>
                    <td style="text-align: left;">Serial ID
						<tr>
						<td colspan = 2><input type="text" name="item_id" value="<?php echo $item_id; ?>" class="form-control"style="width:100%" required>
						<tr>
						<td>Item Image<td>Model
						<tr>
						<td><input type="file" name="item_image" id="itemImage" class="form-control" style="width:80%" >
						<td><input type="text" name="item_model" value="<?php echo $item_model; ?>" class="form-control" style="width:100%" required>
						<tr>
						<td>Brand<td>Description
						<tr>
						<td><input type="text" name="item_brand" value="<?php echo $item_brand; ?>" class="form-control" style="width:80%" ></td>
						<td><input type="text" name="item_desc" value="<?php echo $item_desc; ?>" class="form-control" style="width:100%" ></td>
						<tr>
						<td>Category<td>Price
						<tr>
						<td><select class="form-control" name="item_category" value="<?php echo $item_category; ?>" style="width:80%" required>
								<option ><?php echo $item_category; ?></option>
                                <option value="Serving set" <?php if ($catg == 'Serving set') {  echo 'selected';} ?>>Serving Set</option>
                                <option value="Piano" <?php if ($catg == 'Piano') {  echo 'selected';} ?>>Piano</option>   
                                <option value="Filtration Systems" <?php if ($catg == 'Filtration') {  echo 'selected';} ?>>Filtration System  Replacement</option>   
                                <option value="Air purifiers" <?php if ($catg == 'Air purifiers') {  echo 'selected';} ?>>Air Purifiers</option>
                                <option value="Utensils" <?php if ($catg == 'Utensils') {  echo 'selected';} ?>>Utensils</option>
                            </select>
						<td><input type="Text" name="item_price" value="<?php echo $item_price; ?>" class="form-control" style="width:100%" required></td>
						<tr>
						<td>Quantity<td>
						<tr>
						<td><input type="number" name="item_quantity" value="<?php echo $item_quantity; ?>" class="form-control" style="width:80%" required>
						<td>
						</table>
						</div>
				</div>
					
                <style>
                    .form-control {
                        background-color: transparent;
                    }
                </style>
				
					 <div class="modal-footer">					
                     <input type="submit" name="cancel" class="btn btn-default" onclick="confirm('Are you sure you want to cancel?')" data-dismiss="modal" value="cancel">
						<input type="submit" class="btn btn-success" name="accept" id="accept">
					</div>
				
				<!-- End form -->
			</div>
            
           
		</div>
	</div>			
	<div style="margin:50px 0px 0px 0px;">
	</div>	
</div>	
</div>
</form>

</body>
</html>
<script >
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