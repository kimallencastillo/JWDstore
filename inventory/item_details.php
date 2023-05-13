<?php
// connect to db
require_once('../db/db_connect.php');
//Get ID
$id = $_GET['id'];
$upt_image = " ";

$sql = "SELECT * FROM jwd_inventory WHERE id=$id";
$result = mysqli_query($con, $sql);
// chech error
if ($result->num_rows != 1) {
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
    <link rel="stylesheet" href="template/style.css">
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
    <title>Item Details</title>
</head>
<?php require_once 'navbar.php' ?>
<style>
.view_item {
    width: 70%;
    height: 90%;
    background-color: lightblue;
    border-radius: 15px;
    margin-top: 5px;
    margin-left: 200px;
}

.add_quantity {}

.text_input {
    background: transparent;
    border: none;
    font-size: 20px;
    text-align: left;
}

.view_item {
    margin-top: 100px;
}

.btn {
    background-color: #337ab7;
}
</style>

<body>

    <div class="wrapper" style="overflow-y: scroll;">
        <form action="" method="POST">
            <div class="content">
                <div class="view_item">
                    <div class="add_quantity">
                        <div class="back1">
                            <input type="submit" class="btn" name="back" value="Back">
                        </div>
                        <div class="detail">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($item_image) . '" 
                    height="400" width="100%" id=img class="img-thumnail" />'; ?>
                            Serial ID: <input type="text" class="text_input" value="<?php echo $item_id; ?>" readonly
                                disabled>
                            <br> Description: <input type="text" class="text_input" value="<?php echo $item_desc; ?>"
                                readonly disabled>
                            <br> Model: <input type="text" class="text_input" value="<?php echo $item_model; ?>"
                                readonly disabled>
                            <br> Brand: <input type="text" class="text_input" value="<?php echo $item_brand; ?>"
                                readonly disabled>
                            <br> Category: <input type="text" class="text_input" value="<?php echo $item_category; ?>"
                                readonly disabled>
                            <br> Status: <input type="text" class="text_input" value="<?php echo $item_status; ?>"
                                readonly disabled>
                            <br> Quantity: <input type="text" class="text_input" value="<?php echo $item_quantity; ?>"
                                readonly disabled>
                            <br> Price: <input type="text" class="text_input" value="<?php echo '₱', $item_price; ?>"
                                readonly disabled>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
    <?php
    if (isset($_POST['back'])) {
        echo '<script>window.location="item_inv.php"</script>';
    }
    ?>
</body>

</html>