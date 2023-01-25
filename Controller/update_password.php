<?php

session_start();

include("../database/env.php");

if(isset($_POST['update'])){

    $token = $_POST['token'];
    $rand = md5(rand());

    $new_password = md5(sha1($_POST['password']));
    $c_password = md5(sha1($_POST['c_password']));

    $errors = [];

    if(empty($new_password)){
        $errors['password_errors'] = "please enter new password";
    }

    if(empty($c_password)){
       $errors['c_password_errors'] = "please enter your confirm password";
    }

    if($new_password != $c_password){
        $errors['c_password_errors'] = "password didn't match!";
    }


    if(count($errors) > 0){

        $_SESSION['errors'] = $errors;
        header(("location: http://localhost/Yummy/backend/forgetpassword_code.php?token=$token"));
    }else{

        $query ="SELECT verify_token FROM users WHERE verify_token = '$token'";
        $exicute = mysqli_query($conn,$query);

if(mysqli_num_rows($exicute) > 0){
    $data = mysqli_fetch_assoc($exicute);
    $token = $data['verify_token'];
    $query ="UPDATE users SET password = '$new_password' WHERE verify_token = '$token'";
        $update = mysqli_query($conn,$query);

        if($update){
            $query = "UPDATE users SET verify_token = '$rand' WHERE verify_token = '$token'";
                $tokenUpdate = mysqli_query($conn,$query);
            $_SESSION['success'] = "password updated please login";
            header(("location: http://localhost/Yummy/backend/login.php"));
        }

}else{
    $_SESSION['error'] ="Token doesn't match!please resend your password reset link";
    header("location: http://localhost/Yummy/backend/forgetpassword_code.php?token=$token");
}
    }
  
   
}









?>