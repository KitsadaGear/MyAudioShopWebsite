<?php 
    session_start();
    include('../database_php/server.php'); 
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
    <link rel="stylesheet" href="../css/speaker-style.css"media = "screen,projection">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="screen,projection">
    
</head>
<body>

<div class = "myPage" id = "myPage">

<?php require_once ("../element/header.php"); ?>

    <div class="clearfix"></div>

  <header class = "header">
    <div class ="mic_header">
      <h1>Speaker</h1>
    </div>
  </header>

  <section class = "product">

  <div class="card">
      <div class = "card_column">
        <div class = "card1">
         <img src="../img/TOA_F-1300BT.jpg" alt="TOA_F-1300BT">
          <h1>K&M21070</h1>
          <p class="price">5157 Baht</p>
          <p>High efficiency, wide range, and can be installed in a manner ideal for the location and intended application.</p>
          <p><button>Add to Cart</button></p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class = "card_column">
      <div class = "card2">
         <img src="../img/YAMAHA_VXS8.jpg" alt="YAMAHA_VXS8">
          <h1>YAMAHA_VXS8</h1>
          <p class="price">18990 Baht</p>
          <p>8 inch loudspeaker, cone 0.75 ″ soft dome, with 180 watts (MAX) rms, 8 ohms, frequency range (-10dB). 51 Hz - 20 kHz</p>
          <p><button>Add to Cart</button></p>
        </div>
        </div>
      </div>


    </div>
    </div>

    
    

  </section>
    

</div>
</body>
</html>