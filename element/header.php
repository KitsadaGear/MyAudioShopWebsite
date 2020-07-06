<?php
// Initialize shopping cart class 
require_once '../function/Basket.class.php'; 

$basket = new Basket; 
 
// Include the database config file 
require_once '../database_php/server.php'; 


?>
<div class="menubar">
  <a class = menubar_logo><i class="fa fa-headphones" aria-hidden="true"></i> Audio Shop</a>  
    <div class = "menubar-left">
      <a class= "homes" href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a class = "news" href="news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a>
      <div class="dropdown">
        <button class="dropbtn"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Product
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="mic.php"><i class="fa fa-cog" aria-hidden="true"></i> Microphone</a>
          <a href="speaker.php"><i class="fa fa-cog" aria-hidden="true"></i> Speaker</a>
          <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Power Mix</a>
          <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Other</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Transaction
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i> Payment</a>
          <a href="#"><i class="fa fa-car" aria-hidden="true"></i> Delivery</a>
        </div>
      </div>  
          <a class = "about"href="about.php"><i class="fa fa-user" aria-hidden="true"></i> About us</a>
    </div>
  
      <?php if (isset($_SESSION['success'])) : ?>
        <div class = "menubar-rights">
          <?php
          function runMyFunction() {
            unset($_SESSION['success']) ;
              echo "<script> alert ('Logout Success');window.location='home.php' </script>" ;  
              session_destroy();
            }
            if (isset($_GET['logout'])) {
              runMyFunction();
            }
            ?>
            <a class = "shopping_basket" href = "shopping_basket.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span id="basket_count" class="text-warning bg-light"> <?php echo ($basket->total_items() > 0)?$basket->total_items().' Items':'Empty'; ?></span>
            </a>
            <?php echo '<a>Welcome Mr/Mrs ' . $_SESSION['username']. '</a>'; ?>
            <div class = "setting" id ="setting_bar">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a id = "profile_btn "onclick = "document.getElementById('id_profile').style.display='block' "><i class="fa fa-address-card" aria-hidden="true"></i> Profile</a> 
              <a id = "history_btn"><i class="fa fa-suitcase" aria-hidden="true"></i> Order history</a>
              <a id = "change_btn" onclick = "document.getElementById('id_change').style.display ='block'"><i class="fa fa-history" aria-hidden="true"></i> Change Password</a>
              <a id = "logout_btn" href ="home.php?logout=true" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Logout</a> 
            </div>
            <span class = "set_bar" onclick="openNav()">&#9776;</span>
        </div>

        <?php else : ?>
          <div class = "menubar-right">
            <a class = "login_btn" id = "login_btn" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user-o" aria-hidden="true"></i> Login</a>  
            <a id = "regis_btn" onclick= "document.getElementById('id02').style.display='block' "><i class="fa fa-address-card-o" aria-hidden="true"></i> Register</a>  
          </div>
          
        <?php endif ?>

    </div>
  </div>

  <!-- The Modal -->
  <div id="id01" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" id = "login_form" action = "../database_php/login_database.php" method = "post">
      <div class="imgcontainer">
        <span onclick ="document.getElementById('id01').style.display='none';document.getElementById('login_form').reset();" ;
      class="close" title="Close Modal" >&times;</span>
        <img src="../img/empty.png" alt="Avatar" class="avatar">
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
  <form id = "regis_form" class="modal-content animate2" action  = "../database_php/register_database.php" method = "post">

    <div class="imgcontainer2">
      <span onclick="document.getElementById('id02').style.display='none';document.getElementById('regis_form').reset();"
      class="close2" title="Close Modal">&times;</span>
      <img src="../img/empty.png" alt="Avatar" class="avatar2">
    </div>

    <div class="containers2">
        <label for="Surname"><b>Surname</b></label>
        <input type="text" placeholder="Enter Surname" name="surname" pattern="[A-Za-z]{1,100}"
        title="Wrong Surname pattern" autocomplete = "off" required >

        <label for="Lastname"><b>Lastname</b></label>
        <input type="text" placeholder="Enter Lastname" name="lastname" pattern="[A-Za-z]{1,100}"
        title="Wrong Lastname pattern" autocomplete = "off" required >

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Wrong E-mail pattern" autocomplete = "off" required >

        <label for="phone"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="phonenumber" pattern=".{8,}"
        title = "Wrong Phone Number pattern" autocomplete="off" required>

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" 
        title="Wrong Address pattern" autocomplete = "off" required >

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required autocomplete = "off">
        
        <label for="psw2"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw-regis" id = "myRegisPassword" pattern= "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required>
        
        <label for="psw-repeat"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="psw-confirmed" id = "myRepeatPassword" autocomplete="off" required>

        <input type="checkbox" onclick="showRegisPassword()">Show Password
        <input type="checkbox" onclick="showRepeatPassword()" id = "Confirm_password">Show Confirm-Password
        <input type="file" id="myFile" name="filename" required>
   
        <p>By creating an account you agree to our <a href="privacy.php">Terms & Privacy</a>.</p>

        <div class="container_signin" style="background-color:#f1f1f1">
        
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
        <button type="submit" name = "regis_user" class = "regis_btn" id = regis_user >Register</button>
      
     </div>
    </div>
  </form>
</div>

    <!-- The Modal -->
  <div id="id_change" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" id = "change_form" action = "../database_php/change_forget_database.php" method = "post">
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


  <!-- The Modal -->
  <div id="id_profile" class="modal">
      <!-- Modal Content -->
    <form class="modal-content animate" id = "profile_form" action = "../database_php/change_forget_database.php" method = "post">
      <div class="imgcontainer">
        <span onclick ="document.getElementById('id_profile').style.display='none';document.getElementById('login_form').reset();" ;
        class="close" title="Close Modal" >&times;</span>

        <div class="card">
          
          <h1><?php echo $_SESSION['surname']; echo " " ; echo $_SESSION['lastname']; ?></h1>
          <p class="title">Email : <?php echo $_SESSION['email']; echo " " ;?> Phonenumber : <?php echo $_SESSION['phonenumber']; ?></p>
          <p>Address : <?php echo $_SESSION['address'];?></p>
          
        </div>
      </div>
    </form> 
  </div> 
