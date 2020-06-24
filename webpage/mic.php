<?php 
    session_start();
    include('../database_php/server.php'); 
    include('../element/stock.php');
    include('../function/Basket.class.php');

    if(array_key_exists('add', $_POST)) { 
      add(); 
    } 
   
    function add() { 
      if(!isset($_SESSION['success'])){
        echo "<script> alert ('You must login first');window.location='../webpage/mic.php' </script>" ; 
        die();
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
    <div class="row text-center py-5">
    <?php $sql =  $conn->query("SELECT * FROM stock WHERE s_type = 'Mic' ") ; 
          if($sql->num_rows > 0){
          while ($row = $sql->fetch_assoc()){
            ?>
            <div class="card">
              <form action="mic.php" method="post">
                <div class = "card_column">
                  <div class = "card_show">
                    <img src= <?php echo $row['s_img'] ;?>>
                    <h1><?php echo $row['s_id'] ; echo " " ;  echo $row['s_name'];?></h1>
                    <p class="price"><?php echo $row['s_cost'] ;?> Baht</p>
                    <p><?php echo $row['s_description'] ;?></p>
                    <a class="btn btn-warning my-3" href="../function/BasketAction.php?action=addToBasket&s_id=<?php echo $row["s_id"]; ?>">Add to basket</a>
                   
                  </div>
                </div>
              </form>
            </div>
            <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    
    </div>
  </div>

  <footer>
      <p>Copyright by Korrakot Triwichain</p>
  </footer>

        
</div>
</body>
</html>