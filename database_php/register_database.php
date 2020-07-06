<?php 
    session_start();
    include('server.php'); 

    $errors = array(); 

    if (isset($_POST['regis_user'])){
        $surname = mysqli_real_escape_string($conn , $_POST['surname']);
        $lastname = mysqli_real_escape_string($conn , $_POST['lastname']);
        $address = mysqli_real_escape_string($conn , $_POST['address']);
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $phonenumber = mysqli_real_escape_string($conn , $_POST['phonenumber']);
        $picture = mysqli_real_escape_string($conn , $_POST['filename']);
        $username = mysqli_real_escape_string($conn , $_POST['username']);
        $password1 = mysqli_real_escape_string($conn , $_POST['psw-regis']);
        $password2 = mysqli_real_escape_string($conn , $_POST['psw-confirmed']);
        $picture = mysqli_real_escape_string($conn , $_POST['filename']);

        if(empty($surname)){
            array_push($errors , "Surname is required");
        }
        if(empty($lastname)){
            array_push($errors , "Lastname is required");
        }
        if(empty($address)){
            array_push($errors , "Address is required");
        }
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

        $user_check_query = "SELECT * FROM user_information WHERE email = '$email' OR phonenumber = '$phonenumber' OR username = '$username' LIMIT 1 " ; 
        $query = mysqli_query($conn , $user_check_query);

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
            $surname = ucfirst($surname);
            $lastname = ucfirst($lastname);
            $sql = "INSERT INTO user_information (surname , lastname , email , phonenumber ,address ,picture, username , password , permission) VALUES ('$surname' , '$lastname' , '$email' , '$phonenumber' ,'$address','$picture' ,'$username' , '$password' , 'C')" ; 
    
            mysqli_query($conn , $sql); 
           


            $_SESSION['username'] = $username ; 
            echo "<script> alert ('Register Complete Welcome Mr/Mrs $surname $lastname');window.location='../webpage/home.php' </script>" ; 
        }else {
            echo "<script> alert ('Some input already exists $errors');window.location='../webpage/home.php'</script>" ; 
        }
    }
?>

