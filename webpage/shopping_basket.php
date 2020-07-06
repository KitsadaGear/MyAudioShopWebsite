<?php 
    session_start();
    include('../database_php/server.php');

    include('../function/Basket.class.php');

    $basket = new Basket ; 

    if (isset($_POST['remove'])){
      if ($_GET['action'] == 'remove'){
          foreach ($_SESSION['basket'] as $key => $value){
              if($value["s_id"] == $_GET['id']){
                  unset($_SESSION['basket'][$key]);
                  echo "<script>alert('Product has been Removed...!')</script>";
                  echo "<script>window.location = 'shopping_basket.php'</script>";
              }
          }
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src = ../js/function.js></script>

    <script>
        function updateBasketItem(obj,s_id){
        $.get("BasketAction.php", {action:"updateBasketItem", s_id:s_id, s_amount:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Basket update failed, please try again.');
            }
         });
        }
    </script>

    <title>Audio Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

   <!-- Bootstrap CDN -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/shopping_basket-style.css" media = "screen,projection">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="screen,projection">


</head>
<body class="bg-light">

<div class = "myPage" id = "myPage">

<?php require_once ("../element/shopping_basket_header.php"); ?>


    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-basket">
                    <h6>My Shopping basket</h6>

                    <?php
                        if($basket->total_items() > 0){ 
                            // Get basket items from session 
                            $basketItems = $basket->contents(); 
                            foreach($basketItems as $item){ 
                            ?>
                                <div class="border rounded">
                                    <div class="row bg-white">
                                        <div class="col-md-3 pl-0">
                                            <img src=<?php echo $item["s_img"]; ?> alt="Image1" class="img-fluid">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="pt-2"><?php echo $item["s_name"]; echo "   " ;  echo $item["s_cost"]; echo" Baht"?></h5>
                                            <p class="text-secondary"><?php echo $item["s_description"]; ?></p> 
                                            <button type="submit" class="btn btn-danger mx-2" name="remove" onclick="return confirm('Are you sure?')?window.location.href='../function/BasketAction.php?action=removeBasketItem&s_id=<?php echo $item["rowid"]; ?>':false;">Remove</button>
                                        </div>
                                        <div class="col-md-3 py-5">
                                            <div>
                                                <input type="text" readonly value="<?php echo $item["s_amount"]; ?>" class="form-control w-25 d-inline" onchange = "updateBasketItem(this, '<?php echo $item["rowid"]; ?>')"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } }else{ ?>
                            <tr><td colspan="5"><p>Your Basket is empty.....</p></td>
                            <?php } ?>
                            
                </div>
            </div>   

            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">      
                           <h6><?php echo $basket->total_items().' Price';; ?></h6> 
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $basket->total().' Baht';; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php echo $basket->total().' Baht';;?></h6>
                        <div class = "ConfirmOrder">
                            <button type="button" id = "payment" class = "payment" onclick="document.getElementById('payment_popup').style.display='block'">ยืนยันรายการสั่งซื้อ</button>
                        
                
                        
                        </div>
                    </div>
                </div>                          
            </div> 
        </div>

        <!-- The Modal -->
        <div id="payment_popup" class="modal">
        <!-- Modal Content -->
            <form class="modal-content animate" id = "payment_form" action = "../database_php/login_database.php" method = "post">
                <div class="imgcontainer">
                    <img src="../img/empty.png" alt="Avatar" class="avatar">
                </div>   
            </form>
        </div> 
        
    </div>

    

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>