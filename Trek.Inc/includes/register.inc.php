<?php

session_start();
include_once 'connect.inc.php';

if (isset($_POST['submit'])) {

    #Treat user input as text and not as code
    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    $mob = mysqli_real_escape_string($conn, $_POST['mob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    

    // Form Validation / Error Handlers
    // Check for empty fields
 if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)
        ){
        // Check if input characters are Valid i.e if they only contain a-z and A-Z
        header("Location: ../register.php?signup=invalid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if email is Valid
        header("Location: ../register.php?signup=email");
        exit();
    } else if(strlen($pass) < 8){
        //Check if password is valid
        header("Location: ../register.php?signup=len");
        exit();
    } else if($mob <=10000000 || $mob >= 99999999999) {
        //Check if phone is valid
        header("Location: ../register.php?signup=contact");
        exit();
    } else {

        // Check if user doesn't already exist i.e. email is not in db
        $sql = "SELECT * FROM users WHERE user_email='$email';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../register.php?signup=taken");
            exit();
        }  else {
            // Hashing the password
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
            // Insert the user in the db
            
                $sql = "INSERT INTO users (fname, lname, mob, 
                        email, password) 
                        VALUES ('$firstname', '$lastname', '$mob', 
                         
                        '$email', '$hashedPass');";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                // Now redirect the user
                header("Location: ../register.php?signup=success");
                exit();
            }
        }
    }
 else {

    // Hashing the password
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    // Insert the user in the db
    
        $sql = "INSERT INTO users (fname, lname, mob, 
                email, password) 
                VALUES ('$firstname', '$lastname', '$mob', 
                 
                '$email', '$hashedPass');";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        // Now redirect the user
        header("Location: ../register.php?signup=success");
        exit();
    
  // If someone just loads the url without submitting data
  header("Location: ../register.php");
  exit();
}