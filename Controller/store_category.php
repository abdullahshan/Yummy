<?php
session_start();
include("../database/env.php");

if(isset($_POST['submit'])){

    $category = $_POST['category'];

    // print_r($category);

    $query = "INSERT INTO category(title) VALUES ('$category')";

        $exicute = mysqli_query($conn,$query);

        if($exicute){
            $_SESSION['store'] = "Category insert successfully done!";
            header("location: ../backend/add_category.php");
        }

}


?>