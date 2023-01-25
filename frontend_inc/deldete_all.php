<?php


include("../database/env.php");


    $id = $_GET['id'];


    $query  = "DELETE FROM CARD";
    $exi = mysqli_query($conn, $query);

        if($exi){

            header("location: http://localhost/Yummy/frontend_inc/cart_view.php");
        }

?>