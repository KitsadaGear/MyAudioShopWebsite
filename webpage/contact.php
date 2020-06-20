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
    <link rel="stylesheet" href="../css/contact-style.css"media = "screen,projection">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="screen,projection">
    
</head>
<body>

<div class = "myPage" id = "myPage">

<?php require_once ("../element/header.php"); ?>


    <div class="clearfix"></div>

    <div class="row">

      <div class="column">
        <div class="card">
          <img src="../img/nice.jpg" alt="Nice" style="width:100%">
          <div class="pic_container">
            <h2>Benjawan Prasatthong</h2>
            <p class="title">CEO &amp; Founder</p>
            <p>Contact me only 8.00 am - 6.00 pm</p>
            <p>Nicebenjawan06@gmail.com</p>
            <p><button class="button"onclick="window.location.href='https://www.facebook.com/BPzii';">Contact</button></p>
          </div>
        </div>
      </div>
    
      <div class="column">
        <div class="card">
          <img src="../img/gear.jpg" alt="Gear" style="width:100%">
          <div class="pic_container">
            <h2>Kitsada Salachupong</h2>
            <p class="title">Programmer</p>
            <p>Contact me only 10.00 am - 11.00 pm</p>
            <p>Kitsada.sal@hotmail.com</p>
            <p><button class="button" onclick="window.location.href='https://www.facebook.com/Gear.Bintaruban';">Contact</button></p>
          </div>
        </div>
      </div>
    </div>
    

    <footer>
      <p>Copyright by Korrakot Triwichain</p>
  </footer>
    </div>
    </body>
    </html>
     
    