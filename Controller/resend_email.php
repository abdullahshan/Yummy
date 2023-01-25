<?php

    session_start();

    include("../database/env.php");


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include("./phpmailer/Exception.php");
    include("./phpmailer/PHPMailer.php");
    include("./phpmailer/SMTP.php");

    function send_verificaton_email($name,$email,$token){
                
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
        $mail->setFrom('mdabdullah559987@gmail.com', $name);
        $mail->addAddress($email);     //Add a recipient             //Name is optional
        
        //template
        $template = "
            <h1>please verify with your email address click the link below</h1>
            <h5>Verify your email address to login please click the link below</h5>
            <a href='http://localhost/Yummy/controller/verify.php?token=$token'>Click here</a>
        ";
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Please verify your email address with Yummey Food';
        $mail->Body    = $template;
    
        $mail->send();
        // echo 'Message has been sent';
    }

    if(isset($_POST['resend'])){


        $_email = $_POST['email'];

        $query = "SELECT * FROM users WHERE email = '$_email'";
            $exicute = mysqli_query($conn,$query);
               
                if(mysqli_num_rows($exicute) > 0){
                    $data = mysqli_fetch_assoc($exicute);
                    if($data['status'] == 0){
                      $name =  $data['f_name'];
                      $email = $data['email'];
                      $token = $data['verify_token'];

                      send_verificaton_email("$name","$email","$token");
                      $_SESSION['success'] = "email_verification resend has been successfully done!check your email";
                      header(("location: http://localhost/Yummy/backend/email_resend.php"));

                    }else{
                        $_SESSION['success'] = "This email has alredy verifyed! Please login..";
                        header("location: http://localhost/Yummy/backend/email_resend.php");
                    }
                }else{
                    $_SESSION['success'] = "This email address not found! Registration please";
                    header("location: http://localhost/Yummy/backend/register.php");
                }

    }




?>