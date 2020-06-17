<?php 
    session_start();
    include('user_server.php');

    $errors = array();

    if (isset($_POST['change_password'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['psw']);
        $new_password = mysqli_real_escape_string($conn, $_POST['new-psw']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (empty($email)) {
            array_push($errors, "Email is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $new_password = md5($new_password);  
            $query = "SELECT * FROM user_info WHERE username = '$username' AND password = '$password' AND email = '$email' ";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) == 1) {
                $change_password = "UPDATE user_info SET password = '$new_password'" ; 
                mysqli_query($conn , $change_password); 
                unset($_SESSION['success']) ;
                echo "<script> alert ('Change Success');window.location='home.php' </script>" ;  
            }else{
                echo "<script> alert ('Input Not Match');window.location='home.php' </script>" ;   
            }


        }
    }
?>