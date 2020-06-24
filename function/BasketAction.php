<?php 
// Initialize shopping cart class 
require_once 'Basket.class.php'; 

$basket = new Basket; 
 
// Include the database config file 
require_once '../database_php/server.php'; 
 
// Default redirect page 
$redirectLoc = '../webpage/mic.php'; 
 
// Process request based on the specified action 
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 
    if($_REQUEST['action'] == 'addToBasket' && !empty($_REQUEST['s_id'])){ 
        $stock_id = $_REQUEST['s_id']; 
        
        // Get product details 
        $query = $conn->query("SELECT * FROM stock WHERE s_id = ".$stock_id); 
        $row = $query -> fetch_assoc(); 
        $itemData = array( 
            's_id' => $row['s_id'], 
            's_name' => $row['s_name'], 
            's_cost' => $row['s_cost'], 
            's_description' => $row['s_description'],
            's_img' => $row['s_img'],
            's_amount' => 1 
        ); 
         
        // Insert item to cart 
        $insertItem = $basket->insert($itemData); 
         
        // Redirect to cart page 
        $redirectLoc = $insertItem?'../webpage/shopping_basket.php':'../webpage/mic.php'; 

    }elseif($_REQUEST['action'] == 'updateBasketItem' && !empty($_REQUEST['s_id'])){ 
       
        // Update item data in cart 
        $itemData = array( 
            'rowid' => $_REQUEST['s_id'], 
            's_amount' => $_REQUEST['s_amount'] 
        ); 
        $updateItem = $basket->update($itemData); 
         
        // Return status 
        echo $updateItem?'ok':'err';die; 

    }elseif($_REQUEST['action'] == 'removeBasketItem' && !empty($_REQUEST['s_id'])){ 
        print_r('s_id');
        // Remove item from cart 
        $deleteItem = $basket->remove($_REQUEST['s_id']); 
         

        // Redirect to cart page 
        $redirectLoc = '../webpage/shopping_basket.php'; 
        
    }elseif($_REQUEST['action'] == 'placeOrder' && $basket->total_items() > 0){ 
        $redirectLoc = 'checkout.php'; /* Aceept page */
         
        // Store post data 
        $_SESSION['postData'] = $_POST; 
     
        $first_name = strip_tags($_POST['first_name']); 
        $last_name = strip_tags($_POST['last_name']); 
        $email = strip_tags($_POST['email']); 
        $phone = strip_tags($_POST['phone']); 
        $address = strip_tags($_POST['address']); 
         
        $errorMsg = ''; 
        if(empty($first_name)){ 
            $errorMsg .= 'Please enter your first name.<br/>'; 
        } 
        if(empty($last_name)){ 
            $errorMsg .= 'Please enter your last name.<br/>'; 
        } 
        if(empty($email)){ 
            $errorMsg .= 'Please enter your email address.<br/>'; 
        } 
        if(empty($phone)){ 
            $errorMsg .= 'Please enter your phone number.<br/>'; 
        } 
        if(empty($address)){ 
            $errorMsg .= 'Please enter your address.<br/>'; 
        } 
         
        if(empty($errorMsg)){ 
            // Insert customer data in the database 
            $insertCust = $conn->query("INSERT INTO customers (first_name, last_name, email, phone, address) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$phone."', '".$address."')"); 
             
            if($insertCust){ 
                $custID = $conn->insert_id; 
                 
                // Insert order info in the database 
                $insertOrder = $conn->query("INSERT INTO orders (customer_id, grand_total, created, status) VALUES ($custID, '".$cart->total()."', NOW(), 'Pending')"); 
             
                if($insertOrder){ 
                    $orderID = $conn->insert_id; 
                     
                    // Retrieve cart items 
                    $basketItems = $basket->contents(); 
                     
                    // Prepare SQL to insert order items 
                    $sql = ''; 
                    foreach($basketItems as $item){ 
                        $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['s_id']."', '".$item['s_amount']."');"; 
                    } 
                     
                    // Insert order items in the database 
                    $insertOrderItems = $conn->multi_query($sql); 
                     
                    if($insertOrderItems){ 
                        // Remove all items from cart 
                        $basket->destroy(); 
                         
                        // Redirect to the status page 
                        $redirectLoc = 'orderSuccess.php?id='.$orderID; 
                    }else{ 
                        $sessData['status']['type'] = 'error'; 
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                    } 
                }else{ 
                    $sessData['status']['type'] = 'error'; 
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                } 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
            } 
        }else{ 
            $sessData['status']['type'] = 'error'; 
            $sessData['status']['msg'] = 'Please fill all the mandatory fields.<br>'.$errorMsg;  
        } 
        $_SESSION['sessData'] = $sessData; 
    } 
} 
 
// Redirect to the specific page 
header("Location: $redirectLoc"); 
exit();