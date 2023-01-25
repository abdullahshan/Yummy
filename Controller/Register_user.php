<?php 

session_start();

include("../database/env.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    include("./phpmailer/Exception.php");
    include("./phpmailer/PHPMailer.php");
    include("./phpmailer/SMTP.php");


    function sendEmail_veriFication($_fname,$_email,$verify_token)
    {
        $mail = new PHPMailer(true);
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mdabdullah559987@gmail.com';                     //SMTP username
        $mail->Password   = 'jvxagtlhsbelbrfv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('mdabdullah559987@gmail.com', $_fname);
        $mail->addAddress($_email);     //Add a recipient             //Name is optional
        
        //template
        $template = "
            <h1>please verify with your email address click the link below</h1>
            <h5>Verify your email address to login please click the link below</h5>
            <a href='http://localhost/Yummy/controller/verify.php?token=$verify_token'>Click here</a>
        ";
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Welcome To Yummy Food';
        $mail->Body    = $template;
    
        $mail->send();
        // echo 'Message has been sent';

    }


if(isset($_POST['Register']))
{

$_fname = $_POST['fname'];
$_lname = $_POST['lname'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$conpassword = $_POST['conpassword'];
$verify_token = md5(rand());

$hash = md5(sha1($_password));

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


    $query = "SELECT email FROM users WHERE email = '$_email'";
        $exicute = mysqli_query($conn,$query);

        if(mysqli_num_rows($exicute) > 0){

           $_SESSION['success'] = "This email address alredy taken";
           header("location: http://localhost/Yummy/backend/register.php");

        }else{

                        
            $query =   "INSERT INTO users(f_name, l_name, email, verify_token, password) VALUES ('$_fname','$_lname','$_email','$verify_token','$hash')";
            
            $store = mysqli_query($conn,$query);

                if($store){

                    sendEmail_veriFication("$_fname","$_email","$verify_token");

                    $_SESSION['success'] = "You have must verify your email address check your email";
                    header("location: http://localhost/Yummy/backend/login.php");
                }
                    }


 
}


?>

