<?php
session_start();
include("../database/env.php");
$id = $_GET['id'];



$query  = "SELECT status FROM foods WHERE id = '$id'";
    $exicute = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($exicute);

if($data['status'] == 0){

    $query  = "UPDATE foods SET `status`='1' WHERE id = '$id'";
        $exicute = mysqli_query($conn,$query);
}elseif($data['status'] == 1){

    $query  = "UPDATE foods SET `status`='0' WHERE id = '$id'";
        $exicute = mysqli_query($conn,$query);
}

if($exicute){

    $_SESSION['success']  = "food update successfully done!";
    header("location: ../backend/all_food.php");
}


?>