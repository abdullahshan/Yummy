<?php

session_start();

include("../database/env.php");
if(isset($_POST['submit'])){

    $id = $_GET['id'];

    $title = $_POST['category'];

}



$qurery = "UPDATE category SET title='$title' WHERE id = '$id'";
    $exicut = mysqli_query($conn,$qurery);
        if($exicut){


            $_SESSION['success'] = "Category update succesfully done!";
            header("location: ../backend/add_category.php");
        }


?>