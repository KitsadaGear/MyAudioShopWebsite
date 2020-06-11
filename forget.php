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
    <link rel="stylesheet" href="css/forget-style.css">
    
</head>
<body>

<div class="menubar">
      <a class = menubar_logo>Audio Shop</a>  
      <div class = "menubar-left">
        <a class= "homes" href="home.php">Home</a>
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
        <?php if (isset($_SESSION['success'])) : ?>
          <div class = "menubar-rights">

            <?php
            function runMyFunction() {
              unset($_SESSION['success']) ;
              echo "<script> alert ('Logout Success');window.location='home.php' </script>" ;  
            }
            if (isset($_GET['logout'])) {
              runMyFunction();
            }
            ?>

            <div class="dropdown">
            <button class="dropbtn">Setting
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="profile.php">Profile</a> 
              <a>Your Transaction</a>
              <a>Order history</a>
              <a id = "change_btn" onclick = "document.getElementById('id_change').style.display ='block'">Change Password</a>
              <a id = "logout_btn" href ="home.php?logout=true" >Logout</a> 
            </div>
          </div>
          <?php echo '<a>Welcome ' . $_SESSION['username']. '</a>'; ?>
          </div>
        <?php else : ?>
          <div class = "menubar-right">
            <a class = "login_btn" id = "login_btn" onclick="document.getElementById('id01').style.display='block'">Login</a>  
            <a id = "regis_btn" onclick= "document.getElementById('id02').style.display='block'">Register</a>  
          </div>
          
        <?php endif ?>

     </div>

  <!-- The Modal -->
  <div id="id01" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" id = "login_form" action = "login_database.php" method = "post">
      <div class="imgcontainer">
        <span onclick ="document.getElementById('id01').style.display='none';document.getElementById('login_form').reset();" ;
      class="close" title="Close Modal" >&times;</span>
        <img src="img/empty.png" alt="Avatar" class="avatar">
      </div>
  
      <div class="containers">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id = "username" required autocomplete="off">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required id = "myPassword" autocomplete="off" >
        <input type="checkbox" onclick="showLoginPassword()">Show Password
        
        <button type="submit" name = "login_user" class = "btn">Login</button>

        <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
        <div class="container_login" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
         <span class="psw">Forgot <a href="forget.php">password?</a></span>
        </div>
      </div>
    </form>
  </div> 
 
  <!-- The Modal -->
<div id="id02" class="modal2" >

  <!-- Modal Content -->
  <form id = "regis_form" class="modal-content animate2" action  = "register_database.php" method = "post">

    <div class="imgcontainer2">
      <span onclick="document.getElementById('id02').style.display='none';document.getElementById('regis_form').reset();"
      class="close2" title="Close Modal">&times;</span>
      <img src="img/empty.png" alt="Avatar" class="avatar2">
    </div>

    <div class="containers2">
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
       title="Wrong E-mail pattern" autocomplete = "off" required >

      <label for="phone"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone Number" name="phonenumber" pattern=".{8,}"
        title = "Wrong Phone Number pattern" autocomplete="off" required>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required autocomplete = "off">
        
      <label for="psw2"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw-regis" id = "myRegisPassword" pattern= "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required>
        
      <label for="psw-repeat"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="psw-confirmed" id = "myRepeatPassword" autocomplete="off" required>

      <input type="checkbox" onclick="showRegisPassword()">Show Password
      <input type="checkbox" onclick="showRepeatPassword()" id = "Confirm_password">Show Confirm-Password
      <input type="file" id="myFile" name="filename">
   
      <p>By creating an account you agree to our <a href="privacy.php">Terms & Privacy</a>.</p>

      <button type="submit" name = "regis_user" class = "btn" id = regis_user>Register</button>

      <div class="container_signin" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
        <span class="psw2">Already have an account? <a href = "" onclick="exitRegis()">Sign in</a></span>
     </div>
    </div>
  </form>
</div>

    <!-- The Modal -->
  <div id="id_change" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" id = "change_form" action = "change_forget_database.php" method = "post">
      <div class="imgcontainer">
        <span onclick ="document.getElementById('id_change').style.display='none';document.getElementById('login_form').reset();" ;
      class="close" title="Close Modal" >&times;</span>
        <header>
          <p>Change Password</p>
        </header>
      </div>
  
      <div class="containers">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Wrong E-mail pattern" autocomplete = "off" required >

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id = "username" required autocomplete="off">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required id = "oldPassword" autocomplete="off" >

        <label for="psw"><b>New-Password</b></label>
        <input type="password" placeholder="Enter Password" name="new-psw" required id = "newPassword" autocomplete="off" >

        <input type="checkbox" onclick="showOldPassword()">Show Old Password
        <input type="checkbox" onclick="showNewPassword()">Show New Password
        
        <button type="submit" name = "change_password" class = "btn">Submit</button>

        <div class="container_login" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id_change').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
      </div>
    </form>
  </div>

    <div class="clearfix"></div>

    <footer>
      <p>Copyright by Korrakot Triwichain</p>
  </footer>

    </body>
    </html>