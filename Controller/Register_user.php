<?php 

session_start();


include("../database/env.php");

if(isset($_POST['Register']))
{

$_fname = $_POST['fname'];
$_lname = $_POST['lname'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$conpassword = $_POST['conpassword'];

$hash = sha1($_password);


$errors = [];

}

if(empty($_fname)){
    $errors['fname_error'] = "Please enter your fname";
}

if(empty($_lname)){
    $errors['lname_error'] = "Please enter your lname";
}

if(empty($_email)){
    $errors['email_error'] = "Please enter your email";
}elseif(!filter_var($_email,FILTER_VALIDATE_EMAIL)){

    $errors['email_error'] = "Please enter your valied email";
}

if(empty($_password)){
    $errors['password_error'] = "Please enter your password";
}

if(empty($conpassword)){
    $errors['conpassword_error'] = "Please enter your conpassword";
}elseif($_password !== $conpassword){

    $errors['conpassword_error'] = "Your password dit't match!";
}



if(count($errors) > 0){

   $_SESSION['errors'] = $errors; 
   header("location: ../backend/register.php");

}else{

 $query =   "INSERT INTO users(f_name, l_name, email, password) VALUES ('$_fname','$_lname','$_email','$hash')";
  
    $store = mysqli_query($conn,$query);

    if($store){

       $_SESSION['success'] = "Your Registraion Have Been Succesfully Done!";
        header("location: ../backend/login.php");
    }
 
}


?>

