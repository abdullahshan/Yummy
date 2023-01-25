<?php
session_start();
include("../database/env.php");

    if(isset($_GET['token'])){

        $token = $_GET['token'];

        // print_r($token);

       
            
            $query = "SELECT verify_token, status FROM users WHERE verify_token = '$token'";
                $exit = mysqli_query($conn,$query);
                    $data = mysqli_fetch_assoc($exit);

                  
                    if($data['status']==0){

                        $query = "UPDATE users SET status='1' WHERE verify_token = '$token'";
                            $update_status = mysqli_query($conn,$query);
                                if($update_status){
                                    $_SESSION['success'] = "You are email has been verifyed please login now";
                                        header("location: http://localhost/Yummy/backend/login.php");
                                }else{
                                    $_SESSION['success'] = "email verification failed!";
                                    header("location: ../backend/login.php");
                                }
                    }else{
                        $_SESSION['success'] = "You are alredy verifyed done";
                        header("location: http://localhost/Yummy/backend/login.php");
                    }
    }



?>