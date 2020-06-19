<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['psw']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {

            $password = md5($password);
            $username_login = ucfirst($username);
            date_default_timezone_set('Asia/Bangkok');
            $dt = date("y-m-d H:i:s",time());

            $query = "SELECT * FROM user_login WHERE username = '$username' AND password = '$password' ";
            $log = "INSERT INTO user_log (username , date_time , permission) VALUES ('$username_login' , '$dt' , 'C')" ; 
            $checkAdmin = ""; 

            $result = mysqli_query($conn, $query);
            $log_result = mysqli_query($conn , $log) ; 
            $admin_result = mysqli_query($conn , $log) ; 
        
            

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username_login;
                $_SESSION['success'] = "Success";
                echo "<script> alert ('Your are now logged in');window.location='../webpage/home.php' </script>" ; 
            }else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                echo "<script> alert ('Wrong Username or Password!');window.location='../webpage/home.php' </script>" ;   
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Fail";
            echo "<script> alert ('Username & Password is required');window.location='../webpage/home.php' </script>" ;         
        }
    }

?>
