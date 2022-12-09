<?php

session_start();
include("../database/env.php");
$id = $_GET['id'];

$query = "DELETE FROM category WHERE id = '$id'";
    $exicute = mysqli_query($conn,$query);
        if($exicute){
            
            $_SESSION['success'] = "Category delete successfully done!";
            header("location: ../backend/add_category.php");
        }

?>