<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src = js/function.js></script>
    <title>Audio Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/contact-style.css">
    
</head>
<body>

    <div class="menubar">
      <a class = menubar_logo>Audio Shop</a>  
      <div class = "menubar-left">
        <a class="home" href="home.php">Home</a>
        <a class = "news" href="news.php">News</a>
          <div class="dropdown">
            <button class="dropbtn">Product
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="mic.php">Microphone</a>
              <a href="#">Speaker</a>
              <a href="#">Power Mix</a>
              <a href="#">Other</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Transaction
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Deposit Payment</a>
              <a href="#">Full Payment</a>
              <a href="#">Delivery</a>
              <a href="#">Installation work</a>
            </div>
          </div>  
            <a class = "about"href="about.php">About us</a>
            <a class = "contact" href="contact.php">Contact</a>
        </div>
        <div class = "menubar-right">
          <a onclick="document.getElementById('id01').style.display='block'">Login</a>  
          <a onclick="document.getElementById('id02').style.display='block'">Register</a>  
        </div>
     </div>

  <!-- The Modal -->
  <div id="id01" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" action="/action_page.php">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'"
      class="close" title="Close Modal">&times;</span>
        <img src="img/empty.png" alt="Avatar" class="avatar">
      </div>
  
      <div class="containers">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required id = "myPassword">
        <input type="checkbox" onclick="showLoginPassword()">Show Password
        
        <button type="submit">Login</button>
        <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
        <div class="container_login" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
         <span class="psw">Forgot <a href="forget.php">password?</a></span>
        </div>
      </div>
    </form>

    <script>
      // Get the modal
      var modal = document.getElementById('id01');
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
    </script>


  </div> 
 

  <!-- The Modal -->
<div id="id02" class="modal2">
  <script>
    // Get the modal
    var modal = document.getElementById('id02');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
  </script>
  <!-- Modal Content -->
  <form class="modal-content animate2" onSubmit = "return checkPassword(this)" >
    <div class="imgcontainer2">
      <span onclick="document.getElementById('id02').style.display='none'"
      class="close2" title="Close Modal">&times;</span>
      <img src="img/empty.png" alt="Avatar" class="avatar2">
    </div>

    <div class="containers2">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required autocomplete="off">
      
      <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Wrong E-mail pattern" autocomplete="off" required>

            <label for="phone"><b>Phone Number</b></label>
            <input type="text" placeholder="Enter Phone Number" name="phone" pattern=".{8,}"
            title = "Wrong Phone Number pattern" autocomplete="off" required>
        
            <label for="psw2"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw-regis" id = "myRegisPassword" pattern= "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required>
        
            <label for="psw-repeat"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="psw-confirmed" id = "myRepeatPassword" autocomplete="off" required>

            <input type="checkbox" onclick="showRegisPassword()">Show Password
            <input type="checkbox" onclick="showRepeatPassword()" id = "Confirm_password">Show Confirm-Password
            <input type="file" id="myFile" name="filename">
   
            <p>By creating an account you agree to our <a href="privacy.php">Terms & Privacy</a>.</p>

            <button type="submit" value="submit" >Register</button>

            <div class="container_signin" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw2">Already have an account? <a href="login.php">Sign in</a></span>
            </div>
          </div>
        </form>
    </div>


    <div class="clearfix"></div>

    <div class="row">

      <div class="column">
        <div class="card">
          <img src="img/nice.jpg" alt="Nice" style="width:100%">
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
          <img src="img/gear.jpg" alt="Gear" style="width:100%">
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
  
    </body>
    </html>
     
    