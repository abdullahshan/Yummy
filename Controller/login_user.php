<?php

session_start();


include("../database/env.php");

if(isset($_POST['login'])){

    $_email = $_POST['email'];
    $_password = $_POST['password'];
    
    $hash = md5(sha1($_password));
}


$errors = [];

if(empty($_email)){
    $errors['error_email'] = "please enter your email";
}

if(empty($_password)){
    $errors['error_password'] = "please enter your password";
}


if(count($errors) > 0){

    $_SESSION['errors'] = $errors;
    header("location: ../backend/login.php");

}else{

   $query =  "SELECT * FROM users WHERE email = '$_email'";

   $data = mysqli_query($conn,$query);

   if(mysqli_num_rows($data) > 0){

         $query =  "SELECT * FROM users WHERE email = '$_email' AND password = '$hash'";
         $che_pass = mysqli_query($conn,$query);

            $auth = mysqli_fetch_assoc($che_pass);
            
         if(mysqli_num_rows($che_pass) > 0){

               
                if($auth['status']==1){
                    if($auth['user_type'] == 1){

                        $_SESSION['auth'] = $auth;
                        header("location: ../backend/deshboard.php");
                    }else{
    
                        $_SESSION['auth'] = $auth;
                        header("location: http://localhost/Yummy/");
    
                    }
                }else{

                    $_SESSION['success'] = "Sorry! You have must be verifyed your email address";
                    header("location: http://localhost/Yummy/backend/login.php");
                }
           

         }
         else{
            $_SESSION['errors']['error_password'] = "Incorrect your email or password";
            header("location: ../backend/login.php");
         }
      
   }else{
        
        $_SESSION['errors']['error_email'] = "This email address is not fonund!";
        header("location: ../backend/login.php");
   }
  
}



?>