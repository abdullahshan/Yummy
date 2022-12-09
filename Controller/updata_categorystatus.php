<?php


include("../database/env.php");


$id = $_GET['id'];
$status = $_GET['status'];


if($status == 1){



    $query = "UPDATE category SET status='2' WHERE id = '$id'";
    $exitcute = mysqli_query($conn,$query);
       
}else{

    $query = "UPDATE category SET status='1' WHERE id = '$id'";
    $exitcute = mysqli_query($conn,$query);
        
}

    if($exitcute){

        header("location: ../backend/add_category.php");
    }



?>