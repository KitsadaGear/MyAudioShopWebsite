<?php 
    session_start();
    include('../database_php/server.php'); 
    require_once ('../element/stock.php');

  if(array_key_exists('button_mic1', $_POST)) { 
    button_mic1(); 
  } 
 
  function button_mic1() { 
    if(!isset($_SESSION['success'])){
      echo "<script> alert ('You must login first');window.location='../webpage/mic.php' </script>" ; 
    }
  } 

  if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'mic.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
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
    <title>Audio Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/mic-style.css"media = "screen,projection">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="screen,projection">

    
</head>
<body>

<div class = "myPage" id = "myPage">

<?php require_once ("../element/header.php"); ?>

    <div class="clearfix"></div>

  <header class = "header">
    <div class ="mic_header">
      <h1>Microphone</h1>
    </div>
  </header>

  <div class = "mic_container">
  <form class = product method = post>
    <?php $sql = "SELECT * FROM stock WHERE s_type = 'Mic' " ; 
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)){
            component($row['s_id'] , $row['s_name'] ,$row['s_cost'] ,$row['s_img'],$row['s_description'] );
          }
    
    ?>
    </form>
  </div>

  

        
</div>
</body>
</html>