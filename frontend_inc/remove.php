<?php


include("../database/env.php");


    $id = $_GET['id'];


    $query  = "DELETE FROM CARD WHERE id= '$id'";
    $exi = mysqli_query($conn, $query);

        if($exi){

            header("location: http://localhost/Yummy/frontend_inc/cart_view.php");
        }

?>