<?php 
            require_once("../db/db_connect.php");
            $upt_image = "";
            if(isset($_GET['id']) && isset($_POST['accept'])) {
                $id = $_GET['id'];

                // check image
                if(empty($_FILES["item_image"]["tmp_name"])) :
                else :
                // Get image
                        $upt_image = addslashes(file_get_contents($_FILES["item_image"]["tmp_name"]));
                endif;

                // Check Values
                $upt_id = $_POST['item_id'];
                $upt_model =  $_POST['item_model'];
                $upt_brand = $_POST['item_brand'];
                $upt_desc = $_POST['item_desc'];
                $upt_category = $_POST['item_category'];
                $upt_price = $_POST['item_price'];
                $upt_quantity = $_POST['item_quantity'];
                    
                // update query 
                $sql_upt_item = "UPDATE `jwd_inventory` SET 
                `item_id`= '$upt_id',
                `item_image`= '$upt_image',
                `item_model`= '$upt_model',
                `item_brand`= '$upt_brand',
                `item_desc`= '$upt_desc',
                `item_category`= '$upt_category',
                `item_price`= '$upt_price',
                `item_quantity`= '$upt_quantity'
                WHERE id=$id ORDER BY created_at";

                // save to db and check
                if(mysqli_query($con, $sql_upt_item)):
                    // success
                    echo '<script type="text/javascript">
                            alert("Edit Successfully!");
                            window.location.href = "item_inv.php";
                         </script>';  
                         exit;
                        
                else:
                     // error
                     echo 'Query error ' . mysqli_error($con); 
                       
                endif;
            }else {
                // Go back to menu
                echo '<script type="text/javascript">
                    window.location.href = "item_inv.php";                         
                    </script>';
            }
            ?>