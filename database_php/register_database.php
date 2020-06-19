<?php 
    session_start();
    include('server.php'); 

    $errors = array(); 

    if (isset($_POST['regis_user'])){
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $phonenumber = mysqli_real_escape_string($conn , $_POST['phonenumber']);
        $username = mysqli_real_escape_string($conn , $_POST['username']);
        $password1 = mysqli_real_escape_string($conn , $_POST['psw-regis']);
        $password2 = mysqli_real_escape_string($conn , $_POST['psw-confirmed']);
        $picture = mysqli_real_escape_string($conn , $_POST['filename']);

        if(empty($username)){
            array_push($errors , "Username is required");
        }

        if(empty($email)){
            array_push($errors , "Email is required");
        }

        if(empty($phonenumber)){
            array_push($errors , "PhoneNumber is required");
        }

        if(empty($password1)){
            array_push($errors , "Password is required");
        }

        if(empty($password2)){
            array_push($errors , "Confirm_Password is required");
        };

        if($password1 != $password2){
            array_push($errors , "Password not match!!");
        }

        $user_check_query = "SELECT * FROM user_login WHERE email = '$email' OR phonenumber = '$phonenumber' OR username = '$username' LIMIT 1 " ; 
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['username'] === $username) {
                array_push($errors , "Username is already exists");
            }

            if ($result['phonenumber'] === $phonenumber) {
                array_push($errors , "PhoneNumber is already exists");
            }

            if ($result['email'] === $email) {
                array_push($errors , "Email is already exists");
            }
        }

        if(count($errors) == 0){
            $password = md5($password1); 

            $sql = "INSERT INTO user_login (email , phonenumber , username , password , permission) VALUES ('$email' , '$phonenumber' , '$username' , '$password' , 'C')" ; 
            $sqlInfo = "INSERT INTO user_full_information (email , phonenumber ,picture , permission) VALUES ('$email' , '$phonenumber','$picture' , 'C')" ; 
            mysqli_query($conn , $sql); 
            mysqli_query($conn, $sqlInfo); 


            $_SESSION['username'] = $username ; 
            echo "<script> alert ('Register Complete Welcome $username');window.location='../webpage/home.php' </script>" ; 
        }else {
            echo "<script> alert ('Username or Email or PhoneNumber is already exists');window.location='../webpage/home.php'</script>" ; 
        }
    }
?>

