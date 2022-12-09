<?php
session_start();
include("../database/env.php");
$id = $_GET['id'];

$query  =  "DELETE FROM `foods` WHERE id = '$id'";

    $exicute = mysqli_query($conn,$query);

        if($exicute){
            $_SESSION['success']  = "Food delete successfully done!";
            header("location: ../backend/all_food.php");
        }



?>