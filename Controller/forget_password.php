<?php

session_start();
include("../database/env.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include("./phpmailer/Exception.php");
include("./phpmailer/PHPMailer.php");
include("./phpmailer/SMTP.php");


        function send_pwd_forgetemil($name,$email,$token){

            $mail = new PHPMailer(true);//Enable verbose debug output
           
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mdabdullah559987@gmail.com';                     //SMTP username
            $mail->Password   = 'jvxagtlhsbelbrfv';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('mdabdullah559987@gmail.com', $name);
            $mail->addAddress($email);     //Add a recipient
        
            $mail_template = "
                <h1>Welcome $name</h1>
                <h5>Please verify your email to complete your account setup</h5>
                <a href='http://localhost/Yummy/backend/forgetpassword_code.php?token=$token'>click</a>
            ";
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verify your email';
            $mail->Body    = $mail_template;
          
        
            $mail->send();
            // echo 'Message has been sent';
        
        }


        if(isset($_POST['forget_password'])){

            $email = $_POST['email'];
            $token = md5(rand());

        

                if(empty($email)){

                    $_SESSION['errors'] = "please enter your email";
                    header("location: http://localhost/Yummy/backend/forgot_password.php");
                    
                }else{

                    $query = "SELECT * FROM users WHERE email = '$email'";
                        $exicute = mysqli_query($conn,$query);

                            if(mysqli_num_rows($exicute) > 0){

                                    $data = mysqli_fetch_assoc($exicute);
                                    $name = $data['f_name'];
                                    $email = $data['email'];

                                    $query = "UPDATE users SET verify_token = '$token' WHERE email = '$email' LIMIT 1";
                                        $update = mysqli_query($conn,$query);
                                        
                    if($update){

                        send_pwd_forgetemil("$name","$email","$token");

                        $_SESSION['success'] = "Password resed email has send!";
                        header("location: http://localhost/Yummy/backend/forgot_password.php");
                    }


                            }else{
                                $_SESSION['success'] = "You have not account! please Create an account";
                                header("location: http://localhost/Yummy/backend/register.php");
                            }
                }
        }

?>